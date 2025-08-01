<?php
session_start();
error_reporting(0);
include('include/cf.php');
if(!$_COOKIE['username-director']):
	header('location:index.php');
endif;

//updating Admin Remark
if(isset($_POST['update']))
		  {
$qid=intval($_GET['id']);
$adminremark=$_POST['adminremark'];
$isread=1;
$query=mysqli_query($con,"update tblcontactus set  AdminRemark='$adminremark',IsRead='$isread' where id='$qid'");
if($query){
echo "<script>alert('Admin Remark updated successfully.');</script>";
echo "<script>window.location.href ='read-query.php'</script>";
}
		  }
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Coonie | TRA LOI</title>
		<link rel="icon" type="image/png" href="./images/favicon.png">
	</head>
	<body>
	
		<?php include('view-dr/header.php');
include './view-dr/sidebar_start.php';?>
			<div class="app-content">
				
						
					
				<!-- end: TOP NAVBAR -->
				<div class="main-content" >
					<div class="wrap-content container" id="container">
						<!-- start: PAGE TITLE -->
						<section id="page-title">
							<div class="row">
								<div class="col-sm-12">
									<h2 class="mainTitle" style="text-align:center; color: red; margin-left:300px; ">𝑻𝑹𝑨̉ 𝑳𝑶̛̀𝑰 𝑪𝑶𝑵𝑻𝑨𝑪𝑻 𝑼𝑺!!!!</h2>
																	</div>
								
							</div>
						</section>
						<!-- end: PAGE TITLE -->
						<!-- start: BASIC EXAMPLE -->
						<div class="container-fluid container-fullw bg-white" style="margin-left:190px;">
						

									<div class="row">
								<div class="col-md-12">
									
									<table class="table table-hover" id="sample-table-1">
		
										<tbody>
<?php
$qid=intval($_GET['id']);
$sql=mysqli_query($con,"select * from tblcontactus where id='$qid'");
$cnt=1;
while($row=mysqli_fetch_array($sql))
{
?>

											<tr>
												<th>Họ & Tên</th>
												<td><?php echo $row['fullname'];?></td>
											</tr>

											<tr>
												<th>Email </th>
												<td><?php echo $row['email'];?></td>
											</tr>
											<tr>
												<th>Số điện thoại</th>
												<td><?php echo $row['contactno'];?></td>
											</tr>
											<tr>
												<th>Message</th>
												<td><?php echo $row['message'];?></td>
												</tr>

<?php if($row['AdminRemark']==""){?>	
<form name="query" method="post">
	<tr>
												
										
												

<tr>
												
											<?php 
											 }} ?>
											
											
										</tbody>
									</table>
								</div>
							</div>
								</div>
							</div>
						</div>
						<!-- end: BASIC EXAMPLE -->
						<!-- end: SELECT BOXES -->
						
					</div>
				</div>
			</div>
			<?php
include './view-dr/footer.php'; ?>