<?php
include_once('mvc/controller/config.php');
if(isset($_POST['submit']))
{
$name=$_POST['fullname'];
$email=$_POST['emailid'];
$mobileno=$_POST['mobileno'];
$dscrption=$_POST['description'];
$query=mysqli_query($con,"insert into tblcontactus(fullname,email,contactno,message) value('$name','$email','$mobileno','$dscrption')");
echo "<script>alert('Your information succesfully submitted');</script>";
echo "<script>window.location.href ='contect.php'</script>";

}


?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Coonie | Contact us</title>
		<link href="mvc/view/css/css.css" rel="stylesheet" type="text/css"  media="all" />
		<link href='http://fonts.googleapis.com/css?family=Ropa+Sans' rel='stylesheet' type='text/css'>
		<link rel="icon" type="image/png" href="./images/favicon.png">
	</head>
	<body style="background-color:white;">
		<!--start-wrap-->
		
			<!--start-header-->
			<div class="header">
				<div class="wrap">
				<!--start-logo-->
				<div class="logo">
		<a href="index.html" style="font-size: 30px;">BỆNH VIỆN ĐA KHOA PT</a> 
				</div>
				<!--end-logo-->
				<!--start-top-nav-->
				<div class="top-nav">
					<ul>
						<li><a href="index.php">Home</a></li>
					
					</ul>					
				</div>
				<div class="clear"> </div>
				<!--end-top-nav-->
			</div>
			<!--end-header-->
		</div>
		    <div class="clear"> </div>
		   <div class="wrap">
		   	<div class="contact">
		   	<div class="section group">				
				<div class="col span_1_of_3">
					
      			<div class="company_address">
				     	<h2>Địa chỉ  :</h2>
						    	<p>12 Nguyễn Văn Bảo,</p>
						   		<p>Phường 4, quận Gò Vấp</p>
						   		<p>HCM City</p>
				   		<p>Phone: 19001889</p>
				   		
				 	 	<p>Email: <span>PtCenter@gmail.com</span></p>
						  <Br>
						  <br>
						  <img src="./mvc/view/image/mm.gif" style="width:250px"></img>
				   	
				   </div>
				</div>				
				<div class="col span_2_of_3">
				  <div class="contact-form">
				  	<h2>𝙻𝙸Ê𝙽 𝙷Ệ 𝙲𝙷𝙾 𝙲𝙷Ú𝙽𝙶 𝚃Ô𝙸!!!!</h2>
					 
					    <form name="contactus" method="post">
					    	<div>
						    	<span><label>Họ & Tên</label></span>
						    	<span><input type="text" name="fullname" required="true" value=""></span>
						    </div>
						    <div>
						    	<span><label>E-MAIL</label></span>
						    	<span><input type="email" name="emailid" required="ture" value=""></span>
						    </div>
						    <div>
						     	<span><label>Số điện thoại</label></span>
						    	<span><input type="text" name="mobileno" required="true" value=""></span>
						    </div>
						    <div>
						    	<span><label>Description</label></span>
						    	<span><textarea name="description" required="true"> </textarea></span>
						    </div>
						   <div>
						   		<span><input type="submit" name="submit" value="Submit"></span>
						  </div>
					    </form>
				    </div>
  				</div>				
			  </div>
			  	 <div class="clear"> </div>
	</div>
	<div class="clear"> </div>
			</div>
	      <div class="clear"> </div>
		   <div class="footer">
		   	 <div class="wrap">
		   	<div class="footer-left">
		   			<ul>
						<li><a href="index.php">Home</a></li>
						
					
					</ul>
		   	</div>
		  
		   	<div class="clear"> </div>
		   </div>
		   </div>
		<!--end-wrap-->
	</body>

</html>
