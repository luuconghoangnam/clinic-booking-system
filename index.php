<?php include('mvc/controller/source.php');?>

<?php
include_once('mvc/controller/cf.php');
$query1 = "SELECT * FROM tin_tuc";
          $tt_run= mysqli_query($con,$query1);
		  ?>

<?php

if(isset($_POST['submit']))
{
$name=$_POST['fullname'];
$email=$_POST['emailid'];
$mobileno=$_POST['mobileno'];
$dscrption=$_POST['description'];
$query=mysqli_query($con,"insert into tblcontactus(fullname,email,contactno,message) value('$name','$email','$mobileno','$dscrption')");
echo "<script>alert('Your information succesfully submitted');</script>";
echo "<script>window.location.href ='index.php'</script>";
}
?>
<script type="text/javascript">
	$(document).ready(function(){
		 $(".rslides").responsiveSlides();
	})
</script>

<!Doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Coonie</title>
    <link rel="icon" type="image/png" href="./images/favicon.png">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap&subset=vietnamese" rel="stylesheet">
    
    <Style>
      /* Reset và chuẩn hóa chung */
      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Lato', sans-serif; /* Áp dụng font chữ Lato */
      }

      /* Chuẩn hóa kích thước ảnh cho khoa viện và bác sĩ */
      .ht__cat__thumb img,
      .doctor-image img {
        width: 100%;
        height: 200px;
        object-fit: cover;
        border-radius: 10px;
        transition: transform 0.3s ease;
      }

      .ht__cat__thumb img:hover,
      .doctor-image img:hover {
        transform: scale(1.05);
      }

      /* Style cho các box thông tin */
      .category,
      .doctor-box {
        background: white;
        border-radius: 15px;
        padding: 20px;
        margin-bottom: 30px;
        box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        transition: transform 0.3s ease;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        height: 300px; /* Đặt chiều cao cố định cho các box */
      }

      .category:hover,
      .doctor-box:hover {
        transform: translateY(-5px);
      }

      /* Style cho biểu tượng menu */
.menu-icon img {
    width: 40px;
    cursor: pointer;
}
.slider__activation__wrap .owl-nav div { 
    background: none !important; 
}

/* Style cho menu popup */
.popup-menu {
    display: none; /* Ẩn menu mặc định */
    position: absolute;
    top: 60px; /* Điều chỉnh vị trí menu */
    right: 10px; /* Căn phải */
    background-color: white;
    border: 1px solid #ddd;
    border-radius: 5px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    z-index: 1000;
    width: 150px;
}

.popup-menu ul {
    list-style: none;
    margin: 0;
    padding: 0;
}

.popup-menu ul li {
    padding: 10px 15px;
    border-bottom: 1px solid #ddd;
}

.popup-menu ul li:last-child {
    border-bottom: none;
}

.popup-menu ul li a {
    text-decoration: none;
    color: #333;
    font-weight: bold;
    display: block;
    transition: background-color 0.3s ease;
}

.popup-menu ul li a:hover {
    background-color: #f0f0f0;
    color: #01c9f6;
}
      .fr__product__inner,
      .doctor-info {
        text-align: center;
        padding: 15px 0;
        flex-grow: 1;
        display: flex;
        align-items: center;
        justify-content: center;
      }

      .fr__product__inner h4 a,
      .doctor-info h4 {
        color: #0B0B61;
        font-weight: bold;
        text-decoration: none;
        transition: color 0.3s ease;
      }

      .fr__product__inner h4 a:hover,
      .doctor-info h4:hover {
        color: #1a1a8a;
      }

      /* Style cho các phần tử menu
      .main__menu li a {
        padding: 15px 20px;
        display: block;
        color: white;
        transition: all 0.3s ease;
      } */

      .main__menu li a:hover {
        background-color: rgba(255,255,255,0.1);
        border-radius: 5px;
      }
      /* Style cho đường kẻ ngăn cách giữa các phần */
