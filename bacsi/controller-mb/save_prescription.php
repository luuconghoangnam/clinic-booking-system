<?php 

include '../../mvc/controller/source.php';
$p = new Mclass;
if(isset($_POST['xacnhan'])):
	$id_phieukham = $_POST['id_phieukham'];
	$chidan = $_POST['chidan'];
	$sql_chidan = "update phieukham set chidan = '$chidan' where id_phieukham = '$id_phieukham' ";
	for($i = 0;$i <= 10; $i++):
		if(!empty($_POST["name"."$i"])):
			$name = $_POST["name"."$i"];
			$sl = $_POST["sl"."$i"];
			$dongia = 10;
			$tongtien = $_POST["sl"."$i"] * $dongia;
			$sql = "insert into thuoc(name,sl,dongia,tongtien,id_phieukham) values('$name', '$sl', '$dongia', '$tongtien',$id_phieukham)";
			$p->multipleFunc($sql);
		endif;
	endfor;
	$p->multipleFunc($sql_chidan);
	header('location:../processappointment.php');

endif;	

?>