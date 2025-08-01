<?php
session_start();
error_reporting(0);
include('include/config.php');
if(!$_COOKIE['username-director']):
	header('location:index.php');
endif;



if(isset($_GET['del']))
		  {
		          mysqli_query($con,"delete from user where id = '".$_GET['id']."'");
                  $_SESSION['msg']="data deleted !!";
		  }
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Coonie | Manage Users</title>
		<link rel="icon" type="image/png" href="./images/favicon.png">
		
		
	<body>
		<div id="app">		
		<?php include('view-dr/header.php');
include './view-dr/sidebar_start.php';?>
			<div class="app-content">
				
						
			
				<div class="main-content" style="margin-left:50px; width:900px" >
					<div class="wrap-content container" id="container">
					
						<section id="page-title">
							<div class="row">
								<div class="col-sm-12">
								<marquee style="color: blue; font-size:25px;   text-shadow: 5px 2px 4px grey;">---QUẢN LÝ NGƯỜI DÙNG!!!---</marquee>
							</div>
						</section>
					
						<div class="container-fluid container-fullw bg-white">
						

									<div class="row">
								<div class="col-md-14">
									
									<p style="color:red;"><?php echo htmlentities($_SESSION['msg']);?>
								<?php echo htmlentities($_SESSION['msg']="");?></p>	
									<table class="table table-hover" id="sample-table-1">
										<thead>
											<tr>
												<th class="center">STT</th>
												<th>Họ & Tên</th>
												<th class="hidden-xs">Địa chỉ</th>
										
												<th>SĐT </th>
												<th>Email </th>
												<th>Creation Date </th>
												
												<th>Action</th>
												
											</tr>
										</thead>
										<tbody>
<?php
$sql=mysqli_query($con,"select * from user");
$cnt=1;
while($row=mysqli_fetch_array($sql))
{
?>

											<tr>
												<td class="center"><?php echo $cnt;?>.</td>
												<td class="hidden-xs"><?php echo $row['fullname'];?></td>
												<td><?php echo $row['address'];?></td>
												<td><?php echo $row['sdt'];?>
												</td>
												
												<td><?php echo $row['email'];?></td>
												<td><?php echo $row['created_at'];?></td>
												
												</td>
												<td >
												<div class="visible-md visible-lg hidden-sm hidden-xs">
							
													
	<a href="manage-users.php?id=<?php echo $row['id']?>&del=delete" onClick="return confirm('Are you sure you want to delete?')"class="btn btn-transparent btn-xs tooltips" tooltip-placement="top" tooltip="Remove"><i class="fa fa-times fa fa-white"></i></a>
												</div>
												<div class="visible-xs visible-sm hidden-md hidden-lg">
													<div class="btn-group" dropdown is-open="status.isopen">
													
														</button>
														
													</div>
												</div></td>
											</tr>
											
											<?php 
$cnt=$cnt+1;
											 }?>
											
											
										</tbody>
									</table>
								</div>
							</div>
								</div>
							</div>
						</div>
						
