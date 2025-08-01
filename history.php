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
  $lichsukham = $p->show_lichsu_khambenh($user['id_user']);
?>
<style>
	  body{
    font-family:times;
  }
  </style>
<div class="container" style="margin-left:150px; margin-top:80px;">
  <table class="table table-hover text-center">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Bác sĩ</th>
      <th scope="col">Ngày khám</th>
      <th scope="col">Tổng phí</th>
      <th scope="col">Chi tiết</th>
    </tr>
  </thead>
  <tbody>
    <?php if(!empty($lichsukham)):
            foreach ($lichsukham as $key => $val):
              $key++;
              $array_ngayhen = explode('_',$val['ngayhen']);
              $toathuoc = $p->show_toathuoc($val['id_phieukham']);
    ?>                 
    <tr>
      <th scope="row"><?php echo $key ?></th>
      <td><?php $doctor = $p->show_info_doctor($val['id_doctor']);
                echo $doctor['fullname'];           
          ?></td>
      <td>
        <?php
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
      <td><button class="btn btn-outline-primary py-0 px-2" data-toggle="modal" data-target="#chitiet<?php echo $key?>">Chi tiết</button></td>
      <div class="modal fade" id="chitiet<?php echo $key?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title font-weight-bolder">CHI TIẾT KHÁM</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p><span class="font-weight-bolder">Bác sĩ: </span><span><?php echo $doctor['fullname'];?></span></p>
              <p><span class="font-weight-bolder">Ngày khám bệnh: </span><span><?php 
                 if($array_ngayhen[0] == 1):
                    echo "07:00 - 09:00 / " . date('j-m-Y', strtotime($array_ngayhen[1]));
                  elseif($array_ngayhen[0] == 2):
                    echo "09:00 - 11:00 / " . date('j-m-Y', strtotime($array_ngayhen[1]));
                  elseif($array_ngayhen[0] == 3):
                    echo "15:00 - 17:00 / " . date('j-m-Y', strtotime($array_ngayhen[1]));
                  else:
                    echo "17:00 - 19:00 / " . date('j-m-Y', strtotime($array_ngayhen[1])); 
                  endif; 
              ;?></span></p>
              <p><span class="font-weight-bolder">Địa điểm khám bệnh: </span><span><?php echo $user['address'];?></span></p>
              <p><span class="font-weight-bolder">Triệu chứng bệnh nhân kê khai: </span><span><?php echo $val['trieuchung'];?></span></p>
              <p><span class="font-weight-bolder">Chỉ dẫn của bác sĩ: </span><span><?php echo $val['chidan'];?></span></p>
              <p class="font-weight-bolder mb-2">Toa thuốc:</p>
              <div class="container mb-3" style="border: solid 1px #e5e5e5;">
                <div class="row text-center" style="border-bottom:solid 1px #e5e5e5;padding-top: 8px;">
                  <div class="col"><p class="font-weight-bolder">Tên thuốc</p></div>
                  <div class="col"><p class="font-weight-bolder">Số lượng</p></div>
                  <div class="col"><p class="font-weight-bolder">Giá</p></div>
                </div>
                <?php
                  if(!empty($toathuoc)):
                    $tongtienthuoc = 0;
                    foreach ($toathuoc as $key => $val1):
                ?>
                <div class="row text-center">
                  <div class="col"><?php echo $val1['name'];?></div>
                  <div class="col"><?php echo $val1['sl'];?></div>
                  <div class="col"><?php $tongtienthuoc += $val1['tongtien'];
                  echo $val1['tongtien'].'.000vnđ';?></div>
                </div>
                <?php  
                    endforeach;
                  else:
                    "Không có toa thuốc nào.";  
                  endif;  
                ?>
                <div class="row text-right" style="border-top: solid 1px #e5e5e5; ">
                  <div class="col"><span class="font-weight-bolder">Tổng tiền thuốc + phí khám: </span><span><?php echo $tongtienthuoc.'.000vnđ'.' + '.$val['phikham'].'.000vnđ'. ' = '.($tongtienthuoc+$val['phikham']).'.000vnđ' ;?></span></div>
                </div>
              </div>      
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary px-3 py-0" data-dismiss="modal">Đóng</button>
            </div>
          </div>
          </div>
        </div>
    </tr>
    <?php   
            endforeach;
          else:
            echo 'Bạn đã chưa khám lần nào.';
          endif;
    ?>   
  </tbody>
</table>
</div>
<?php include './mvc/view/sidebar_end.php'; ?> 