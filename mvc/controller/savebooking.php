<?php 
	session_start();
	include './source.php';
	$p = new Mclass;
	$user = $p->show_info($_COOKIE['username']);
	$id_user = $user['id_user'];
	// $_SESSION['ngayhen'] = $_POST['ngayhen'];
	$id_doctor = $_SESSION['id_doctor'];
	$trieuchung = $_SESSION['trieuchung'];
	if(isset($_POST['datlich'])):
		$ngayhen = $_POST['ngayhen'];
		$_SESSION['ngayhen'] = $ngayhen;
		$sql = "insert into phieukham(ngayhen,id_user,id_doctor,trieuchung,chidan,phikham)
				values('$ngayhen', '$id_user', '$id_doctor', '$trieuchung',null,'120')";
		if($p->multipleFunc($sql)):
			header('location:../../successbooking.php');
		endif;			
	endif;	
?>