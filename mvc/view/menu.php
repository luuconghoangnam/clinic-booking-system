<style type="text/css">
  #menu{
    margin-top:10px;
    width:100%;
  }
  #menu ul{
  list-style-type:none;
  background:#ffffff;
  color:#404040;
  text-align:left;
  font-family:sans-serif;
  font-size:16px;
  
  z-index:5;
  margin-left:80px;
  border:1px solid white;
}
#menu li{
  display:inline-block;
  width:160px;
  line-height:40px;
  margin-left:-5px;
  position:relative;
  text-align: center;
  
}
.mb-0 a{
  color:#404040;
  text-decoration:none;
  display:block;
  border:1px solid white;
  background-color: #416696;
  
  color:white;
}

.mb-0 a:hover{
 text-decoration:none;  
  color:#1273eb;
}

.menucon{
  display:none;
  position:absolute;
}
.menucon li{
  display:block;
  margin-left: 0 !important;
}
#menu li:hover .menucon{
  display:block;
}
</style>

 <div id="menu">
  <ul class="mb-0" style="width=100%">
          
          <li><a href="index.php">TRANG CHỦ</a>
            <!-- <ul class="menucon">
                  <li><a href="#">xxx</a></li>
                  <li><a href="#">xxx</a></li>
                  <li><a href="#">xxx</a></li>
                  <li><a href="#">xxx</a></li>
               </ul> -->
          </li>
			  <li><a href="index.php#khoa">THÔNG TIN</a>
            <!-- <ul class="menucon">
                  <li><a href="#">xxx</a></li>
                  <li><a href="#">xxx</a></li>
                  <li><a href="#">xxx</a></li>
                  <li><a href="#">xxx</a></li>
               </ul> -->
          </li>
          
			<li><a href="index.php#bacsy">BÁC SĨ</a>
            <!-- <ul class="menucon">
                  <li><a href="#">xxx</a></li>
                  <li><a href="#">xxx</a></li>
                  <li><a href="#">xxx</a></li>
                  <li><a href="#">xxx</a></li>
               </ul> -->
          </li>
          
          <li class=""><a href="makeAppointmentStep1.php">ĐẶT LỊCH</a>
            <!-- <ul class="menucon">
                  <li><a href="#">xxx</a></li>
                  <li><a href="#">xxx</a></li>
                  <li><a href="#">xxx</a></li>
                  <li><a href="#">xxx</a></li>
               </ul> -->
          </li>
          
          <li class=""><a href="index.php#bacsy2">HỎI ĐÁP</a>
            <!-- <ul class="menucon">
                  <li><a href="#">xxx</a></li>
                  <li><a href="#">xxx</a></li>
                  <li><a href="#">xxx</a></li>
                  <li><a href="#">xxx</a></li>
               </ul> -->
          </li>
          <li><a href="index.php#footer">LIÊN HỆ</a>  
          </li>
          <?php if(isset($_COOKIE['username'])): ?>
            <li><a href="#">TÀI KHOẢN</a>
              <ul class="menucon">
                  <li><a href="info_Patient.php">THÔNG TIN CHUNG</a></li>
                  <li><a href="signout.php">ĐĂNG XUẤT</a></li>
                  <!-- <li><a href="#">xxx</a></li> -->
               </ul>
            </li>
          <?php else: ?>
            <li><a href="signin.php">ĐĂNG NHẬP</a></li>
          <?php endif; ?>  
          
        </div>  
  </ul>
</div>

  