.section-divider {
    width: 100%;
    height: 4px; /* Độ dày của đường kẻ */
    background: linear-gradient(to right, #01c9f6, #0B0B61); /* Hiệu ứng chuyển màu */
    margin: 40px 0; /* Khoảng cách trên và dưới */
    border-radius: 2px; /* Bo góc đường kẻ */
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2); /* Hiệu ứng đổ bóng */
}

      /* Style cho phần tin tức */
      .news-section {
        background: white;
        padding: 50px 0;
        margin: 50px 0;
        border-radius: 20px;
        box-shadow: 0 0 20px rgba(0,0,0,0.1);
      }

      .news-box {
        background: white;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        transition: transform 0.3s ease;
      }

      .news-box:hover {
        transform: translateY(-5px);
      }

      .news-box-img img {
        width: 100%;
        height: 200px;
        object-fit: cover;
      }

      /* Style cho form */
      #htc__best__product__details {
        background: white;
        padding: 30px;
        border-radius: 15px;
        box-shadow: 0 4px 6px rgba(0,0,0,0.1);
      }

      #htc__best__product__details input,
      #htc__best__product__details textarea {
        width: 100%;
        padding: 12px;
        margin-bottom: 15px;
        border: 1px solid #ddd;
        border-radius: 5px;
        transition: border-color 0.3s ease;
      }

      #htc__best__product__details input:focus,
      #htc__best__product__details textarea:focus {
        border-color: #0B0B61;
        outline: none;
      }

      /* Style cho video */
      video {
        width: 100%;
        max-width: 320px;
        height: auto;
        margin: 10px 0;
        border-radius: 10px;
      }

      /* Style cho logo */
      /* .logo img {
        width: 65px;
        height: auto;
        border-radius: 50%;
      } */

      /* Tách biệt các section */
      .section-title {
        text-align: center;
        margin-bottom: 40px;
        padding: 20px;
        background: #01c9f6;
        color: white;
        border-radius: 10px;
      }

      .section-content {
        padding: 30px;
        background: white;
        border-radius: 15px;
        margin-bottom: 30px;
        box-shadow: 0 4px 6px rgba(0,0,0,0.1);
      }

      .fr__product__inner a{
        color: #0B0B61;
        font-size:15px;
        padding:5px;
        text-align:center;
        font-family:tahoma;
        font-weight:bold;
      }
      .htc__best__product__details a{
        font-size:18px;
      }

      /* Thêm viền đen cho phần hiển thị */
      .htc__best__product__details {
        border: 2px solid black; /* Viền đen dày 2px */
        padding: 20px; /* Thêm khoảng cách bên trong */
        border-radius: 10px; /* Bo góc viền */
        background-color: #f9f9f9; /* Màu nền nhạt */
      }

      /* Thêm viền đen cho form */
      form[name="contactus"] {
        border: 2px solid black; /* Viền đen dày 2px */
        padding: 20px; /* Thêm khoảng cách bên trong */
        border-radius: 10px; /* Bo góc viền */
        background-color: #f9f9f9; /* Màu nền nhạt */
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Hiệu ứng đổ bóng */
      }

      /* Thêm viền đẹp cho video */
      video {
        width: 100%;
        max-width: 320px; /* Đặt kích thước tối đa */
        height: auto;
        margin: 10px 0;
        border: 3px solid #01c9f6; /* Viền màu xanh nhạt */
        border-radius: 15px; /* Bo góc viền */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Hiệu ứng đổ bóng */
        transition: transform 0.3s ease; /* Hiệu ứng khi hover */
      }

      video:hover {
        transform: scale(1.05); /* Phóng to nhẹ khi hover */
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3); /* Tăng hiệu ứng đổ bóng khi hover */
      }
      /* Style cho phần Dịch vụ nổi bật */
#services {
    padding: 50px 0;
    background-color: #f9f9f9;
}

#services h2 {
    font-size: 28px;
    font-weight: bold;
    color: #0B243B;
    text-align: center;
    margin-bottom: 40px;
    text-transform: uppercase;
}

.service-box {
    background: white;
    border-radius: 15px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    padding: 20px;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.service-box:hover {
    transform: translateY(-5px);
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
}

.service-box img {
    width: 100%;
    border-radius: 10px;
    margin-bottom: 15px;
}

.service-box h4 {
    font-size: 20px;
    font-weight: bold;
    color: #0B243B;
    margin-bottom: 10px;
}

.service-box p {
    font-size: 14px;
    color: #555;
    line-height: 1.6;
}

/* Style cho phần Cảm nhận khách hàng */
#testimonials {
    padding: 50px 0;
    background-color: #ffffff;
}

#testimonials h2 {
    font-size: 28px;
    font-weight: bold;
    color: #0B243B;
    text-align: center;
    margin-bottom: 40px;
    text-transform: uppercase;
}

.testimonial-box {
    background: white;
    border-radius: 15px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    padding: 20px;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.testimonial-box:hover {
    transform: translateY(-5px);
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
}

.testimonial-box img {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    margin-bottom: 15px;
}

.testimonial-box p {
    font-size: 14px;
    color: #555;
    line-height: 1.6;
    margin-bottom: 10px;
}

.testimonial-box h5 {
    font-size: 16px;
    font-weight: bold;
    color: #0B243B;
}

/* Style cho phần Câu hỏi thường gặp */
#faq {
    padding: 50px 0;
    background-color: #f9f9f9;
}

