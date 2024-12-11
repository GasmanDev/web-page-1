<?php
    $donate_id = $_POST['donate_id'];
    $donate_value = $_POST['donate_value'];


    if (!is_numeric($donate_id) || !is_numeric($donate_value)) {
        echo json_encode(['status' => 'error', 'message' => 'Vui lòng nhập lại thông tin chính xác.']);
        exit;
    }

    $amount_vnd = $donate_value * 10000;


    $linkQR = 'https://qr.sepay.vn/img?acc=96247CJ&bank=Bidv&amount=' . $amount_vnd . '&des=PS' . $donate_id;
    echo json_encode(['status' => 'success', 'qr' => $linkQR]);
?>