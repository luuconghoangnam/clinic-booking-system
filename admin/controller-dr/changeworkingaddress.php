<?php
include './source-dr.php';
$p = new Mclass_dr;
if(isset($_POST['change'])):
	if(!empty($_POST['working_address'])):
		$working_address = $_POST['working_address'];
		$id_doctor = $_POST['id_doctor'];
		$sql = "update doctor set working_address = '$working_address' where id_doctor='$id_doctor' ";
		$p->multipleFunc($sql);
		header('location:../manage_doctor.php');
	else:
		header('location:../manage_doctor.php');	
	endif;	
endif;	
?>