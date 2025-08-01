<?php
include './source-dr.php';
$p = new Mclass_dr;
if(isset($_POST['resetpassword'])):
	$id_doctor = $_POST['id_doctor'];
	$sql = "update doctor set password = md5('123') where id_doctor = '$id_doctor' ";
	$p->multipleFunc($sql);
	header('location:../manage_doctor.php');
endif;	
?>