#faq h2 {
    font-size: 28px;
    font-weight: bold;
    color: #0B243B;
    text-align: center;
    margin-bottom: 40px;
    text-transform: uppercase;
}

#faq h4 {
    font-size: 18px;
    font-weight: bold;
    color: #0B243B;
    margin-bottom: 10px;
}

#faq p {
    font-size: 14px;
    color: #555;
    line-height: 1.6;
}

/* Đổi font chữ cho tiêu đề tin tức */
.news-box h4 {
    font-family: 'Arial', sans-serif; /* Font không chân */
    font-size: 18px;
    font-weight: bold;
    color: #0B243B;
    margin-top: 10px;
    margin-bottom: 10px;
    text-transform: capitalize;
    transition: color 0.3s ease;
}

.news-box h4:hover {
    color: #01c9f6;
}
      
    </Style>

    <!-- All css files are included here. -->
    <!-- Bootstrap fremwork main css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Owl Carousel min css -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <!-- This core.css file contents all plugings css file. -->
    <link rel="stylesheet" href="css/core.css">
    <!-- Theme shortcodes/elements style -->
    <link rel="stylesheet" href="css/shortcode/shortcodes.css">
    <!-- Theme main style -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Responsive css -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- User style -->
    <link rel="stylesheet" href="css/custom.css">



    <!-- Modernizr JS -->
    <script src="js/vendor/modernizr-3.5.0.min.js"></script>
</head>

