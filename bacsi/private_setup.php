<?php
	if(!$_COOKIE['username-doctor']):
		header('location:index.php');	
	endif;
	include './controller-mb/source-mb.php';
?>
<?php
  include './view-mb/header.php';
  include './view-mb/sidebar_start.php';
  $p = new Mclass_mb;
  $id_doctor = $_COOKIE['id_doctor']; 
  $doctor = $p->show_info_doctor($id_doctor);
  
?>
<style>
	  body{
    font-family:times;
  }
  </style>
<div class="container " style="width:700px; margin-left:250px;">
	<div class="row mt-2">
		<div class="col-2">
			<p class="font-weight-bolder">Username:<p>
			<p class="font-weight-bolder">Password:</p>
			
		</div>
		<div class="col-2">
			<?php if($doctor): ;?>
			<p><?php echo $doctor['username'];?></p>	
			<p>********</p>
		
			<?php endif; ?>
		</div>
		&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
		<div class="col-2">
			<p style="padding-bottom: 24px;"></p>
			<p><a href="change_pass.php">Change<img src="view-mb/image/anh_dai_dien/edit.png" width="20px" class="ml-1"></a></p>
			
			
		</div>
	</div>
</div>
<?php include './view-mb/sidebar_end.php'; ?> 
<Br>
<Br>
<?php
include './view-mb/footer.php'; ?>
