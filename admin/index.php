<style>
    html, body {
    height: 100%; /* Đảm bảo chiều cao của HTML và body chiếm toàn bộ màn hình */
    margin: 0;
    display: flex;
    flex-direction: column; /* Sắp xếp các phần tử theo cột */
}

/* Nội dung chính của trang */
.wrapper {
    flex: 1; /* Đẩy footer xuống dưới bằng cách chiếm không gian còn lại */
}

/* Footer */
#htc__footer {
    background-color: #0B243B; /* Màu nền tối */
    color: white; /* Màu chữ */
    padding: 40px 0;
    font-size: 14px;
    line-height: 1.8;
    margin-top: auto; /* Đảm bảo footer luôn ở cuối */
}
</style>
<?php
include './view-dr/header.php';
include './signin.php';
include './view-dr/footer.php';
?>