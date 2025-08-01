<?php
session_start();
error_reporting(0);
include('include/config.php');
if(!$_COOKIE['username-doctor']):
	header('location:index.php');
endif;
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Coonie | Manage Patients</title>
		
		<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="vendor/themify-icons/themify-icons.min.css">
		<link href="vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
		<link href="vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
		<link href="vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" media="screen">
		<link href="vendor/select2/select2.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-datepicker/bootstrap-datepicker3.standalone.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" media="screen">
		<link rel="stylesheet" href="assets/css/styles.css">
		<link rel="stylesheet" href="assets/css/plugins.css">
		<link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" />
		<link rel="icon" type="image/png" href="./images/favicon.png">
	</head>
	<body>
		<div id="app">		
		<?php include('./view-mb/header.php');?>


<?php include('./view-mb/sidebar_start.php');?>
						<!-- start: PAGE TITLE -->
<section id="page-title">
<div class="row">
<div class="col-sm-12">
<center><h2 class="mainTitle"  style="color:blue; font-family:tahoma;">QUẢN LÝ BỆNH NHÂN</h2></center>
</div>
<style>
	  body{
    font-family:times;
  }
  </style>
</div>
</section>
<div class="container-fluid container-fullw bg-white">
<div class="row">
<div class="col-md-12" style="margin-left:30px;">

	
<table class="table table-hover" id="sample-table-1">
<thead>
<tr>
<th class="center">STT</th>
<th>Tên bệnh nhân</th>
<th>Số điện thoại</th>
<th>Giới tính </th>
<th>Ngày thành lập</th>
<th>Ngày cập nhật </th>
<th>Hoạt động</th>
</tr>
</thead>
<tbody>
<?php
$docid=$_SESSION['id'];
$sql=mysqli_query($con,"select * from tblpatient where Docid='$docid' ");
$cnt=1;
while($row=mysqli_fetch_array($sql))
{
?>
<tr>
<td class="center"><?php echo $cnt;?>.</td>
<td class="hidden-xs"><?php echo $row['PatientName'];?></td>
<td><?php echo $row['PatientContno'];?></td>
<td><?php echo $row['PatientGender'];?></td>
<td><?php echo $row['CreationDate'];?></td>
<td><?php echo $row['UpdationDate'];?>
</td>
<td>

<a href="edit-patient.php?editid=<?php echo $row['ID'];?>"><i class="fa fa-edit"></i></a> 

</td>
</tr>
<?php 
$cnt=$cnt+1;
 }?></tbody>
</table>
</div>
</div>
</div>
</div>
</div>
</div>
	</body>
</html>
<br>
<br>
<?php
include './view-mb/footer.php'; ?>
