<?php
	if(!$_COOKIE['username']):
		header('location:signin.php');	
	endif;
	include './mvc/controller/source.php';
?>
<?php
include './mvc/view/header.php';

// $p = new Mclass;
//   $username = $_COOKIE['username']; 
//   $user = $p->show_info($username);   
?>
<style>
  body{
    font-family:times;
  }
  </style>
<div class="container" >
  <br>
	<div class="row mt-5" >

	
<br>
<br>
		<div class="col-5" style="margin-left:350px;">
			<form action="makeAppointmentStep2.php" method="POST">
				<h3 class="font-weight-bold text-center" style="color:blue;">ĐẶT LỊCH</h3>
				
				<div class="form-group mt-4">
                      <label class="font-weight-bolder" style="font-size:18px;">Chuyên khoa: </label>
                      <select class="form-control" name="id_khoa">
                       	<option value="1">Khoa nội</option>
                        <option value="2">Khoa ngoại</option>
                        <option value="3">Khoa phục hồi chức năng</option>
                        <!--<option value="4">Khoa xét nghiệm</option>
                        <option value="5">Khoa dinh dưỡng</option>-->
                      </select>
                      <small class="form-text text-muted">
                        <p class="m-0">- Xin vui lòng liên hệ qua hotline để được tư vấn chọn chuyên khoa.</p>
                      <p>- Phí khám: 120.000vnđ.</p>
                      </small>
                </div>

				<div class="form-group mb-4">
                      <label class="font-weight-bolder" style="font-size:18px;">Chọn chi nhánh: </label>
                      <select class="form-control" name="working_address">
                        <option value="govap">Hai Bà Trưng</option>
                        <option value="binhthanh">Bắc Từ Liêm </option>
                        <option value="thuduc">Nam Từ Liêm </option>
                       <!--<option value="tanbinh">Quận Tân Bình</option>
                        <option value="phunhuan">Quận Phú Nhuận</option>
                        <option value="1">Quận 1</option>
                        <option value="5">Quận 5</option>
                        <option value="9">Quận 9</option>
                        <option value="12">Quận 12</option>-->
                      </select>
                </div>
          <div class="form-group">
            <label class="font-weight-bolder" style="font-size:18px;">Triệu chứng bệnh:</label>
            <textarea class="form-control" name ='trieuchung' rows="3" required="required"></textarea>
          </div>      
                <div class="text-center mt-4"><button type="submit" name="next" class="btn btn-primary">Xác Nhận</button></div>
			</form>
		</div>


	</div>
</div>
