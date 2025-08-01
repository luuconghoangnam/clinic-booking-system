<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $to = $_POST['to'];
    $subject = $_POST['subject'];
    $messageText = $_POST['messageText'];

    // Kết nối đến cơ sở dữ liệu
    $conn = new mysqli('localhost', 'username', 'password', 'database');

    // Kiểm tra kết nối
    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    }

    // Chuẩn bị và thực thi câu lệnh SQL để lưu dữ liệu
    $stmt = $conn->prepare("INSERT INTO your_table (email, subject, message) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $to, $subject, $messageText);

    if ($stmt->execute()) {
        echo 'Data saved successfully';
    } else {
        echo 'Failed to save data';
    }

    // Đóng kết nối
    $stmt->close();
    $conn->close();
} else {
    echo 'Invalid request method';
}
?>
