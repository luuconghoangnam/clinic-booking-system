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
