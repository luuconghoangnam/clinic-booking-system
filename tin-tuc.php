<?php include 'head_f/header.php';
        include 'head_f/slide.php';
$conn = mysqli_connect('localhost', 'root', '', 'adminpanel');
$kq = mysqli_query($conn, 'select count(id) as total from tin_tuc');
$row = mysqli_fetch_assoc($kq);
$tong_banghi = $row['total'];
$trang_hientai = isset($_GET['page']) ? $_GET['page'] : 1;
$gioihan = 3;
$tong_trang = ceil($tong_banghi / $gioihan);
if ($trang_hientai > $tong_trang){
    $trang_hientai = $tong_trang;
}
else if ($trang_hientai < 1){
    $trang_hientai = 1;
}
$start = ($trang_hientai - 1) * $gioihan;

$query = "SELECT * FROM tin_tuc LIMIT $start, $gioihan";
          $query_run= mysqli_query($connection,$query);
?>
        <div class="container-fluid py-2">
             <div class="container">
             <ol class="breadcrumb p-0 mb-0">
                            <li class="breadcrumb-item"><a href="">Trang Chủ</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Tin Tức</li>
                </ol>
             </div>
         </div>   

         <div class="container-fluid pb-4">
             <div class="container">
                 <div class="row">
                    <div class="col-md-12">
                        <div class="card" >                            
                            <div class="card-body">
                                <div class="card-body p-0">
                                            <ul class="list-group list-group-flush">
                                            <?php                                          
        
                                                while ($row=mysqli_fetch_assoc($query_run)) 
                                                { ?>                                                         
                                                <li class="list-group-item p-2"  style="background: #fefefe;">
                                                        <div class="large" >
                                                             <img class="mr-3 rounded" src="admin/anh_nhan_vien/<?=$row['img'] ?>" width="250px;" height="160px" align="left"  href="tin-tucct.php?id=<?=$row['id'] ?>" alt="Image">                                                           
                                                            <div class="media-body" >
                                                            <a class="text-dark" href="tin-tucct.php?id=<?= $row['id'] ?>"   ><h5 class="mt-0 mb-0"> <?php echo $row['TuaDe']; ?></h5></a>
                                                            <br>
                                                            <div align="right">
                                                            <p class="date-time hidden-xs hidden-sm"><i class="fa fa-calendar" aria-hidden="true"></i> <span  style="font-size: 12px; text-align: right; font-style: italic"><?php echo $row["NgayDang"] ?></span>
                                                            </p>      
                                                            </div>                                                                                                                         
                                                            </div>
                                                        </div>

                                                       
                                                </li>
                                                <?php     
          
                                                    } 
                                                ?>

                                                                                                       
                            </div>

                             
                        </div>
                         <div style="text-align: center;">
                            <ul class="pagination modal-2" >
           <?php 
            if ($trang_hientai > 1 && $tong_trang > 1){
                echo '<ul><a href="tin-tuc.php?page='.($trang_hientai-1).'" class="prev">&laquo</a> </ul>';
            }
 
            // Lặp khoảng giữa
            for ($i = 1; $i <= $tong_trang; $i++){
                // Nếu là trang hiện tại thì hiển thị thẻ span
                // ngược lại hiển thị thẻ a
                if ($i == $trang_hientai){
                    echo '<li><a class="active">'.$i.'</a> </li> ';
                }
                else{
                    echo '<li><a href="tin-tuc.php?page='.$i.'">'.$i.'</a></li>';
                }
            }
 
            // nếu trang_hientai < $tong_trang và tong_trang > 1 mới hiển thị nút prev
            if ($trang_hientai < $tong_trang && $tong_trang > 1){
                echo '<li><a href="tin-tuc.php?page='.($trang_hientai+1).'" class="next"> &raquo;</a></li> ';
            }
           ?>
        </ul>
        </div>
                         
                     </div>

                    </div>
                
                 
             
              
                 </div>
            </div>
         </div>
         </div>

    <?php 
    include 'head_f/footer.php';
?>

        
        <script>
                $(document).ready(function () {
                    $(".owl-carousel").owlCarousel({
                        loop: true,
                        margin: 30,
                        responsive: {
                            0: {
                                items: 1
                            },
                            1000: {
                                items: 4
                            }
                        }
                    });
                });
            </script>
            <script src="OwlCarousel2-2.3.4/dist/owl.carousel.min.js"></script>
 