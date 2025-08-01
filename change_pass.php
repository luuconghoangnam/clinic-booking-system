<?php
	if(!$_COOKIE['username']):
		header('location:index.php');	
	endif;
	include './mvc/controller/source.php';
	$p = new Mclass;
	$username = $_COOKIE['username'];
	$error = ['old_password' => '', 'new_password'=>'', 'confirm_new_password' => ''];
	if(isset($_POST['changePass'])):
		$old_password = mysqli_real_escape_string($p->connDB(), $_POST['old_password']);
		$old_password = md5($old_password);
		$new_password = mysqli_real_escape_string($p->connDB(), $_POST['new_password']);
		$confirm_new_password = mysqli_real_escape_string($p->connDB(), $_POST['confirm_new_password']);
		$user = $p->show_info($username);
		$passwordUser = $user['password'];
		if($old_password != $passwordUser):
			$error['old_password'] = 'Wrong password.';
		endif;
		// strlen($password) < 2 && strlen($password) >= 30
		if(strlen($new_password) < 2 && strlen($new_password) >= 30):
			$error['new_password'] = 'invalid password';
		endif;	
		if($new_password != $confirm_new_password):
			$error['confirm_new_password'] = 'Incorrect confirm password.';	
		endif;

		if(!array_filter($error)):
			$final_password = md5($new_password);
			$sql = "update user
					set password = '$final_password'
					where username = '$username' ";
			if($p->multipleFunc($sql)):
				$success = 'Success changing your password.';
			endif;		
		endif;	
	endif;	
?>
<?php
  include './mvc/view/header.php';

  include './mvc/view/sidebar_start.php';
  $p = new Mclass;
  $username = $_COOKIE['username']; 
  $user = $p->show_info($username);
  
?>
<style>
	body{
		font-family:times;
	}
	</style>
<div class="container mt-3" style="width:600px; margin-left:250px;">
	<div class="col-5">
		<form action="change_pass.php" method="post" class="mb-2">
			<div class="form-group">
			    <label>Mật khẩu cũ:</label><span class="text-danger"><?php echo $error['old_password'] ;?></span>
			    <input type="password" class="form-control" name="old_password" required="required">
			</div>
			<div class="form-group">
			    <label>Mật khẩu mới:</label><span class="text-danger"><?php echo $error['new_password'];?></span>
			    <input type="password" class="form-control" name="new_password" required="required">
			</div>
			<div class="form-group">
			    <label>Nhập lại mật khẩu mới:</label><span class="text-danger"><?php echo $error['confirm_new_password'];?></span>
			    <input type="password" class="form-control" name="confirm_new_password" required="required">
			</div>
			<button type="submit" name="changePass" class="btn btn-primary">Xác nhận</button>
		</form>
		<p class="font-weight-bolder text-success"><?php echo $success ?? ''; ?></p>
	</div>	
</div>

<?php include './mvc/view/sidebar_end.php'; ?>
