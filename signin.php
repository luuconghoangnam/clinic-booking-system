<?php
include './mvc/controller/source.php';
$p = new Mclass;
$username = $password = '';
$error = ['username' => '', 'password' => '', 'all' => ''];
if(isset($_POST['signin'])):
	if(!empty($_POST['username'])):
		$username = mysqli_real_escape_string($p->connDB(), $_POST['username']);
		$checkUser = $p->exist_user($username);
		if($checkUser):
			if($checkUser['password'] == md5($_POST['password'])):
				// sử dụng cookie trong vòng 30 ngày sau 30 ngày phải đăng nhập lại
				setcookie('username', $username,strtotime("+30 days"));
				header('location:index.php');
			else:
				$error['all'] = "Thông tin không chính xác.";	
			endif;	
		else:
			$error['all'] = "Thông tin không chính xác.";	
		endif;	
	else:
		$error['username'] = "Không được để trống.";	
	endif;
	//kiểm tra password
	if(!empty($_POST['password'])):
	else:
		$error['password'] = "Không được để trống.";	
	endif;	
endif;	
?>


<?php
include './mvc/view/header.php';
?>

	

<div class="container" >
	<div class="row mt-12 mb-3" >
		
		</div>
	</div>	
	
	<div class="row" style="background-image: url('./images/jpg'); width: auto;" >
		<div class="col"></div>
		<div class="col">
	
		<br>
		<br>
			<form action="signin.php" class="card p-4" method="POST">
			<center class="font-weight-bold " style="font-size:25px" >Đăng Nhập</center>
				<p class="m-0 p-0 text-danger"><?php echo $error['all']; ?></p>	
				<div class="form-group">
			    <label class="font-weight-bolder" style="font-size:16px;">Tên tài khoản :</label><span class="text-danger"><?php echo $error['username']; ?></span>
			    <input type="text" class="form-control" name="username">
			  </div>
			  <div class="form-group">
			    <label class="font-weight-bolder" style="font-size:16px;">Mật khẩu:</label><span class="text-danger"><?php echo $error['password']; ?></span>
			    <input type="password" class="form-control" name="password">
			  </div>
			  <div class="row">
			  	<div class="col">
			  		<div class="checkbox" width="50%">
				    <label class="inline"><input type="checkbox"> Ghi nhớ tài khoản .</label>
				  	</div>
				</div>
			  	<div class="col">
			  		
			  	</div>
			  </div>	  	
			  <button type="submit" class="btn btn-primary" name="signin" style="font-size:16px;">Đăng nhập</button>
			</form>
		</div>
		<div class="col"></div>
	</div>
<br>
<div class="text-center">
	<span style="font-size:18px;">Bạn có muốn Đăng kí tài khoản !<a href="signup.php" class="inline" style="color:red;">Tạo tài khoản.</a></span>
</div>
<br>
<?php
include './mvc/view/footer.php';
?>