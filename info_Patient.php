<?php 
	if(!$_COOKIE['username']):
		header('location:index.php');	
	endif;
	include './mvc/controller/source.php';
  $p = new Mclass;
  $username = $_COOKIE['username']; 
  $user = $p->show_info($username);

  if(isset($_POST['update'])):
    $fullname = mysqli_real_escape_string($p->connDB(), $_POST['fullname']);
    $gioitinh = mysqli_real_escape_string($p->connDB(), $_POST['gioitinh']);
    $age = mysqli_real_escape_string($p->connDB(), $_POST['age']);
    $sdt = mysqli_real_escape_string($p->connDB(), $_POST['sdt']);
    $address = mysqli_real_escape_string($p->connDB(), $_POST['address']);
    $sql = "update user 
            set fullname = '$fullname', gioitinh = '$gioitinh', age = '$age', sdt = '$sdt', address = '$address' 
            where username = '$username' ";
    if($p->multipleFunc($sql)):
      header('location:info_Patient.php');
    else:
      echo 'Lỗi cập nhập.Xin thử lại.';  
    endif;        
  endif;

  if(isset($_POST['change_image'])):
    $name_image = mysqli_real_escape_string($p->connDB(), $_FILES['image']['name']);
    move_uploaded_file($_FILES['image']['tmp_name'], './mvc/view/image/anh_dai_dien' . '/' . $name_image);
    $sql = "update user
            set image = '$name_image'
            where username = '$username' ";
    if($p->multipleFunc($sql)):
      header('location:info_Patient.php');
    endif;
    // print_r($_FILES['image']);
    // echo './mvc/view/image/anh_dai_dien' . '/' . $name_image;         
  endif;  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR Code Generator</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
    <style>
        .qr-container {
            margin-top: 20px;
        }
        .qr-container canvas {
            margin: auto;
        }
        /* Style cho footer */
#htc__footer {
    background-color: #0B243B; /* Màu nền tối */
    color: white; /* Màu chữ */
    padding: 40px 0;
    font-size: 14px;
    line-height: 1.8;
}

#htc__footer h2 {
    font-size: 18px;
    font-weight: bold;
    margin-bottom: 20px;
    color: #01c9f6; /* Màu xanh nhạt */
}

#htc__footer p {
    margin-bottom: 15px;
    color: #d1d1d1; /* Màu chữ nhạt hơn */
}

#htc__footer .ft__list li {
    margin-bottom: 10px;
    color: #d1d1d1;
}

#htc__footer .ft__social__link ul {
    list-style: none;
    padding: 0;
    display: flex;
    gap: 10px;
}

#htc__footer .ft__social__link ul li a {
    color: white;
    font-size: 18px;
    transition: color 0.3s ease;
}

#htc__footer .ft__social__link ul li a:hover {
    color: #01c9f6; /* Màu xanh nhạt khi hover */
}

#htc__footer .news__input input {
    width: 100%;
    padding: 10px;
    border-radius: 5px;
    border: none;
    margin-bottom: 10px;
}

#htc__footer .send__btn a {
    display: inline-block;
    background-color: #01c9f6;
    color: white;
    padding: 10px 20px;
    border-radius: 5px;
    text-decoration: none;
    transition: background-color 0.3s ease;
}

#htc__footer .send__btn a:hover {
    background-color: #0B0B61; /* Màu xanh đậm hơn khi hover */
}
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
</head>
<body>
<?php
  include './mvc/view/header.php';

  include './mvc/view/sidebar_start.php';
  // include './mvc/view/footerfooter.php';
  
?>


&emsp; 
          <!-- chỗ thêm content user nào  -->
