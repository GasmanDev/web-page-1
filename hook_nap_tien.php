<?php

// Phân tích URL để lấy thông tin kết nối
$parsed_url = parse_url('postgresql://postgres.sezhdtuycglzwtnjbrkq:3ldMNXuru4QFLQIU@aws-0-ap-southeast-1.pooler.supabase.com:6543/postgres');

// Kiểm tra nếu URL không hợp lệ
if (!isset($parsed_url['host']) || !isset($parsed_url['port']) || !isset($parsed_url['user']) || !isset($parsed_url['pass']) || !isset($parsed_url['path'])) {
    echo json_encode(['success' => FALSE, 'message' => 'Invalid database URL format']);
    die();
}
// Lấy các thông tin cần thiết từ URL
$host = $parsed_url['host'];        // Địa chỉ máy chủ
$port = $parsed_url['port'];        // Cổng
$dbname = ltrim($parsed_url['path'], '/');  // Tên cơ sở dữ liệu (xóa dấu '/' ở đầu)
$user = $parsed_url['user'];        // Tên người dùng
$pass = $parsed_url['pass'];        // Mật khẩu

$log_file = 'app_log.txt';


function writeLog($message) {
    global $log_file;
    $current_time = date("Y-m-d H:i:s");
    $log_message = "[$current_time] $message" . PHP_EOL;
    file_put_contents($log_file, $log_message, FILE_APPEND);
}

writeLog('New request');
// Xác minh API key
$expected_api_key = 'xwdGasman181370@!@';  // API Key bạn đã cấu hình trong SePay

// Lấy API key từ header "Authorization"
$headers = apache_request_headers();
$api_key = isset($headers['Authorization']) ? $headers['Authorization'] : '';

// Kiểm tra nếu API key không tồn tại hoặc không hợp lệ
// if ($api_key !== "Apikey " . $expected_api_key) {
//     echo json_encode(['success' => FALSE, 'message' => 'Invalid API key']);
//     writeLog('Invalid API key');
//     die();
// }

// Kết nối đến PostgreSQL
try {
    // Tạo kết nối PDO
    $pdo = new PDO("pgsql:host=$host;port=$port;dbname=$dbname", $user, $pass);
    
    // Thiết lập chế độ lỗi
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    writeLog('Kết nối thành công đến PostgreSQL');
} catch (PDOException $e) {
    writeLog('Lỗi kết nối PostgreSQL: ' . $e->getMessage());
    echo json_encode(['success' => FALSE, 'message' => 'PostgreSQL connection failed: ' . $e->getMessage()]);
    die();
}

// Lấy dữ liệu từ webhooks
$data = json_decode(file_get_contents('php://input'));

if (!is_object($data)) {
    echo json_encode(['success' => FALSE, 'message' => 'No data']);
    writeLog('No data');
    die();
}

// Khởi tạo các biến
$id = $data->id;
$gateway = $data->gateway;
$transaction_date = $data->transactionDate;
$account_number = $data->accountNumber;
$sub_account = $data->subAccount;

$transfer_type = $data->transferType;
$transfer_amount = $data->transferAmount;
$accumulated = $data->accumulated;

$code = $data->code;
$transaction_content = $data->content;
$reference_number = $data->referenceCode;
$body = $data->description;

$amount_in = 0;
$amount_out = 0;

// Kiểm tra giao dịch tiền vào hay tiền ra
if ($transfer_type == "in") {
    $amount_in = $transfer_amount;
} else if ($transfer_type == "out") {
    $amount_out = $transfer_amount;
}

// Tạo query SQL
$sql = "INSERT INTO tb_transactions (id, gateway, transaction_date, account_number, sub_account, amount_in, amount_out, accumulated, code, transaction_content, reference_number, body) 
        VALUES (:id, :gateway, :transaction_date, :account_number, :sub_account, :amount_in, :amount_out, :accumulated, :code, :transaction_content, :reference_number, :body)";

// Chuẩn bị và thực thi query với PDO
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->bindParam(':gateway', $gateway);
$stmt->bindParam(':transaction_date', $transaction_date);
$stmt->bindParam(':account_number', $account_number);
$stmt->bindParam(':sub_account', $sub_account);
$stmt->bindParam(':amount_in', $amount_in);
$stmt->bindParam(':amount_out', $amount_out);
$stmt->bindParam(':accumulated', $accumulated);
$stmt->bindParam(':code', $code);
$stmt->bindParam(':transaction_content', $transaction_content);
$stmt->bindParam(':reference_number', $reference_number);
$stmt->bindParam(':body', $body);

// writeLog('Da den day 4');
// writeLog("SQL Query: " . $sql);
writeLog("Parameters: id=$id, gateway=$gateway, transaction_date=$transaction_date, account_number=$account_number, sub_account=$sub_account, amount_in=$amount_in, amount_out=$amount_out, accumulated=$accumulated, code=$code, transaction_content=$transaction_content, reference_number=$reference_number, body=$body");

// Kiểm tra và thực thi query
if ($stmt->execute()) {
    echo json_encode(['success' => TRUE]);
    // writeLog('Da den day 5');
} else {
    writeLog('Can not insert record to PostgreSQL: ' . $stmt->errorInfo()[2]);
    echo json_encode(['success' => FALSE, 'message' => 'Can not insert record to PostgreSQL: ' . $stmt->errorInfo()[2]]);
}
?>
