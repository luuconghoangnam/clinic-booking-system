<?php

include('include/config.php');

 

if (isset($_POST['add_tt'])) 
{
  $tua_de = $_POST['tua_de'];
  $image = $_FILES['image']['name'];
  $tintuc = $_POST['tin_tuc'];
  $url = $_POST['url']; 
  $ten_url=$_POST['ten_url'];
  


      $query = "
      INSERT INTO tin_tuc(TuaDe,TinTuc,img,url,ten_url,NgayDang) 
      VALUES('$tua_de','$tintuc','$image','$url','$ten_url','$ngay_dang')"; 
      $query_run = mysqli_query($con,$query);

      if ($query_run) 
      { 
        move_uploaded_file($_FILES["image"]["tmp_name"],"anh_dai_dien/".$_FILES["image"]["name"]);
        $_SESSION['success']="Thêm Thành Công";
        header('Location: tin_tucsa.php');
      } 
      else {
        
        $_SESSION['status']="Thêm Thất Bại";
        header('Location: tin_tucsa.php ');
        
      }
  
}  



if(isset($_POST['update_btn']))
 {
 		
	 	$id =$_POST['edit_id'];
    $edit_tuade = $_POST['edit_tuade'];
	$edit_tintuc = $_POST['edit_tintuc'];
	$edit_image = $_FILES['edit_image']['name'];
	$edit_url = $_POST['edit_url'];
	$edit_ngay_dang = $_POST['edit_ngay_dang'];
	$edit_manv = $_POST['edit_manv'];
	$edit_ten_url = $_POST['edit_ten_url'];
 		$query= "
    UPDATE tin_tuc
    SET TuaDe ='$edit_tuade',
        TinTuc ='$edit_tintuc',         
        img='$edit_image', 
        url='$edit_url',
		ten_url='$edit_ten_url',
		NgayDang='$edit_ngay_dang',
        MaNhanVien='$edit_manv'         
    WHERE id ='$id'";
 		$query_run = mysqli_query($con,$query);

    if ($query_run) {
    
        move_uploaded_file($_FILES["image"]["tmp_name"],"view-dr/image/".$_FILES["image"]["name"]);
        $_SESSION['success']="Sửa Thành Công";
        header('Location: tin_tucsa.php');
    } else {
  
      $_SESSION['status']= "Sửa Thất Bại";
      header('Location: tin_tucsa.php');
    }
 	
 		
 }
 	
  
  if(isset($_POST['delete_btn']))
 {
 		$id = $_POST['delete_id'];
 		
 		$query= "DELETE FROM tin_tuc WHERE  id ='$id'";
 		$query_run = mysqli_query($con,$query);

 		if ($query_run) {
 			
 			$_SESSION['success']= "Xóa Thành Công";
 			header('Location:tin_tucsa.php');
 		} else {
 			
 			$_SESSION['status']= "Xóa Thất Bại";
 			header('Location:tin_tucsa.php');
 		}
 }


$output ='';

if(isset($_POST['query'])){
  $search=$_POST['query'];
  $stmt=$con->prepare("SELECT * FROM tin_tuc WHERE 
TuaDe LIKE CONCAT('%',?,'%')") ;
  $stmt->bind_param("ss",$search,$search);


}
else{
  $stmt=$con->prepare("SELECT * FROM tin_tuc ");

}
$stmt->execute();
$result=$stmt->get_result();
$serial_number=0;
if ($result->num_rows>0) {


  $output .='
  <div class="table-responsive">
  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
  <thead align="center">
              <tr>
               <th>STT </th>
           <th>Tựa Đề </th>
           <th>Tin Tức</th>
           <th>Hình Ảnh</th>          
           <th>URL </th>
			  <th>Tên URL</th>
			<th>Ngày Đăng</th>  
           <th>Mã Nhân Viên </th> 
               <th> </th>
               <th> </th> 
             </tr>
             </thead>
             <tbody>';
              while ($row=mysqli_fetch_assoc($query_run)) 
          {
             $serial_number++;                      
              $output.='
          <tr>
                  <td>'.$serial_number.'</td>
                  <td>'.$row['TuaDe'].'</td>
                  <td>'.$row['TinTuc'].'</td>
                  <td><img src="view-dr/image/'.$row['img'].'" width="100px;" height="100px" alt="Image"></td>
  				  <td>'.$row['url'].'</td>
				  <td>'.$row['ten_url'].'</td>
				  <td>'.$row['NgayDang'].'</td>
                                 
                  <td>'.$row['MaNhanVien'].'</td>
                                          
                  <td>
                      <form action="tin_tuc_edit.php" method="POST">
                          <input type="hidden" name="edit_id" value="'.$row['id'].'" >
                          <button type="submit" name="edit_btn" class="btn btn-success"> Sửa</button>                        
                      </form>
                  </td>
                  <td>
                      <form action="tin_tuc_code.php" method="POST">
                        <input type="hidden" name="delete_id" value="'.$row['id'].'">
                        <button type="submit" name="delete_btn" class="btn btn-danger"> XÓa</button>
                      </form>
                  </td>
              </tr>';              
             }
             $output.="</tbody>";
             echo $output;  
} else {
  echo "<h3> No Records Found!</h3>";
}
  
  ?>