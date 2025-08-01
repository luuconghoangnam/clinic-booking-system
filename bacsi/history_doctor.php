<?php
if(!$_COOKIE['username-doctor']):
	header('location:index.php');
endif;
 include './controller-mb/source-mb.php';
 $p = new Mclass_mb;
 $id_doctor = $_COOKIE['id_doctor'];
 $lichsuchua = $p->show_lichsu_chuabenh($id_doctor);
 // print_r($benhan);	
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
<div class="container-fluid" style="margin-left:50px;">
<table class="table table-hover text-center">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Bệnh nhân</th>
      <th scope="col">Ca làm</th>
      <th scope="col">Ngày</th>
      <th scope="col">Địa chỉ</th>
      <th scope="col">Phí</th>
   
    </tr>
  </thead>
  <tbody>
  	<?php	
	 
	         if(($lichsuchua)):
		foreach ($lichsuchua as $key => $val) { 	
			$key++;
			$user = $p->show_info_byid($val['id_user']);
			$array_ngayhen = explode('_',$val['ngayhen']);
			$toathuoc = $p->show_toathuoc($val['id_phieukham']);
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
      <td><?php echo $user['address'] ;?></td>
      <td>
        <?php 
          if(!empty($toathuoc)):
              $tongtienthuoc = 0;
              foreach ($toathuoc as $key => $val1):
                 $tongtienthuoc +=$val1['tongtien'];
              endforeach;
              $tongtienthuoc+=$val['phikham'];
          endif;
          echo $tongtienthuoc.'.000vnđ';  
        ?>  
      </td>
     
			      </div>
			    </div>
			 </div>
		</div>
    </tr>
    <?php
			}
		else:
			echo 'Không có phiếu khám nào.';	
		endif;
	?>
  </tbody>
</table>
</div>
<?php
include './view-mb/sidebar_end.php';
?>
<br>
<br>
<?php
include './view-mb/footer.php'; ?>