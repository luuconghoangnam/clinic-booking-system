<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông Tin Chi Tiết</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <?php
        // Lấy tham số từ URL
        if (isset($_GET['type'])) {
            $type = $_GET['type'];

            // Hiển thị nội dung dựa trên tham số
            if ($type == 'nvdt') {
                echo "<h1 style='text-align: center; color: #0B0B61;'>🚑 Quy Định Nhập Viện</h1>";
                echo "<table border='1' style='width: 100%; text-align: left;'>
                        <tr><th>STT</th><th>Quy Định</th></tr>
                        <tr><td>1</td><td>Chuẩn bị đầy đủ giấy tờ tùy thân (CMND/CCCD, thẻ bảo hiểm y tế).</td></tr>
                        <tr><td>2</td><td>Đăng ký thông tin tại quầy tiếp nhận bệnh nhân.</td></tr>
                        <tr><td>3</td><td>Tuân thủ hướng dẫn của nhân viên y tế về quy trình nhập viện.</td></tr>
                        <tr><td>4</td><td>Không mang theo các vật dụng nguy hiểm hoặc không cần thiết.</td></tr>
                      </table>";
            } elseif ($type == 'dvbh') {
                echo "<h1 style='text-align: center; color: #0B0B61;'>🏥 Thông Tin Bảo Hiểm</h1>";
                echo "<table border='1' style='width: 100%; text-align: left;'>
                        <tr><th>STT</th><th>Loại Bảo Hiểm</th></tr>
                        <tr><td>1</td><td>Bảo hiểm y tế nhà nước.</td></tr>
                        <tr><td>2</td><td>Bảo hiểm y tế tư nhân (Bảo Việt, PVI, Prudential, v.v.).</td></tr>
                        <tr><td>3</td><td>Hỗ trợ thanh toán trực tiếp tại bệnh viện.</td></tr>
                      </table>";
            } elseif ($type == 'qdtk') {
                echo "<h1 style='text-align: center; color: #0B0B61;'>🕛 Quy Định Thăm Khám</h1>";
                echo "<table border='1' style='width: 100%; text-align: left;'>
                        <tr><th>STT</th><th>Quy Định</th></tr>
                        <tr><td>1</td><td>Đặt lịch hẹn trước qua hệ thống trực tuyến hoặc tại quầy tiếp nhận.</td></tr>
                        <tr><td>2</td><td>Đến đúng giờ theo lịch hẹn để tránh ảnh hưởng đến các bệnh nhân khác.</td></tr>
                        <tr><td>3</td><td>Tuân thủ hướng dẫn của nhân viên y tế trong suốt quá trình thăm khám.</td></tr>
                        <tr><td>4</td><td>Thông báo ngay nếu có bất kỳ thay đổi nào về lịch hẹn.</td></tr>
                      </table>";
            } else {
                echo "<h1>Không tìm thấy thông tin phù hợp!</h1>";
            }
        } else {
            echo "<h1>Không có thông tin để hiển thị!</h1>";
        }
        ?>
        <br>
        <a href="index.php" style="color: #01c9f6;">Quay lại trang chủ</a>
    </div>
</body>
</html>