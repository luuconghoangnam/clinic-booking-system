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
if(!$_COOKIE['username-director']):
	header('location:index.php');
endif;
include './controller-dr/source-dr.php';
$p = new Mclass_dr;
$username = $_COOKIE['username-director']; 
$director = $p->show_info_director($_COOKIE['id_director']);

if(isset($_POST['update'])):
    $fullname = mysqli_real_escape_string($p->connDB(), $_POST['fullname']);
    $gioitinh = mysqli_real_escape_string($p->connDB(), $_POST['gioitinh']);
    $age = mysqli_real_escape_string($p->connDB(), $_POST['age']);
    $sdt = mysqli_real_escape_string($p->connDB(), $_POST['sdt']);
    $address = mysqli_real_escape_string($p->connDB(), $_POST['address']);
    $sql = "update director 
            set fullname = '$fullname', gioitinh = '$gioitinh', age = '$age', sdt = '$sdt', address = '$address' 
            where username = '$username' ";
    if($p->multipleFunc($sql)):
      header('location:info_director.php');
    else:
      echo 'Lỗi cập nhập.Xin thử lại.';  
    endif;        
  endif;

  if(isset($_POST['change_image'])):
    $name_image = mysqli_real_escape_string($p->connDB(), $_FILES['image']['name']);
    move_uploaded_file($_FILES['image']['tmp_name'], './view-dr/image/anh_dai_dien' . '/' . $name_image);
    $sql = "update director
            set image = '$name_image'
            where username = '$username' ";
    if($p->multipleFunc($sql)):
      header('location:info_director.php');
    endif;
    // print_r($_FILES['image']);
    // echo './mvc/view/image/anh_dai_dien' . '/' . $name_image;         
  endif;	
?>
<?php
include './view-dr/header.php';
include './view-dr/sidebar_start.php';
?>
<br>
<br>
<div class="container" >
	<div class="row">
          <div class="col-2"></div>
          <div class="col-3 text-center">
            
            <img src="./view-dr/image/anh_dai_dien/<?php echo $director['image'] == true ? $director['image'] :'demo_avatar.jpeg';?>" width="150px" height="150px">
            <p><a href ="#" data-toggle="modal" data-target="#change_image">Thay đổi ảnh</a></p>
            <div class="modal fade" id="change_image" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-body">
                    <form action="info_director.php" method="POST" enctype="multipart/form-data">
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
          <?php if($director): ?> 
          <div class="col-3" style="margin-left:50px;">
            <p class="font-weight-bolder">Họ và Tên:</p>
            <p class="font-weight-bolder">Giới tính:</p>
            <p class="font-weight-bolder">Tuổi:</p>
            <p class="font-weight-bolder">Số điện thoại:</p>  
            <p class="font-weight-bolder">Địa chỉ:</p>
          </div>
          <div class="col-3" style="width:300px;">
            <p><?php echo $director['fullname']; ?></p>
            <p><?php echo $director['gioitinh'] == false ? 'Chưa cung cấp': $director['gioitinh']; ?></p>
            <p><?php echo $director['age'] == false ? 'Chưa cung cấp': $director['age']; ?></p>
            <p><?php echo $director['sdt']; ?></p>
            <p><?php echo $director['address']; ?></p> 
          </div>
          <?php endif;?>
          <div class="col-2"></div> 
        </div>

        <div class="row m-4">
          <div class="col text-center"><button class="btn btn-primary" data-toggle="modal" data-target="#modalUpdate">Cập nhập</button></div>
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
                  <form action="info_director.php" method="POST">
                    <div class="form-group">
                      <label class="font-weight-bolder">Họ và tên: </label>
                      <input type="text" class="form-control" name="fullname" value="<?php echo $director['fullname']; ?>">
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
                      <input type="number" class="form-control" name="age" value="<?php echo $director['age'] == true ? $director['age'] : ''; ?>">
                    </div>
                    <div class="form-group">
                      <label class="font-weight-bolder">Số điện thoại: </label>
                      <input type="text" class="form-control" name="sdt"  minlength="8" maxlength="12" required="required" value="<?php echo $director['sdt']; ?>">
                    </div>
                    <div class="form-group">
                      <label class="font-weight-bolder">Địa chỉ: </label>
                      <input type="text" class="form-control" name="address" minlength="8" maxlength="80" required="required" value="<?php echo $director['address']; ?>">
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
<?php
include './view-dr/sidebar_end.php';
?>
<br>
<?php
include './view-dr/footer.php'; ?>