<?php
session_start();
error_reporting(0);
include('include/config.php');
if(!$_COOKIE['username-doctor']):
	header('location:index.php');
endif;
?>
<?php


if(isset($_POST['submit']))
{	
	$docid=$_SESSION['id'];
	$patname=$_POST['patname'];
$patcontact=$_POST['patcontact'];
$patemail=$_POST['patemail'];
$gender=$_POST['gender'];
$pataddress=$_POST['pataddress'];
$patage=$_POST['patage'];
$medhis=$_POST['medhis'];
$sql=mysqli_query($con,"insert into tblpatient(Docid,PatientName,PatientContno,PatientEmail,PatientGender,PatientAdd,PatientAge,PatientMedhis) values('$docid','$patname','$patcontact','$patemail','$gender','$pataddress','$patage','$medhis')");
if($sql)
{
echo "<script>alert('Patient info added Successfully');</script>";
header('location:add-patient.php');

}
}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Coonie | ADD</title>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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

	<script>
function userAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'email='+$("#patemail").val(),
type: "POST",
success:function(data){
$("#user-availability-status1").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>
	</head>
	<body>
		
	<?php include('./view-mb/header.php');?>


<?php include('./view-mb/sidebar_start.php');?>
						
<div class="main-content" style="width:900px">
<div class="wrap-content container" id="container" >
						
<a href="manage-patient.php" class="fa fa-eye"></a>
<center><h1 class="mainTitle">Thêm bệnh nhân</h1></center> 
</div>

</div>
</section>
<div class="container-fluid container-fullw bg-white" style="width:700px; margin-left:200px;">
<div class="row">
<div class="col-md-12">
<div class="row margin-top-30">
<div class="col-lg-8 col-md-12">
<div class="panel panel-white">
<div class="panel-heading">

</div>
<div class="panel-body">
<form role="form" name="" method="post">

<div class="form-group">
<label for="doctorname">
Tên bệnh nhân:
</label>
<input type="text" name="patname" class="form-control"  placeholder="Họ và Tên" required="true">
</div>
<div class="form-group">
<label for="fess">
 Số điện thoại:
</label>
<input type="text" name="patcontact" class="form-control"  placeholder="" required="true" maxlength="10" pattern="[0-9]+">
</div>
<div class="form-group">
<label for="fess">
 Email:
</label>
<input type="email" id="patemail" name="patemail" class="form-control"  placeholder="" required="true" onBlur="userAvailability()">
<span id="user-availability-status1" style="font-size:12px;"></span>
</div>
<div class="form-group">
<label class="block">
Giới tính:
</label>
<div class="clip-radio radio-primary">
<input type="radio" id="rg-female" name="gender" value="female" >
<label for="rg-female">
Nam
</label>
<input type="radio" id="rg-male" name="gender" value="male">
<label for="rg-male">
Nữ
</label>
</div>
</div>
<div class="form-group">
<label for="address">
Địa chỉ:
</label>
<textarea name="pataddress" class="form-control"  placeholder="" required="true"></textarea>
</div>
<div class="form-group">
<label for="fess">
Tuổi:
</label>
<input type="text" name="patage" class="form-control"  placeholder="" required="true">
</div>
<div class="form-group">
<label for="fess">
Bệnh án tiền sự:
</label>
<textarea type="text" name="medhis" class="form-control"  placeholder="" required="true"></textarea>
</div>	

<button type="submit" name="submit" id="submit" class="btn btn-o btn-primary" >
Thêm
</button>


</form>
</div>
</div>
<?PHP

include './view-mb/sidebar_end.php';



 