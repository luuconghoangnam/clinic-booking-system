<?php
include './source.php';
$p = new Mclass;
if(isset($_POST['del_lichhen'])):
	$id_phieukham = $_POST['id_phieukham'];
	$sql = "delete from phieukham where id_phieukham ='$id_phieukham' ";
	if($p->multipleFunc($sql)):
		header('location:../../appointment.php');
	endif;
endif;
?>