<body>
    <!-- Body main wrapper start -->
    <div class="wrapper">
        <!-- Start Header Style -->
        <header id="htc__header" class="htc__header__area header--one" style="background-color: #ffffff;">
            <!-- Start Mainmenu Area -->
            <div id="sticky-header-with-topbar" class="mainmenu__wrap sticky__header" style="background-color:#01c9f6">
            <!-- <div id="sticky-header-with-topbar" class="mainmenu__wrap sticky__header" style="background-color:#0B243B"> -->
                <div class="container">
                    <div class="row">
                        <div class="menumenu__container clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-3 col-xs-5">
                                <div class="logo">
                                    <a href="index.php"><img src="./images/logo/logo1.png" style="width:65px;"></img></a>
                                </div>
                            </div>
                            <div class="col-md-7 col-lg-8 col-sm-5 col-xs-3">
                                <nav class="main__menu__nav hidden-xs hidden-sm">
                                    <ul class="main__menu">
                                        <li class="drop"><a href="index.php"style="color:white;">TRANG CHỦ</a></li>
                                        <li class="drop">
                                            <a href="index.php#title__line" style="color:white;">THÔNG TIN</a>
                                            <ul >
                                             
                                            </ul>
                                        </li>
                                        <li class="drop">
                                            <a href="index.php#bacsi"style="color:white;">BÁC SĨ</a>
                                         
                                            <ul >
                                              
                                            </ul>
                                        </li> 
                                        
                                        <li class="drop">
                                            <a href="makeAppointmentStep1.php" style="color:white;">ĐẶT LỊCH</a>
                                         
                                            <ul>
                                               
                                            </ul>
                                        </li> 
                                       
                                        <li class="drop">
                                            <a href="index.php#htc__best__product__details"style="color:white;">HỎI ĐÁP</a>
                                           
                                            <ul>
                                             
                                            </ul>
                                        </li>
                                        
                                        <li class="drop">
                                            <a href="#"style="color:white;">TÀI KHOẢN</a>
                                          
                                            <ul class="dropdown mega_dropdown" style="width:200px;">
                                            <?php if(isset($_COOKIE['username'])): ?>
                  <li><a href="info_Patient.php">THÔNG TIN CHUNG</a></li>
                  <li><a href="signout.php">ĐĂNG XUẤT</a></li>
            
               </ul>
            </li>
          <?php else: ?>
            <li><a href="signin.php">ĐĂNG NHẬP</a></li>
          <?php endif; ?>  
    </ul>
                                            
                                             
 

                              
                            </div>
                            <div class="col-md-3 col-lg-2 col-sm-4 col-xs-4">
                                <div class="header__right">
                                <div class="menu-icon" onclick="toggleMenu()">
                                    <img src="./images/menu-icon.png" alt="Menu" style="width:40px; cursor:pointer;">
                                </div>
                                <div class="popup-menu" id="popupMenu">
                                    <ul>
                                        <li><a href="./bacsi">Bác sĩ</a></li>
                                        <li><a href="./admin">Admin</a></li>
                                    </ul>
                                </div>
                                </div>
                                  
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mobile-menu-area"></div>
                </div>
            </div>
        
        </header>
       

        <div class="body__overlay"></div>
       
        <!-- <div class="offset__wrapper"> 
           
            <div class="search__area" >
                <div class="container">
                    <div class="row">
                        <div class="col-md-12" >
                            <div class="search__inner">
                                <form action="#" method="get"   >
                                    <input placeholder="Search here... " type="text">
                                    <button type="submit"></button>
                                </form>
                                <div class="search__close__btn">
                                    <span class="search__close__btn_icon"><i class="zmdi zmdi-close" style="background-color:#01c9f6"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div> -->
       
        <div class="slider__container slider--one bg__cat--3">
            <div class="slide__container slider__activation__wrap owl-carousel">
              
                <div class="single__slide animation__style01 slider__fixed--height" style="background-image: url('images/background (2).jpg');background-size:100%;">
                    <div class="container">
                        <div class="row align-items__center" >
                            <div class="col-md-7 col-sm-7 col-xs-12 col-lg-6">
                                <div class="slide">
                                    <div class="slider__inner">
                                        <h1 style="color:#ffffff;">PHÒNG KHÁM ĐA KHOA C&G</h1>
                                        <br>
                                        <h2>Quét mã QR để được tư vấn </h2>
                                        <br>
                                        <img src="./images/QR.JPG" style="width:200px;"></img>
                                       
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-5 col-xs-12 col-md-5">
                                <div class="slide__thumb">
                                    <img src="images/maindoctor2.jpg" alt="slider images">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              
                <div class="single__slide animation__style01 slider__fixed--height" style="background-image: url('images/background2.jpg');background-size:cover;">
                    <div class="container">
                        <div class="row align-items__center">
                            <div class="col-md-7 col-sm-7 col-xs-12 col-lg-6">
                                <div class="slide">
                                    <div class="slider__inner">
                                       
                                       
                                        <h2 style="color:#ffffff;">QUÉT QR ĐỂ KHAI BÁO Y TẾ!!</h2>
                                        <br>
                                        <img src="./images/QR.JPG" style="width:210px;"></img>
                                       
                                       
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-5 col-xs-12 col-md-5">
                                <div class="slide__thumb">
                                    <img src="images/maindoctor1.jpg" alt="slider images">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            
            </div>
        </div>
        <div class="section-divider"></div>
        <section class="htc__category__area ptb--100">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="section__title--2 text-center">
                            <h2 id="title__line" style="font-weight:bold; color:#01c9f6">CÁC KHOA VIỆN</h2>
                        </div>
                    </div>
                </div>
                <div class="htc__product__container">
                    <div class="row">
                        <div class="product__list clearfix mt--30">
                         
                            <div class="col-md-4 col-lg-3 col-sm-4 col-xs-12">
                                <div class="category">
                                    <div class="ht__cat__thumb">
                                        <img src="images/dd.png" alt="Khoa Dinh Dưỡng">
                                    </div>
                                    <div class="fr__product__inner">
                                        <h4><a href="product-details.html">KHOA DINH DƯỠNG</a></h4>
                                    </div>
                                </div>
                            </div>
                          
                            <div class="col-md-4 col-lg-3 col-sm-4 col-xs-12">
                                <div class="category">
                                    <div class="ht__cat__thumb">
                                        <img src="images/tr.png" alt="Khoa Ngoại">
                                    </div>
                                    <div class="fr__product__inner">
                                        <h4><a href="product-details.html">KHOA NGOẠI</a></h4>
                                    </div>
                                </div>
                            </div>
                           
                            <div class="col-md-4 col-lg-3 col-sm-4 col-xs-12">
                                <div class="category">
                                    <div class="ht__cat__thumb">
                                        <img src="images/ii.png" alt="Khoa Nội">
                                    </div>
                                    <div class="fr__product__inner">
                                        <h4><a href="product-details.html">KHOA NỘI</a></h4>
                                    </div>
                                </div>
                            </div>
                           
                            <div class="col-md-4 col-lg-3 col-sm-4 col-xs-12">
                                <div class="category">
                                    <div class="ht__cat__thumb">
                                        <img src="images/jj.png" alt="Khoa Xét Nghiệm">
                                    </div>
                                    <div class="fr__product__inner">
                                        <h4><a href="product-details.html">KHOA XÉT NGHIỆM & KHOA KHÁC</a></h4>
                                    </div>
                                </div>
                                    </div>
                                        
                                    </div>
                                </div>
                            </div>
            </div>
        </section>

        <div class="section-divider"></div>
        <div class="section-divider"></div>
