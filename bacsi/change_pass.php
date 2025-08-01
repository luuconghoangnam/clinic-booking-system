<?php
	if(!$_COOKIE['username-doctor']):
		header('location:index.php');	
	endif;
	include './controller-mb/source-mb.php';
	$p = new Mclass_mb;
	$username = $_COOKIE['username-doctor'];
	$id_doctor = $_COOKIE['id_doctor'];
	$error = ['old_password' => '', 'new_password'=>'', 'confirm_new_password' => ''];
	if(isset($_POST['changePass'])):
		$old_password = mysqli_real_escape_string($p->connDB(), $_POST['old_password']);
		$old_password = md5($old_password);
		$new_password = mysqli_real_escape_string($p->connDB(), $_POST['new_password']);
		$confirm_new_password = mysqli_real_escape_string($p->connDB(), $_POST['confirm_new_password']);
		$doctor = $p->show_info_doctor($id_doctor);
		$passworddoctor = $doctor['password'];
		if($old_password != $passworddoctor):
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
			$sql = "update doctor
					set password = '$final_password'
					where username = '$username' ";
			if($p->multipleFunc($sql)):
				$success = 'Success changing your password.';
			endif;		
		endif;	
	endif;	
?>
<?php
  include './view-mb/header.php';
  include './view-mb/sidebar_start.php'; 
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
			    <label>Old password:</label><span class="text-danger"><?php echo $error['old_password'] ;?></span>
			    <input type="password" class="form-control" name="old_password" required="required">
			</div>
			<div class="form-group">
			    <label>New password:</label><span class="text-danger"><?php echo $error['new_password'];?></span>
			    <input type="password" class="form-control" name="new_password" required="required">
			</div>
			<div class="form-group">
			    <label>Confirm New password:</label><span class="text-danger"><?php echo $error['confirm_new_password'];?></span>
			    <input type="password" class="form-control" name="confirm_new_password" required="required">
			</div>
			<button type="submit" name="changePass" class="btn btn-primary">Change</button>
		</form>
		<p class="font-weight-bolder text-success"><?php echo $success ?? ''; ?></p>
	</div>	
</div>

<?php include './view-mb/sidebar_end.php'; ?>
<br>
<?php
include './view-mb/footer.php'; ?>