<style>
  .row a {
    background-color: white;
    color:black;
  }
  body{
    font-family:times;
  }
  </style>
        <!-- info -->
        <div class="row" style="padding-top: 70px; margin-left:30px;">
          <div class="col-2"></div>
          <div class="col-3 text-center" style="padding-right: 200px; ">
            <img src="./mvc/view/image/anh_dai_dien/<?php echo $user['image'] == true ? $user['image'] :'demo_avatar.jpeg';?>" width="150px" height="150px">
            <p style="width:150px; padding-top:20px; padding-left:5px;"><a href ="#" data-toggle="modal" data-target="#change_image">Thay đổi ảnh</a></p>
            <div class="modal fade" id="change_image" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-body">
                    <form action="info_Patient.php" method="POST" enctype="multipart/form-data">
                      <div class="form-group">
                        <input type="file" class="form-control-file" name="image">
                      </div>
                  </div>
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" name="change_image">Lưu</button>
                    <a href='#' class="btn btn-secondary" data-dismiss="modal">Đóng</a>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php if($user): ?> 
          <div class="col-3">
            <p class="font-weight-bolder">Họ và Tên:</p>
            <p class="font-weight-bolder">Giới tính:</p>
            <p class="font-weight-bolder">Tuổi:</p>
            <p class="font-weight-bolder">Số điện thoại:</p>  
            <p class="font-weight-bolder">Địa chỉ:</p>
          </div>
          <div class="col-4.5 ">
            <p><?php echo $user['fullname']; ?></p>
            <p><?php echo $user['gioitinh'] == false ? "<span class='font-italic font-weight-light'>Chưa cung cấp</span>": $user['gioitinh']; ?></p>
            <p><?php echo $user['age'] == false ? "<span class='font-italic font-weight-light'>Chưa cung cấp</span>": $user['age']; ?></p>
            <p><?php echo $user['sdt'] == false ? "<span class='font-italic font-weight-light'>Chưa cung cấp</span>": $user['sdt']; ?></p>
            <p><?php echo $user['address'] == false ? "<span class='font-italic font-weight-light'>Chưa cung cấp</span>": $user['address']; ?></p> 
          </div>
          <?php endif;?>
          <div class="col-2"></div> 
        </div>

        <div class="row m-4">
          <div class="col text-center"><button class="btn btn-primary" data-toggle="modal" data-target="#modalUpdate">Cập nhập</button></div>
          <div class="col text-center"><button class="btn btn-primary" onclick="generateQRCode()">Tạo QR</button></div>
          <div id="qrcode" class="qr-container text-center"></div>
          <div class="modal fade" id="modalUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Cập nhập thông tin</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form action="info_Patient.php" method="POST">
                    <div class="form-group">
                      <label class="font-weight-bolder">Họ và tên: </label>
                      <input type="text" class="form-control" name="fullname" value="<?php echo $user['fullname']; ?>">
                    </div>
                    <div class="form-group">
                      <label class="font-weight-bolder">Giới tính: </label>
                      <select class="form-control" name="gioitinh">
                        <option value="Male">Nam</option>
                        <option value="Female">Nữ</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label class="font-weight-bolder">Tuổi: </label>
                      <input type="number" class="form-control" name="age" value="<?php echo $user['age'] == true ? $user['age'] : ''; ?>">
                    </div>
                    <div class="form-group">
                      <label class="font-weight-bolder">Số điện thoại: </label>
                      <input type="text" class="form-control" name="sdt"  minlength="8" maxlength="12" required="required" value="<?php echo $user['sdt']; ?>">
                    </div>
                    <div class="form-group">
                      <label class="font-weight-bolder">Địa chỉ: </label>
                      <input type="text" class="form-control" name="address" minlength="8" maxlength="80" required="required" value="<?php echo $user['address']; ?>">
                    </div>  
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary" name="update">Lưu</button>
                  <a href="#" class="btn btn-secondary" data-dismiss="modal">Đóng</a>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

</div>

<?php include './mvc/view/sidebar_end.php'; ?> 

<script>
    function generateQRCode() {
        var qrcodeContainer = document.getElementById('qrcode');
        qrcodeContainer.innerHTML = ""; // Clear previous QR code
        new QRCode(qrcodeContainer, {
            text: "https://www.facebook.com/cooniesetthespree", // URL or text to encode
            width: 128,
            height: 128
        });
    }
</script>
</body>
</html> 
<footer id="htc__footer">
    <div class="footer__container bg__cat--1">
        <div class="container">
            <div class="row">
                <!-- About Us -->
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="footer">
                        <h2 class="title__line--2">ABOUT US</h2>
                        <p>
                            Chúng tôi là một hệ thống y tế chuyên nghiệp, cung cấp các dịch vụ khám chữa bệnh chất lượng cao với đội ngũ bác sĩ giàu kinh nghiệm.
                        </p>
                        <div class="ft__social__link">
                            <ul class="social__link">
                                <li><a href="https://twitter.com/"><i class="icon-social-twitter icons"></i></a></li>
                                <li><a href="https://www.instagram.com/"><i class="icon-social-instagram icons"></i></a></li>
                                <li><a href="https://www.facebook.com/cooniesetthespree"><i class="icon-social-facebook icons"></i></a></li>
                                <li><a href="https://www.google.com.vn/"><i class="icon-social-google icons"></i></a></li>
                                <li><a href="https://www.linkedin.com/"><i class="icon-social-linkedin icons"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Locations -->
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="footer">
                        <h2 class="title__line--2">CƠ SỞ</h2>
                        <ul class="ft__list">
                            <li>Cơ sở Hà Nội: Tòa nhà Polyco, đường Trịnh Văn Bô, quận Nam Từ Liêm, Hà Nội.</li>
                            <li>Cơ sở Bắc Ninh: Làng Đại học, phường Võ Cường, thành phố Bắc Ninh, tỉnh Bắc Ninh.</li>
                        </ul>
                    </div>
                </div>

                <!-- Newsletter -->
                <div class="col-md-4 col-sm-12 col-xs-12">
                    <div class="footer">
                        <h2 class="title__line--2">NEWSLETTER</h2>
                        <p>Đăng ký nhận thông tin mới nhất từ chúng tôi:</p>
                        <div class="news__input">
                            <input type="email" placeholder="Your Email*">
                            <div class="send__btn">
                                <a class="fr__btn" href="#">Send</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