<section id="services" style="padding: 50px 0; background-color: #f9f9f9;">
    <div class="container">
    <h2 class="title__line" style="font-weight:bold; color:#01c9f6">DỊCH VỤ NỔI BẬT</h2>
        <div class="row">
            <div class="col-md-4">
                <div class="service-box text-center">
                    <img src="images/service1.jpg" alt="Khám tổng quát" style="width: 100%; border-radius: 10px;">
                    <h4>Khám tổng quát</h4>
                    <p>Chúng tôi cung cấp dịch vụ khám tổng quát với đội ngũ bác sĩ giàu kinh nghiệm.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="service-box text-center">
                    <img src="images/service2.jpg" alt="Xét nghiệm" style="width: 100%; border-radius: 10px;">
                    <h4>Xét nghiệm</h4>
                    <p>Hệ thống xét nghiệm hiện đại, đảm bảo kết quả chính xác và nhanh chóng.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="service-box text-center">
                    <img src="images/service3.jpg" alt="Tư vấn dinh dưỡng" style="width: 100%; border-radius: 10px;">
                    <h4>Tư vấn dinh dưỡng</h4>
                    <p>Đội ngũ chuyên gia dinh dưỡng sẽ giúp bạn xây dựng chế độ ăn uống lành mạnh.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
<div class="section-divider"></div>
      
        <section id="bacsi" class="ftr__product__area ptb--100">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="section__title--2 text-center">
                            <h2 class="title__line" style="font-weight:bold; color:#01c9f6">ĐỘI NGŨ BÁC SĨ</h2>
                            <br>
                            <marquee  style="font-size:30px; color:#0B0B61;">Với những bác sĩ kinh nghiệm dày dặn!! </marquee>
                            <br>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="product__wrap clearfix">

                        <!-- Start Single Category -->
                        <div class="col-md-4 col-lg-3 col-sm-4 col-xs-12">
                            <div class="doctor-box">
                                <div class="doctor-image">
                                    <img src="images/doctor (1).jpg" alt="Bác sĩ Minh Thương">
                                </div>
                                <div class="doctor-info">
                                    <h4>Trưởng khoa nội: TS.BS Nguyễn Lan Hải</h4>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Category -->
                        <!-- Start Single Category -->
                        <div class="col-md-4 col-lg-3 col-sm-4 col-xs-12">
                            <div class="doctor-box">
                                <div class="doctor-image">
                                    <img src="images/doctor (2).jpg" alt="Bác sĩ Minh Nam">
                                </div>
                                <div class="doctor-info">
                                    <h4>Trưởng khoa ngoại: PGS.TS.BS Nguyễn Thị Hoài An</h4>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Category -->
                        
                        <!-- Start Single Category -->
                        <div class="col-md-4 col-lg-3 col-sm-4 col-xs-12">
                            <div class="doctor-box">
                                <div class="doctor-image">
                                    <img src="images/doctor (3).jpg" alt="Bác sĩ Nhất Thiên">
                                </div>
                                <div class="doctor-info">
                                    <h4>Trưởng khoa dinh dưỡng: BS.CKII Nguyễn Thị Bay</h4>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Category -->
                        <!-- Start Single Category -->
                        <div class="col-md-4 col-lg-3 col-sm-4 col-xs-12">
                            <div class="doctor-box">
                                <div class="doctor-image">
                                    <img src="images/doctor (4).jpg" alt="Bác sĩ Hồ Phương">
                                </div>
                                <div class="doctor-info">
                                    <h4>Trưởng khoa xét nghiệm: ThS.BS Đào Thu Hiền</h4>
                                </div>
                            </div>
                        </div>
                        <br>
                        <!-- End Single Category -->
                        <div class="col-md-4 col-lg-3 col-sm-4 col-xs-12">
                            <div class="doctor-box">
                                <div class="doctor-image">
                                    <img src="images/doctor (5).jpg" alt="Bác sĩ Ngọc Anh">
                                </div>
                                <div class="doctor-info">
                                    <h4>Bác sĩ trẻ: Ngọc Lan</h4>
                                </div>
                            </div>
                        </div>
                        <!-- Start Single Category -->
                        <div class="col-md-4 col-lg-3 col-sm-4 col-xs-12">
                            <div class="doctor-box">
                                <div class="doctor-image">
                                    <img src="images/doctor (6).jpg" alt="Bác sĩ Doãn Qúy">
                                </div>
                                <div class="doctor-info">
                                    <h4>Bác sĩ trẻ: Minh Thảo</h4>
                                </div>
                            </div>
                        </div>
                       
                        <!-- End Single Category -->
                        <div class="col-md-4 col-lg-3 col-sm-4 col-xs-12">
                            <div class="doctor-box">
                                <div class="doctor-image">
                                    <img src="images/doctor (7).jpg" alt="Bác sĩ Uy Long">
                                </div>
                                <div class="doctor-info">
                                    <h4>Bác sĩ trẻ: Bích Hằng</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-3 col-sm-4 col-xs-12">
                            <div class="doctor-box">
                                <div class="doctor-image">
                                    <img src="images/doctor (8).jpg" alt="Bác sĩ Anh Anh">
                                </div>
                                <div class="doctor-info">
                                    <h4>Bác sĩ trẻ: Thu Hà</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="section-divider"></div>
      
        <section class="top__rated__area bg__white pt--100 pb--110">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section__title--2 text-center">
                            <h2 class="title__line"style="font-weight:bold;color:#01c9f6">HƯỚNG DẪN VÀ QUY ĐỊNH</h2>
                        </div>
                    </div>
                </div>
                <div class="row mt--20">
                   
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        <div class="htc__best__product">
                            
                            <div class="htc__best__product__details" style="width:300px;  ">
                                <h2><a href="show_info.php?type=nvdt" style="color:#0B0B61;">🚑 QUY ĐỊNH NHẬP VIỆN</a></h2>
                                <br>
                                <h2><a href="show_info.php?type=dvbh" style="color:#0B0B61;">🏥 BẢO HIỂM</a></h2>
                                <br>
                                <h2><a href="show_info.php?type=qdtk" style="color:#0B0B61;">🕛 QUY ĐỊNH THĂM KHÁM</a></h2>
                                
                                
        
                            </div>
                            <video width="320" height="240" controls>
                                <source src="./mvc/view/image/video (1).mp4" type="video/mp4">
                                
                                
                                </video>
                                <video width="320" height="240" controls>
                                <source src="./mvc/view/image/video (2).mp4" type="video/mp4">

  
  
