<?php
if(!$_COOKIE['username-director']):
	header('location:index.php');
endif;
include './controller-dr/source-dr.php';
$p = new Mclass_dr;
$username = $fullname = '';
$error = ['username' => '', 'password' => '', 'fullname' => '','id_khoa'=>'', 'working_address'=>''];
if(isset($_POST['add'])):

	if(!empty($_POST['username'])):
			$username = mysqli_real_escape_string($p->connDB(), $_POST['username']);
			$existDoctor = $p->exist_doctor($username);
			if($existDoctor):
				$error['username'] = 'Exist username.Choose the other'; 	
			endif;	
	else:
			$error['username'] = 'Empty value.';
	endif;

	if(!empty($_POST['password'])):
			$password = mysqli_real_escape_string($p->connDB(), $_POST['password']);
			if( strlen($password) < 2 && strlen($password) >= 30){ 
				$error['password'] = "Invalid password!";
			}else {
			$password = md5($password);
			}	
	else:
			$error['password'] = 'Empty value.';
	endif;

	if(!empty($_POST['fullname'])):
			$fullname = mysqli_real_escape_string($p->connDB(), $_POST['fullname']);	
	else:
			$error['fullname'] = 'Empty value.';
	endif;

	if(!empty($_POST['id_khoa'])):
			$id_khoa = mysqli_real_escape_string($p->connDB(), $_POST['id_khoa']);	
	else:
			$error['id_khoa'] = 'Empty value.';
	endif;

	if(!empty($_POST['working_address'])):
			$working_address = mysqli_real_escape_string($p->connDB(), $_POST['working_address']);	
	else:
			$error['working_address'] = 'Empty value.';
	endif;

	//kiểm tra tất cả dữ liệu
	if(!array_filter($error)):
		$sql = "insert into doctor(username, password, fullname,id_khoa, working_address, account) values('$username', '$password', '$fullname', '$id_khoa', '$working_address','active')";
		if($p->multipleFunc($sql)):
			header('location:manage_doctor.php');
			endif;
	endif;	
endif;	
?>
<?php
include './view-dr/header.php';
 include './view-dr/sidebar_start.php';
?>
<div class="container" style="width:1100px;">
<marquee style="color: blue; font-size:25px;   text-shadow: 5px 2px 4px grey; width:900px;">---THÊM BÁC SĨ!!!---</marquee>
	<div class="row justify-content-center" >
		<div class="col-6" >
			<form action="add_doctor.php" method="POST" class="card p-3">
				<div class="form-group" >
				    <label class="font-weight-bolder">Tên tài khoản:</label><span class="text-danger"><?php echo $error['username']; ?></span>
				    <input type="text" class="form-control" name="username" required="required" value="<?php echo $username;?>">
				</div>
				<div class="form-group">
				    <label class="font-weight-bolder">Mật khẩu: </label><span class="text-danger"><?php echo $error['password']; ?></span>
				    <input type="password" class="form-control" name="password" required="required">
				</div>
				<div class="form-group">
				    <label class="font-weight-bolder">Họ và tên: </label><span class="text-danger"><?php echo $error['fullname']; ?></span>
				    <input type="text" class="form-control" name="fullname" required="required" value="<?php echo $fullname;?>">
				</div>
				
					<div class="form-group">
						<span class="text-danger"><?php echo $error['id_khoa']; ?></span>
						<select class="custom-select custom-select-sm" name="id_khoa">
						  <option>Mời bạn chọn chuyên khoa</option>
						  <option value="1"
						  <?php 
						  	if(isset($_POST['add'])):
						  		if($_POST['id_khoa'] == '1'):
						  			echo "selected";
						  		endif;	
						  	endif;	
						  ?>>Khoa nội.</option>
						  <option value="2"
						  <?php 
						  	if(isset($_POST['add'])):
						  		if($_POST['id_khoa'] == '2'):
						  			echo "selected";
						  		endif;	
						  	endif;	
						  ?>>Khoa ngoại.</option>
						 <option value="3"
						  <?php 
						  	if(isset($_POST['add'])):
						  		if($_POST['id_khoa'] == '1'):
						  			echo "selected";
						  		endif;	
						  	endif;	
						  ?>>Khoa phục hồi chức năng.</option>
						</select>
					</div>
					<div class="form-group">
						<span class="text-danger"><?php echo $error['working_address']; ?></span>
						<select class="custom-select custom-select-sm" name="working_address">
						  <option>Mời bạn chọn chi nhánh.</option>
						  <option value="govap"
						  <?php 
						  	if(isset($_POST['add'])):
						  		if($_POST['working_address'] == 'govap'):
						  			echo "selected";
						  		endif;	
						  	endif;	
						  ?>>Hai Bà Trưng</option>
						  <option value="binhthanh"
						  <?php 
						  	if(isset($_POST['add'])):
						  		if($_POST['working_address'] == 'binhthanh'):
						  			echo "selected";
						  		endif;	
						  	endif;	
						  ?>>Bắc Từ Liêm</option>
						  <option value="thuduc"
						  <?php 
						  	if(isset($_POST['add'])):
						  		if($_POST['working_address'] == 'thuduc'):
						  			echo "selected";
						  		endif;	
						  	endif;	
						  ?>>Nam Từ Liêm</option>
						</select>
					</div>
				
				<button class="btn btn-primary my-3" name="add">Thêm tài khoản</button>
			</form>
		</div>
	</div>
</div>
<?php
include './view-dr/sidebar_end.php';?>
<br>
<?php
include './view-dr/footer.php'; ?>