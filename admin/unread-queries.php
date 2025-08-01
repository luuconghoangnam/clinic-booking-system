<?php
session_start();
error_reporting(0);
include('include/cf.php');
if(!$_COOKIE['username-director']):
	header('location:index.php');
endif;


if(isset($_GET['del']))
		  {
		          mysqli_query($con,"delete from doctor where id = '".$_GET['id']."'");
                  $_SESSION['msg']="data deleted !!";
		  }
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Coonie | TRUY VAN CHUA DOC</title>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
		<link rel="icon" type="image/png" href="./images/favicon.png">
	
<?php include('view-dr/header.php');
include './view-dr/menu_dr.php';?>
<style>
	  body{
    font-family:times;
  }
  </style>
<br>
			<div class="app-content">
				
					
					
				<!-- end: TOP NAVBAR -->
				<div class="main-content" >
					<div class="wrap-content container" id="container">
						<!-- start: PAGE TITLE -->
						<section id="page-title">
							<div class="row">
								<div class="col-sm-12">
									
								<h2 class="mainTitle" style="text-align:center; color:blue; "> TẤT CẢ CÂU HỎI ĐÁP !!</h2>
									
																	</div>
								
							</div>
						</section>
						<br>

						<!-- end: PAGE TITLE -->
						<!-- start: BASIC EXAMPLE -->
						<div class="container-fluid container-fullw bg-white">
						

									<div class="row">
								<div class="col-md-12">
								
									<table class="table table-hover" id="sample-table-1">
										<thead>
											<tr>
												<th class="center">STT</th>
												<th>Họ & Tên</th>
												<th class="hidden-xs">E-mail</th>
												<th>Số điện thoại </th>
												<th>Message </th>
												<th>Action</th>
												<th>Hoàn thành</th>
												
											</tr>
										</thead>
										<tbody>
<?php
$sql=mysqli_query($con,"select * from tblcontactus where IsRead is null");
$cnt=1;
while($row=mysqli_fetch_array($sql))
{
?>

											<tr>
												<td class="center"><?php echo $cnt;?>.</td>
												<td class="hidden-xs"><?php echo $row['fullname'];?></td>
												<td><?php echo $row['email'];?></td>
												<td><?php echo $row['contactno'];?></td>
												<td><?php echo $row['message'];?></td>
												
												<td >
												<div class="visible-md visible-lg hidden-sm hidden-xs">
							<a href="query-details.php?id=<?php echo $row['id'];?>" class="btn btn-transparent btn-lg" title="View Details"><i class="fa fa-heart"></i></a>
												</div>
												
														
														</ul>
													</div>
												</div></td>
												<td style="text-align:center;"><input type="checkbox" name="sport" value="Reply" ></td>
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
						<!-- end: BASIC EXAMPLE -->
						<!-- end: SELECT BOXES -->
						
					</div>
				</div>
			</div>
			<!-- start: FOOTER -->
	
			<!-- end: FOOTER -->
		
			<!-- start: SETTINGS -->
	
	</body>
</html>
