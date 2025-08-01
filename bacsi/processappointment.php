<?php
if(!$_COOKIE['username-doctor']):
	header('location:index.php');
endif;
 include './controller-mb/source-mb.php';
$p = new Mclass_mb;
 $id_doctor = $_COOKIE['id_doctor'];
 $lichhen = $p->show_lich_hen($id_doctor);	
 ?>
<?php 
include './view-mb/header.php';
include './view-mb/sidebar_start.php';
?>
<style>
	  body{
    font-family:times;
  }
  </style>
<br>
<br>

<div class="container" style="margin-left:50px;">
	<table class="table table-hover text-center">
  <thead>
    <tr>
      <th scope="col">STT</th>
      <th scope="col">Bệnh nhân</th>
      <th scope="col">Thời gian</th>
      <th scope="col">Ngày</th>
   <th scope="col">Xử lý</th>
    </tr>
  </thead>
  <tbody>
  	<?php	
	if(!empty($lichhen)):
		foreach ($lichhen as $key => $val) { 	
			$key++;
			$user = $p->show_info_byid($val['id_user']);
			$array_ngayhen = explode('_',$val['ngayhen']);
			$id_phieukham = $val['id_phieukham'];
			
			// echo $id_phieukham;
	?>		
    <tr>
      <th scope="row"><?php echo $key ;?></th>
      <td><?php echo $user['fullname'] ;?></td>
      <td>
      	<?php
      		if($array_ngayhen[0] == 1):
					echo "07:00 - 09:00 " ;
				elseif($array_ngayhen[0] == 2):
					echo "09:00 - 11:00 " ;
				elseif($array_ngayhen[0] == 3):
					echo "15:00 - 17:00 " ;
				else:
					echo "17:00 - 19:00 ";
				endif; 
      	?>
      </td>
      <td><?php echo date('j-m-Y', strtotime($array_ngayhen[1])) ;?></td>
     
      <td><button class="btn btn-outline-primary py-0 px-2" data-toggle="modal" data-target="#xuly<?php echo $key;?>">Lên toa.</button></td>
      <div class="modal fade" id="xuly<?php echo $key;?>" tabindex="-1" role="dialog" aria-hidden="true">
			  <div class="modal-dialog">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title">Xử lý phiếu khám</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body">
					<p><span class="font-weight-bolder">ID phiếu khám </span><span><?php echo $id_phieukham;?></span></p>
			        <p><span class="font-weight-bolder">Bệnh nhân: </span><span><?php echo $user['fullname'];?></span></p>
			        <p><span class="font-weight-bolder">Tuổi bệnh nhân: </span><span><?php echo $user['age'];?></span></p>
			        <p><span class="font-weight-bolder">Giới tính: </span><span><?php 
			        if($user['gioitinh'] == 'Male'):
			        	echo "Nam";
			        else:
			        	echo "Nữ";	
			        endif;
			        ?></span></p>
			        <p><span class="font-weight-bolder">Ca khám: </span><span><?php 
			        	if($array_ngayhen[0] == 1):
							echo "07:00 - 09:00 " ;
						elseif($array_ngayhen[0] == 2):
							echo "09:00 - 11:00 " ;
						elseif($array_ngayhen[0] == 3):
							echo "15:00 - 17:00 " ;
						else:
							echo "17:00 - 19:00 ";
						endif; 
			        ;?></span></p>
			        <p><span class="font-weight-bolder">Ngày khám: </span><span><?php echo date('j-m-Y',strtotime($array_ngayhen[1]));?></span></p>
			        <p><span class="font-weight-bolder">Địa chỉ : </span><span><?php echo $user['address'];?></span></p>
			        <p><span class="font-weight-bolder">Triệu chứng bệnh nhân kê khai: </span><span><?php echo $val['trieuchung'];?></span></p>
			        <form action="./controller-mb/save_prescription.php" method="POST">
			        <input type="hidden" name="id_phieukham" value="<?php echo $id_phieukham;?>">	
			        <div class="form-group">
					    <label class="font-weight-bolder">Chỉ dẫn:</label>
					    <textarea class="form-control" name='chidan' rows="3"></textarea>
					</div>

			        <div class="container" id="toathuoc">
			        	<?php for($i = 0;$i <= 3;$i++): ?>
			        	<div class="row">
			        		<div class="col">
						        	<select class="custom-select custom-select-sm" name="name<?php echo $i;?>">
									  <option value ="" selected>--Chọn thuốc--</option>
									  <option value="Paracetamol">Paracetamol</option>
									  <option value="Eugica">Eugica</option>
									  <option value="Tetracyclin">Tetracyclin</option>
									  
									</select>
			        		</div>
			        		<div class="col">
			        			<div class="form-group">
								    <!-- <label class="font-weight-bolder">Số lượng:</label> -->
								    <input type="number" class="form-control form-control-sm" name="sl<?php echo $i;?>" min=0 placeholder="Số lượng">
								</div>
			        		</div>
			        	</div>
			        	<?php	
			        		endfor;
			        	?>
			        </div>
			        <div class="text-center"><a class="btn btn-outline-info px-2 py-0" id="them">+</a></div> 
			      </div>
			      <div class="modal-footer">
			      	<button type="submit" name="xacnhan" class="btn btn-success px-3 py-0">Xác nhận</button>
			      	</form>
			        <a href="#" class="btn btn-secondary px-3 py-0" data-dismiss="modal">Đóng</a>
			      </div>
			    </div>
			 </div>
		</div>
    </tr>
    <?php
			}
		else:
			echo 'Không có lịch hẹn nào.';	
		endif;
	?>
  </tbody>
</table>
</div>
	</div>
<?php
include './view-mb/sidebar_end.php';
?>
<script type="text/javascript">
	 
		 var count = 1;
	 $('#them').on('click', function(){
	 	$('#toathuoc').append("<div class='row'><div class='col'><select class='custom-select custom-select-sm' name='name'><option selected>--Chọn thuốc--</option><option value='Paracetamol'>Paracetamol</option><option value='Eugica'>Eugica</option><option value='Tetracyclin'>Tetracyclin</option></select></div><div class='col'><div class='form-group'><input type='number' class='form-control form-control-sm' name='sl' min=0 placeholder='Số lượng'></div></div></div>");
	 	count++; 
		
	})
	
</script>
<br>
<?php
include './view-mb/footer.php';
?>