<?php
	if(!$_COOKIE['username']):
		header('location:index.php');	
	endif;
	include './mvc/controller/source.php';
?>
<?php
  include './mvc/view/header.php';
 
  include './mvc/view/sidebar_start.php';
  $p = new Mclass;
  $username = $_COOKIE['username']; 
  $user = $p->show_info($username);
 
  
?>

<div class = "container">
	<style>
  .row a {
    background-color: white;
    color:black;
  }
  body{
	  font-family:times;
  }
  </style>
<center><h2>Thông tin tài khoản.</h2></center>
<center><hr width="800px"></center>
	<div class="row mt-2">
		<div class="col-2"></div>
		<div class="col-1.5">
			<p class="font-weight-bolder">Tên tài khoản<p>
			<p class="font-weight-bolder">Mật khẩu</p>
		
		</div>
		<div class="col-1">
			<p class="font-weight-bolder">:<p>
			<p class="font-weight-bolder">:</p>
		
		</div>
		<div class="col-3">
			<?php if($user): ;?>
			<p><?php echo $user['username'];?></p>	
			<p>********</p>
		
			<?php endif; ?>
		</div>
		&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
		<div class="col-6.5">
			<p style="padding-bottom: 24px;"></p>
			<p><a href="change_pass.php">Cập Nhật<img src="./mvc/view/image/cn.png" width="20px" class="ml-1"></a></p>
			
			
		</div>
	</div>
</div>
<?php include './mvc/view/sidebar_end.php'; ?> 