</video>
                        </div>
                    </div>
                    <?php


?>

                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        <div class="htc__best__product">
                            
                            <div id="htc__best__product__details" style="width:800px; height:700px; ">
                    <h2  style="text-align:center; margin-left:100px; color:red; "> Hãy để lại câu hỏi nhé!</h2>
                                         <br>
                    <form name="contactus" method="post">
                      <div>
                        <span><label>ʜọ ᴠà ᴛêɴ</label></span> <br>
                        <span><input type="text" name="fullname" required="true" value=""></span>
                      </div>
                      <br>
                      <div>
                        <span><label>E-MAIL</label></span><br>
                        <span><input type="email" name="emailid" required="ture" value=""></span>
                      </div>
                      <br>
                      <div>
                         <span><label>Số điện thoại</label></span><br>
                        <span><input type="text" name="mobileno" required="true" value=""></span>
                      </div>
                      <br>
                      <div>
                        <span><label>Description</label></span><br>
                        <span><textarea name="description" required="true" style="background-color:white;"> </textarea></span>
                      </div>
                      <br>
                     <div>
                         <span><input type="submit" name="submit" value="Submit"></span>
                    </div>
                    </form>
                    
                    
                    
                    
                    </div>
                    </div>
                    </div>				
                    </div>
                    
                    
                    
                    </div>
                                 
                
                </div>
            </div>
        </section>
        
    </div>
  
    <script>
    function toggleMenu() {
        const menu = document.getElementById('popupMenu');
        if (menu.style.display === 'block') {
            menu.style.display = 'none';
        } else {
            menu.style.display = 'block';
        }
    }

    // Đóng menu khi nhấn ra ngoài
    window.addEventListener('click', function (e) {
        const menu = document.getElementById('popupMenu');
        const menuIcon = document.querySelector('.menu-icon');
        if (!menu.contains(e.target) && !menuIcon.contains(e.target)) {
            menu.style.display = 'none';
        }
    });

    document.querySelectorAll('.main__menu a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });
</script>
    <script src="js/vendor/jquery-3.2.1.min.js"></script>
   
    <script src="js/bootstrap.min.js"></script>
   
    <script src="js/plugins.js"></script>
    <script src="js/slick.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
   
    <script src="js/waypoints.min.js"></script>
    
    <script src="js/main.js"></script>
           
            <br>
        <div class="container text-center">
      
        </div>
        </br>
        <div class="container text-center">
      
        <br>
        </div>
       







</script>


</body>

</html>
<section id="news" style="padding: 50px 0; background-color: #ffffff;">
        <div class="container">
    <h2 class="title__line" style="font-weight:bold; color:#01c9f6">TIN TỨC NỔI BẬT</h2>
          <div class="row">
          <?php 
            while ($row = mysqli_fetch_assoc($tt_run)) { ?>
            <div class="col-md-4">
              <div class="news-box">
                        <a href="tin-tucct.php?id=<?php echo $row['id']; ?>">
                            <img src="admin/view-dr/image/<?php echo $row['img']; ?>" alt="<?php echo $row['TuaDe']; ?>" style="width: 100%; height: 200px; object-fit: cover; border-radius: 10px;">
                        </a>
                        <h4><?php echo $row['TuaDe']; ?></h4>
                        <p><?php echo substr($row['TinTuc'], 0, 100); ?>...</p>
                        <a href="tin-tucct.php?id=<?php echo $row['id']; ?>" style="color: #01c9f6;">Xem chi tiết</a>
                </div>
                </div>
            <?php } ?>
              </div>
            </div>
</section>
<BR>
<BR>
<div class="section-divider"></div>
<section id="testimonials" style="padding: 50px 0; background-color: #ffffff;">
    <div class="container">
    <h2 class="title__line" style="font-weight:bold; color:#01c9f6">CẢM NHẬN KHÁCH HÀNG</h2>
        <div class="row">
            <div class="col-md-4">
                <div class="testimonial-box text-center">
                    <img src="images/patient1.jpg" alt="Patient 1" style="width: 80px; height: 80px; border-radius: 50%; margin-bottom: 10px;">
                    <p>"Dịch vụ rất tuyệt vời, đội ngũ bác sĩ tận tâm và chuyên nghiệp."</p>
                    <h5> BÙI VĂN GIANG</h5>
                </div>
            </div>
            <div class="col-md-4">
                <div class="testimonial-box text-center">
                    <img src="images/patient2.jpg" alt="Patient 2" style="width: 80px; height: 80px; border-radius: 50%; margin-bottom: 10px;">
                    <p>"Tôi rất hài lòng với chất lượng khám chữa bệnh tại đây."</p>
                    <h5> LƯU LÂM CÔNG</h5>
                </div>
            </div>
            <div class="col-md-4">
                <div class="testimonial-box text-center">
                    <img src="images/patient3.jpg" alt="Patient 3" style="width: 80px; height: 80px; border-radius: 50%; margin-bottom: 10px;">
                    <p>"Phòng khám sạch sẽ, hiện đại, nhân viên thân thiện."</p>
                    <h5> ĐẶNG VĂN MINH</h5>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="section-divider"></div>
<section id="faq" style="padding: 50px 0; background-color: #f9f9f9;">
    <div class="container">
    <h2 class="title__line" style="font-weight:bold; color:#01c9f6">CÂU HỎI THƯỜNG GẶP</h2>
        <div class="row">
            <div class="col-md-6">
                <h4>1. Làm thế nào để đặt lịch khám?</h4>
                <p>Bạn có thể đặt lịch khám trực tuyến qua website hoặc gọi đến số hotline của phòng khám.</p>
          </div>
            <div class="col-md-6">
                <h4>2. Phòng khám có hỗ trợ bảo hiểm không?</h4>
                <p>Chúng tôi hỗ trợ nhiều loại bảo hiểm y tế. Vui lòng liên hệ để biết thêm chi tiết.</p>
        </div>
            <div class="col-md-6">
                <h4>3. Thời gian làm việc của phòng khám?</h4>
                <p>Phòng khám hoạt động từ 8:00 sáng đến 8:00 tối, từ thứ Hai đến Chủ Nhật.</p>
      </div>
            <div class="col-md-6">
                <h4>4. Tôi cần chuẩn bị gì khi đến khám?</h4>
                <p>Vui lòng mang theo giấy tờ tùy thân, thẻ bảo hiểm (nếu có), và các kết quả xét nghiệm trước đó (nếu cần).</p>
            </div>
        </div>
    </div>
</section>

<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Trang chủ</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <Style>
      .ht__cat__thumb img{
        width:386.66px;
        height:171.98px;
      }
      .fr__product__inner a{
        color: #0B0B61;
        font-size:15px;
        padding:5px;
        text-align:center;
        font-family:tahoma;
        font-weight:bold;

       
      }
      .htc__best__product__details a{
        font-size:18px;
      }
      html, body {
        height: 100%;
        margin: 0;
      }
      body {
        display: flex;
        flex-direction: column;
      }
      .footer__container {
        margin-top: auto;
      }

      /* Style cho footer */
      #htc__footer {
          background-color: #0B243B; /* Màu nền tối */
          color: white; /* Màu chữ */
          padding: 40px 0;
          font-size: 14px;
          line-height: 1.8;
      }

      #htc__footer h2 {
          font-size: 18px;
          font-weight: bold;
          margin-bottom: 20px;
          color: #01c9f6; /* Màu xanh nhạt */
      }

      #htc__footer p {
          margin-bottom: 15px;
          color: #d1d1d1; /* Màu chữ nhạt hơn */
      }

      #htc__footer .ft__list li {
          margin-bottom: 10px;
          color: #d1d1d1;
      }

      #htc__footer .ft__social__link ul {
          list-style: none;
          padding: 0;
          display: flex;
          gap: 10px;
      }

      #htc__footer .ft__social__link ul li a {
          color: white;
          font-size: 18px;
          transition: color 0.3s ease;
      }

      #htc__footer .ft__social__link ul li a:hover {
          color: #01c9f6; /* Màu xanh nhạt khi hover */
      }

      #htc__footer .news__input input {
          width: 100%;
          padding: 10px;
          border-radius: 5px;
          border: none;
          margin-bottom: 10px;
      }

      #htc__footer .send__btn a {
          display: inline-block;
          background-color: #01c9f6;
          color: white;
          padding: 10px 20px;
          border-radius: 5px;
          text-decoration: none;
          transition: background-color 0.3s ease;
      }

      #htc__footer .send__btn a:hover {
          background-color: #0B0B61; /* Màu xanh đậm hơn khi hover */
      }
      </style>

    <!-- All css files are included here. -->
    <!-- Bootstrap fremwork main css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Owl Carousel min css -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <!-- This core.css file contents all plugings css file. -->
    <link rel="stylesheet" href="css/core.css">
    <!-- Theme shortcodes/elements style -->
    <link rel="stylesheet" href="css/shortcode/shortcodes.css">
    <!-- Theme main style -->
    <link rel="stylesheet" href="style.css">
    <!-- Responsive css -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- User style -->
    <link rel="stylesheet" href="css/custom.css">


    <!-- Modernizr JS -->
    <script src="js/vendor/modernizr-3.5.0.min.js"></script>
    
