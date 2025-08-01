<?php
session_start();
error_reporting(0);
include('include/config.php');
if(!$_COOKIE['username-director']):
	header('location:index.php');
endif;

?>
<style>
	  body{
    font-family:times;
  }
  </style>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Coonie | View Patients</title>
		<link rel="icon" type="image/png" href="./images/favicon.png">
			

	 <?php include 'view-dr/header.php';
	 include './view-dr/sidebar_start.php';?>
	 <Br>
	 <Br>
<div class="app-content" >

<div class="main-content" style="margin-left:50px;">
<div class="wrap-content container" id="container">
						<!-- start: PAGE TITLE -->
<section id="page-title">
<div class="row">
	
<div class="col-sm-12">
<h3 class="mainTitle" style="text-align:center;"> Hãy nhập tên bạn muốn tìm hoặc số điện thoại</h3>
</div>

</div>
</section>
<div class="container-fluid container-fullw bg-white">
<div class="row">
<div class="col-md-12">
	<form role="form" method="post" name="search">

<div class="form-group">
<label for="doctorname">
Tìm kiếm theo tên/Số điện thoại.
</label>
<input type="text" name="searchdata" id="searchdata" class="form-control" value="" required='true'>
</div>

<button type="submit" name="search" id="submit" class="btn btn-o btn-primary">
Search
</button>
</form>
<?php
if(isset($_POST['search']))
{ 

$sdata=$_POST['searchdata'];
  ?>
  <h4 align="center">Kết quả cho từ khóa "<?php echo $sdata;?>" mà bạn muốn tìm kiếm </h4>
<table class="table table-hover" id="sample-table-1">
<thead>
<tr>
<th class="center">STT</th>
<th>Họ và Tên</th>
<th>SĐT</th>
<th>Email </th>

<th>Địa chỉ </th>
<th>Tạo ra vào thời gian <th>

</tr>
</thead>
<tbody>
<?php

$sql=mysqli_query($con,"select * from user where fullname like '%$sdata%'|| sdt like '%$sdata%'");
$num=mysqli_num_rows($sql);
if($num>0){
$cnt=1;
while($row=mysqli_fetch_array($sql))
{
?>
<tr>
<td class="center"><?php echo $cnt;?>.</td>
<td class="hidden-xs"><?php echo $row['fullname'];?></td>
<td><?php echo $row['sdt'];?></td>
<td><?php echo $row['email'];?></td>

<td><?php echo $row['address'];?>
<td><?php echo $row['created_at'];?>
</td>
<td>



</td>
</tr>
<?php 
$cnt=$cnt+1;
} } else { ?>
  <tr>
    <td colspan="8"> No record found against this search</td>

  </tr>
   
<?php } }?></tbody>
</table>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
	
		<!-- end: JavaScript Event Handlers for this page -->
		<!-- end: CLIP-TWO JAVASCRIPTS -->
	</body>
</html>
<br>
<?php
include './view-dr/footer.php'; ?>