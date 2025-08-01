<?php 
	include './mvc/controller/source.php';
	$p = new Mclass;
	$username = $password = $fullname = $sdt = $email = $address ='';
	$error = ['username' => '', 'password' => '', 'fullname' => '', 'sdt' => '', 'email' => '', 'address' => ''];
	if(isset($_POST['signup'])):
		// Kiểm tra username
		if(!empty($_POST['username'])):
			$username = mysqli_real_escape_string($p->connDB(), $_POST['username']);
			$existUser = $p->exist_user($username);
			if($existUser):
				$error['username'] = 'Tên người dùng đã tồn tại. Xin chọn tên khác.'; 	
			endif;	
		else:
			$error['username'] = 'Không được để trống.';
		endif;
		//kiểm tra password
		if(!empty($_POST['password'])){
			$password = mysqli_real_escape_string($p->connDB(), $_POST['password']);
			if( strlen($password) < 2 && strlen($password) >= 30){ 
				$error['password'] = "Mật khẩu không hợp lệ !";
			}else {
			$password = md5($password);
			}
		}
		else{
				$error['password'] = 'Không được để trống.';	
			}
		//kiểm tra fullname
		if(!empty($_POST['fullname'])):
			$fullname = mysqli_real_escape_string($p->connDB(), $_POST['fullname']);
		else:
			$error['fullname'] = 'Không được để trống.';	
		endif;
		//kiểm tra sdt
		if(!empty($_POST['sdt'])):
			$sdt = mysqli_real_escape_string($p->connDB(), $_POST['sdt']);
			if(!preg_match("/^[0-9]{7,11}$/", $sdt)):
				$error['sdt'] = 'SDT không hợp lệ !';
			endif;	
		else:
			$error['sdt'] = 'Không được để trống.';	
		endif;

		if(!empty($_POST['email'])):
			$email = mysqli_real_escape_string($p->connDB(), $_POST['email']);
			if($p->exist_email($email)):
				$error['email'] = 'Email đã tồn tại.';
			endif;	
		else:
			$error['email'] = 'Không được để trống.';	
		endif;

		if(!empty($_POST['address'])):
			$address = mysqli_real_escape_string($p->connDB(), $_POST['address']);	
		else:
			$error['address'] = 'Không được để trống.';	
		endif;

		//thêm account vào CSDL	
		if(!array_filter($error)):
			$sql = "insert into user(username, password, fullname, address, sdt, email)
			values('$username', '$password', '$fullname', '$address', '$sdt', '$email')";
			if($p->multipleFunc($sql)):
			header('location:signin.php');
			endif;
		endif;	
	endif;	
?>
<?php include './mvc/view/header.php'; ?>
<div class="container" style="border-top: solid 1px #e5e5e5;">
	<div class="row mt-3 mb-2">
	
		</div>
	</div>	
	<div class="row">
		<div class="col"></div>
		<div class="col">
			<form action="signup.php" class="card p-3" method="POST">
				<h4 class="font-weight-bold" style="font-size:20px; text-align:center;">ĐĂNG KÍ</h4>
			  <div class="form-group">
			    <label class="font-weight-bolder" style="font-size:17px">Tên đăng nhập :</label><span class="text-danger"><?php echo $error['username']; ?></span>
			    <input type="text" class="form-control" name="username" value="<?php echo $username; ?>">
			  </div>
			  <div class="form-group">
			    <label class="font-weight-bolder" style="font-size:17px">Mật khẩu : </label><span class="text-danger"><?php echo $error['password']; ?></span>
			    <input type="password" class="form-control" name="password" >
			  </div>
			  <div class="form-group">
			    <label class="font-weight-bolder" style="font-size:17px">Họ và tên: </label><span class="text-danger"><?php echo $error['fullname']; ?></span>
			    <input type="text" class="form-control" name="fullname" value="<?php echo $fullname; ?>">
			  </div>
			  <div class="form-group">
			    <label class="font-weight-bolder" style="font-size:17px">Số điện thoại: </label><span class="text-danger"><?php echo $error['sdt']; ?></span>
			    <input type="text" class="form-control" name="sdt" value="<?php echo $sdt; ?>">
			  </div>
			  <div class="form-group">
			    <label class="font-weight-bolder" style="font-size:17px">Email: </label><span class="text-danger"><?php echo $error['email']; ?></span>
			    <input type="email" class="form-control" name="email" value="<?php echo $email; ?>">
			  </div>
			  <div class="form-group">
			    <label class="font-weight-bolder" style="font-size:17px">Địa chỉ: </label><span class="text-danger"><?php echo $error['address']; ?></span>
			    <input type="text" class="form-control" name="address" value="<?php echo $address; ?>">
			  </div>	  	
			  <button type="submit" class="btn btn-primary" name="signup"  style="font-size:20px">Đăng kí</button>
			</form>
		</div>
		<div class="col"></div>
	</div>
<br>
	<div class="text-center" >
		<span style="font-size:22px">Đã có tài khoản. <a href="signin.php" class="inline">Đăng Nhập.</a></span>
	</div>
</div>
<br>
<?php include './mvc/view/footer.php'; ?>