<?php
include './source-dr.php';
$p = new Mclass_dr;
if(isset($_POST['del'])):
	$id_tintuc = $_POST['id_tintuc'];
	$sql = "delete from tintuc where id_tintuc = '$id_tintuc' ";
	if($p->multipleFunc($sql)):
		header('location:../manage_posts.php');
	else:
		echo 'Lỗi';
	endif;		
endif;
?>