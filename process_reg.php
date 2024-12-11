<?php
require 'config.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $repeatPassword = $_POST['repeatPassword'];
    $refCode = $_POST['refCode'] ?? '';
    $response = $_POST['g-recaptcha-response'];

    if (strlen($response) === 0) {
        echo json_encode(['status' => 'error', 'message' => 'Vui lòng xác minh bạn không phải là robot.']);
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(['status' => 'error', 'message' => 'Email không hợp lệ.']);
        exit;
    }

    if (strlen($password) < 6) {
        echo json_encode(['status' => 'error', 'message' => 'Mật khẩu phải chứa ít nhất 6 ký tự.']);
        exit;
    }

    if ($password !== $repeatPassword) {
        echo json_encode(['status' => 'error', 'message' => 'Mật khẩu không khớp.']);
        exit;
    }

    // Tạo payload
    $data = json_encode([
        'email' => $email,
        'password' => $password,
        'data' => [
            'firstName' => $firstName,
            'lastName' => $lastName,
            'refCode' => $refCode
        ],
    ]);

    // Gọi Supabase API qua cURL
    $ch = curl_init(SUPABASE_URL . '/auth/v1/signup');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json',
        'apikey: ' . SUPABASE_SERVICE_KEY,
        'Authorization: Bearer ' . SUPABASE_SERVICE_KEY,
    ]);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

    curl_setopt($ch, CURLOPT_VERBOSE, true); // Hiển thị thông tin chi tiết
    curl_setopt($ch, CURLOPT_FAILONERROR, true); // Bật lỗi khi mã HTTP >= 400
    curl_setopt($ch, CURLOPT_TIMEOUT, 10); // Giới hạn thời gian chờ
    // curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Tắt kiểm tra SSL
    // Xử lý phản hồi
    $response = curl_exec($ch);

    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($http_code === 200 || $http_code === 201) {
        echo json_encode(['status' => 'success', 'message' => 'Đăng ký thành công!']);
    } else {
        $error = json_decode($response, true);
        echo json_encode([
            'status' => 'error',
            'message' => $error,
        ]);
    }
}
?>
