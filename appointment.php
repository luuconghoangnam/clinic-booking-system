<?php
if(!$_COOKIE['username']):
	header('location:index.php');	
endif;
include './mvc/controller/source.php';
include './mvc/view/header.php';

include './mvc/view/sidebar_start.php';
$p = new Mclass;
$username = $_COOKIE['username']; 
$user = $p->show_info($username);
$lichkham = $p->show_lich_kham($user['id_user']);
	
?>
<style>
	  body{
    font-family:times;
  }
	</style>
<div class = "container"style="margin-left:90px; margin-top:80px;">
	<table class="table table-hover">
	  <thead>
	    <tr>
	      <th scope="col">STT</th>
	      <th scope="col">Bác sĩ</th>
	      <th scope="col">Ngày hẹn</th>
	      <th scope="col">Ngày đặt lịch</th>
		  <th scope="col">Thông tin</th>
	     
	    </tr>
	  </thead>
	  <tbody>
	  	<?php if($lichkham):
		foreach ($lichkham as $key => $val):
			$key++;
		?>

	    <tr>
	      <th scope="row"><?php echo $key ;?></th>
	      <td><?php echo ($p->show_info_doctor($val['id_doctor']))['fullname'];?></td>
	      <td>
	      	<?php 
	      		$array_ngayhen = explode('_', $val['ngayhen']);
	      		if($array_ngayhen[0] == 1):
					echo "07:00 - 09:00 / " . date('j-m-Y', strtotime($array_ngayhen[1]));
				elseif($array_ngayhen[0] == 2):
					echo "09:00 - 11:00 / " . date('j-m-Y', strtotime($array_ngayhen[1]));
				elseif($array_ngayhen[0] == 3):
					echo "15:00 - 17:00 / " . date('j-m-Y', strtotime($array_ngayhen[1]));
				else:
					echo "17:00 - 19:00 / " . date('j-m-Y', strtotime($array_ngayhen[1]));	
				endif;
	      	?>
	      		
	      </td>
	      <td><?php echo date('H:i:s j-m-Y', strtotime($val['created_at']));?></td>
	     
	      <td>
	      	<button class="btn btn-outline-primary px-2 py-0" data-toggle="modal" data-target="#chitiet<?php echo $key;?>">Chi tiết</button>
			</td>
			<td>
	      
	      </td>
	      	  <div class="modal fade" id="chitiet<?php echo $key;?>" tabindex="-1" role="dialog" aria-hidden="true">
			  <div class="modal-dialog">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title">Chi tiết lịch khám</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body">
			        <p><span class="font-weight-bolder">Bác sĩ: </span><span><?php echo ($p->show_info_doctor($val['id_doctor']))['fullname'];?></span></p>
			        <p><span class="font-weight-bolder">Ngày hẹn: </span><span><?php 
			      		$array_ngayhen = explode('_', $val['ngayhen']);
			      		if($array_ngayhen[0] == 1):
							echo "07:00 - 09:00 /" . date('j-m-Y', strtotime($array_ngayhen[1]));
						elseif($array_ngayhen[0] == 2):
							echo "09:00 - 11:00 /" . date('j-m-Y', strtotime($array_ngayhen[1]));
						elseif($array_ngayhen[0] == 3):
							echo "15:00 - 17:00 /" . date('j-m-Y', strtotime($array_ngayhen[1]));
						else:
							echo "17:00 - 19:00 /" . date('j-m-Y', strtotime($array_ngayhen[1]));	
						endif;
			      	?></span></p>
			        <p><span class="font-weight-bolder">Ngày đặt lịch: </span><span><?php echo date('H:i:s j-m-Y', strtotime($val['created_at']));?></span></p>
			        <p><span class="font-weight-bolder">Triệu chứng: </span><span><?php echo $val['trieuchung'];?></span></p>
			        <p><span class="font-weight-bolder">Tên người đặt: </span><span><?php echo $user['fullname'];?></span></p>
			        <p><span class="font-weight-bolder">Phí khám: </span><span><?php echo $val['phikham'].'.000vnđ';?></span></p>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-secondary px-3 py-0" data-dismiss="modal">Đóng</button>
			      </div>
			    </div>
			  	</div>
				</div>
			
		
		      <div class="modal fade" id="warning-del<?php echo $key;?>" tabindex="-1" role="dialog" aria-hidden="true">
			  <div class="modal-dialog modal-dialog-centered">
			    <div class="modal-content">
			      <!-- <div class="modal-header">
			        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
			        
			      </div> -->
			     
	    <?php	
		endforeach;
		else:
			echo 'Không có lịch khám.';
		endif;
		?>
	  </tbody>
	</table>
	<!-- modal warning xóa lịch khám -->
</div>
<?php include './mvc/view/sidebar_end.php'; ?> 
