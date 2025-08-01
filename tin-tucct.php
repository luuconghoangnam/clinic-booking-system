<?php
include './mvc/view/header.php';

?>
<?php include_once('mvc/controller/config.php');?>
<?php 
$id = $_GET['id'];
$query = "SELECT * FROM tin_tuc where id=$id";
          $query_run= mysqli_query($con,$query);
?>
<Style>
    .container a{
        background-color:white;
        color:Red;
    }
    </style>
<?php include_once('mvc/controller/config.php');?>

        <div class="container-fluid py-2">
             <div class="container">
          
             </div>
         </div>   

         <div class="container-fluid pb-4">
             <div class="container">
                 <div class="row">
                    <div class="col-md-12">
                            <div class="card-body">
                              <div class="blog-post">
                                  <?php while ($row=mysqli_fetch_assoc($query_run)) 
                                    {            
                                  ?>      
                                    <h2 class="blog-post-title"><?= $row['TuaDe'];  ?></h2>
                                        <p class="date-time hidden-xs hidden-sm"><i class="fa fa-calendar" aria-hidden="true"></i> <span><td> <?php echo $row['NgayDang']; ?></td></span></p>                           
                                        <?php echo $row['TinTuc']; ?>
                                        <p> </p>
								  <a href="<?php echo $row['url'];?>">
								  <?php echo $row['ten_url'];?>
								  </a>
                           <?php } ?>
                              </div>
                            </div>
                        </div>
                    </div>

            </div>
         </div>
         </div>

    <?php 
  
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
            <?php 

?>
<?php 
include('header.php');
?>


 