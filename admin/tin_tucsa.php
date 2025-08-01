<?php
session_start();
error_reporting(0);
include('include/config.php');
if(!$_COOKIE['username-director']):
	header('location:index.php');
endif;
?>
<?php

?>
 <?php

include './view-dr/header.php';
 include './view-dr/sidebar_start.php';
?>


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Thêm Tin Tức</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="tin_tuc_codesa.php" method="POST" enctype=multipart/form-data>

        <div class="modal-body">   
           <div class="form-group">
                <label>Tên </label> 
                <input type="text" name="tua_de" class="form-control" required >
            </div>
            <div class="form-group">
                <label>Hình Ảnh </label>
                <input type="file" name="image"  id="anh" class="form-control" required >
            </div>       
           
            <div class="form-group">
                <label>Tin tức</label>
                <textarea name="tin_tuc" id="tt" rows="15"  class="form-control" required></textarea>                
            </div>           
            <div class="form-group">
                <label>URL</label>
                <input type="text" name="url" class="form-control" required>
            </div>
			<div class="form-group">
                <label>Tên URL</label>
                <input type="text" name="ten_url" class="form-control" required>
            </div> 
			<div class="form-group">
                <label>Create at</label>
                <input type="text" name="ngay_dang" readonly class="form-control" required value="<?php echo date("d-m-Y");?>" >
            </div>
            
        </div>
        <div class="modal-footer">           
            <button type="submit" name="add_tt" class="btn btn-primary">Lưu</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
        </div>
      </form>

    </div>
  </div>
</div>


<div class="container-fluid" style="width:1050px;">
<h1 class="h3 mb-2 text-gray-800" style="margin-left:400px; color:blue;">QUẢN LÝ TIN TỨC</h1>

 <?php 
        if(isset($_SESSION['success'])&& $_SESSION['success']!='')
        {
          echo '
          <div class="alert alert-success">
            '.$_SESSION['success'].'
          </div>'
          ;
          unset($_SESSION['success']);
        }

        if(isset($_SESSION['status'])&& $_SESSION['status']!='')
        {
          echo '
          <div class="alert alert-danger">
            '.$_SESSION['status'].'
          </div>';
          unset($_SESSION['status']);
        }
?>
<!-- DataTales Example -->
<div class="card shadow mb-4" style="margin-left:100px;">
  <div class="card-header py-3" >    
      <button style="background-color:white; color:blue;"type="button" id="add_button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
        Thêm Tin Tức
      </button>     
  </div>
        <div class="card-body"  style="width:100%;">      
         <div class="table-responsive">

        <?php  
          
          $query = "SELECT * FROM tin_tuc order by id desc";
          $query_run= mysqli_query($con,$query);
        ?>
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <div class="row">
          <form action="" method="post" >
            <div class="col-sm-12 col-md-6">
            <div id="dataTable_filter" class="dataTables_filter">            
             <label for="search" >Tìm kiếm             
                 <input type="text" name="search" id="search_text" class="form-control form-control-sm" placeholder="" aria-controls="dataTable">
              </label>               
            </div>
          </div>           
          </form>         
        </div>
        <thead align="center">
          <tr>
           <th>STT </th>
           <th>Tên </th>
           <th>Tin Tức </th>
           <th style="width: 400px">Hình Ảnh</th>                    
		   <th>URL </th>
			  <th>Tên URL</th>
			<th>Create at</th>  
                       
           <th> </th>
           <th> </th>           
          </tr>
        </thead>
        <tbody>

        <?php 
        if(mysqli_num_rows($query_run)>0)
        {
          $serial_number=0;
         
          while ($row=mysqli_fetch_assoc($query_run)) 
          {
             $serial_number++;
            
            ?>      
            <tr>
                  <th><?php echo $serial_number; ?> </th>
                  <th><?php echo $row['TuaDe']; ?></th>
                  <td> <?php echo $row['TinTuc']; ?></td>
                  <td> <?php echo '<img src="view-dr/image/'.$row['img'].'" width="150px;" height="150px" alt="Image">' ?></td>
                
                  <td> <?php echo $row['url']; ?></td>
				<td> <?php echo $row['ten_url']; ?></td>
				<td> <?php echo $row['NgayDang']; ?></td>
                  
      
                  <td>
                      <form action="tin_tuc_editsa.php" method="POST">
                          <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>" >
                          <button style="background-color:white; color:black;" type="submit" name="edit_btn" class="btn btn-success">Edit</button>                        
                      </form>
                  </td>
                  <td>
                      <form action="tin_tuc_codesa.php" method="POST">
                        <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
                        <button type="submit" name="delete_btn" class="btn btn-danger"> Del</button>
                      </form>
                  </td>
              </tr>
      <?php     
          }
        }
        else{
          echo "No record found";
        } 
      ?>
          
      
        
        </tbody>
      </table>

    </div>
  </div>
</div>
    
      </div>
     


 <?php 
 


  