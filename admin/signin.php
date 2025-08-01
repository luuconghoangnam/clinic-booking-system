<?php
include './controller-dr/source-dr.php';
$p = new Mclass_dr;
$username = $password = '';
$error = ['username' => '', 'password' => '', 'all' => ''];
if(isset($_POST['signin'])):
	if(!empty($_POST['username'])):
		$username = mysqli_real_escape_string($p->connDB(), $_POST['username']);
		$checkDirector = $p->exist_director($username);
		if($checkDirector):
			if($checkDirector['password'] == $_POST['password']):
				// sử dụng cookie trong vòng 30 ngày sau 30 ngày phải đăng nhập lại
				setcookie('username-director', $username, strtotime("+30 days"));
				setcookie('id_director', $checkDirector['id_director'], strtotime("+30 days"));
				header('location:./info_director.php');
			else:
				$error['all'] = "Không hợp lệ";	
			endif;	
		else:
			$error['all'] = "Incorrect username and password.";	
		endif;	
	else:
		$error['username'] = "Empty value.";	
	endif;
	//kiểm tra password
	if(!empty($_POST['password'])):
	else:
		$error['password'] = "Empty value.";	
	endif;	
endif;
?>
<div class="container" >
	<div class="row mt-3 mb-2">
		
		</div>
	</div>	
	
	<div class="row" style="height:450px; width: auto;" >
		<div class="col"></div>
		<div class="col">
			<br>
			<br>
			<form action="index.php" class="card p-3" method="POST">
				<center class="font-weight-bold " style="font-size:25px; font-family:Times New Roman; color:gray;">Đăng Nhập</center>
				<p class="m-0 p-0 text-danger"><?php echo $error['all']; ?></p>	
				<div class="form-group">
			    <label class="font-weight-bolder" style=" font-family:Times New Roman; color:gray;">Tên tài khoản :</label><span class="text-danger"><?php echo $error['username']; ?></span>
			    <input type="text" class="form-control" name="username">
			  </div>
			  <div class="form-group">
			    <label class="font-weight-bolder" style=" font-family:Times New Roman; color:gray;">Mật khẩu:</label><span class="text-danger"><?php echo $error['password']; ?></span>
			    <input type="password" class="form-control" name="password">
			  </div>
			  <div class="row">
			  	<div class="col">
			  		<div class="checkbox" width="50%">
				   
				  	</div>
				</div>
			  	
			  </div>	  	
			  <button type="submit" class="btn btn-primary" name="signin">Đăng nhập</button>
			</form>
		</div>
		<div class="col"></div>
	</div>
</div>
<?php
// include './view-dr/footer.php';
?>