</head>
<footer id="htc__footer">
    <div class="footer__container bg__cat--1" style="background-color:#0B243B; color: white; padding: 40px 0;">
                <div class="container">
                    <div class="row">
                <!-- About Us -->
                <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="footer">
                        <h2 class="title__line--2" style="color: #01c9f6;">ABOUT US</h2>
                        <p style="line-height: 1.8;">
                            Chúng tôi là một hệ thống y tế chuyên nghiệp, cung cấp các dịch vụ khám chữa bệnh chất lượng cao với đội ngũ bác sĩ giàu kinh nghiệm.
                        </p>
                                    <div class="ft__social__link">
                                        <ul class="social__link">
                                            <li><a href="https://twitter.com/"><i class="icon-social-twitter icons"></i></a></li>
                                            <li><a href="https://www.instagram.com/"><i class="icon-social-instagram icons"></i></a></li>
                                <li><a href="https://www.facebook.com/cooniesetthespree"><i class="icon-social-facebook icons"></i></a></li>
                                            <li><a href="https://www.google.com.vn/"><i class="icon-social-google icons"></i></a></li>
                                            <li><a href="https://www.linkedin.com/"><i class="icon-social-linkedin icons"></i></a></li>
                                        </ul>
                                </div>
                            </div>
                        </div>
                    
                <!-- Locations -->
                <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="footer">
                        <h2 class="title__line--2" style="color: #01c9f6;">CƠ SỞ</h2>
                        <ul class="ft__list" style="line-height: 1.8;">
                            <li>Cơ sở Hà Nội: Tòa nhà Polyco, đường Trịnh Văn Bô, quận Nam Từ Liêm, Hà Nội.</li>
                            <li>Cơ sở Bắc Ninh: Làng Đại học, phường Võ Cường, thành phố Bắc Ninh, tỉnh Bắc Ninh.</li>
                                    </ul>
                            </div>
                        </div>
                      
                <!-- Newsletter -->
                <div class="col-md-4 col-sm-12 col-xs-12">
                    <div class="footer">
                        <h2 class="title__line--2" style="color: #01c9f6;">NEWSLETTER</h2>
                        <p style="line-height: 1.8;">Đăng ký nhận thông tin mới nhất từ chúng tôi:</p>
                        <div class="news__input">
                            <input type="email" placeholder="Your Email*" style="width: 100%; padding: 10px; border-radius: 5px; border: none; margin-bottom: 10px;">
                            <div class="send__btn">
                                <a class="fr__btn" href="#" style="background-color: #01c9f6; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none;">Send</a>
</div>
</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        </footer>


 
