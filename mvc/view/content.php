<div class="container mt-4">
  <img src="./mvc/view/image/mnn.png" style="width:80%; height:370px;"></img>
  <Br>
  <br>
  <br>
  
 <style>
   body{
  
   }
   .dr{
     width:20%;
     height:150px;
     
     float:left;
     margin-right:25px;
     margin-left:20px;
   }
   .dr img{
     width:150px;
     margin-left:20px;
   }
   h5{
     text-align:center;
   }
   #bacsy{
     margin-top:20px;
     margin-right:500px;
    
   }
   .all{
     width:110%;
    
   }
   
   }
   #pp{
     width:30%;
float:left;

   }
   #lh{
     float:right;
     width:28%;
   }
   #bacsy2{width:30%;
    float:right;;
   
   height:800px;
   background-color:#F2F2F2;
   margin-right:10px;
   }
   hr{
     margin-right:700px;
   }
   form{
     margin-left:40px;
     background-color:#F2F2F2;
     margin-right:50px;
     
   }
   #p1{
     border-bottom:1px solid red;
     width:80%;
     margin-left:50px;
     font-weight:bold;
   }
   #bacsy2 p a{
   background-color: #A9E2F3;
   }
   #khoa{
     width:17%;
     padding-bottom:5px;
   }
   #qtpt{
     height:300px;
     background-color:white;
     margin-top:10px;
   }
   #qtpt p{
     color:blue;
     font-size:20px;
     
   }
   h6{
     color:#08088A;
   }
   .d2 h5{
     color:#08088A;
   }
   .card-body{
     height:590px;
   }
   .d2 a{
     background-color: white;
     color:black;
   }
   </style>
   <CENTER><H4 id="khoa" style="color:#08088A; margin-bottom:5px; border-bottom:1px solid blue;">CÁC KHOA VIỆN</H4></CENTER>
  
  <div class="dr">
					<div class="dot1">
						  <img src="./mvc/view/image/nnnn.png" style="width:45%; margin-left:70px;">
					</div>
					<div class="d2">
						  <h5><a href="1234.php">KHOA DINH DƯỠNG</a></h5>
						
						
					</div>
				</div>
        <div class="dr">
					<div class="dot1">
						  <img src="./mvc/view/image/tr.png" style="width:45%; margin-left:70px;">
					</div>
          <br>
					<div class="d2">
						  <h5><a href="1234.php">KHOA NGOẠI</a></h5>
						
						
					</div>
				</div>
        <div class="dr">
					<div class="dot1">
						  <img src="./mvc/view/image/ii.png"style="width:45%; margin-left:70px;">
					</div>
					<div class="d2">
						  <h5><a href="1234.php">KHOA NỘI</a></h5>
						
						
					</div>
				</div>
        <div class="dr">
					<div class="dot1">
						  <img src="./mvc/view/image/jj.png"style="width:45%; margin-left:70px;">
					</div>
					<div class="d2">
						  <h5> <a href="1234.php">KHOA XÉT NGHIỆM & CÁC KHOA KHÁC </a></h5>
						
						
					</div>
         
				</div>
  
<br>
<CENTER> <hr  width="1%" color="white"/></CENTER>
  <br>
  <Br>
  <div class="all">

<CENTER><H3 id="bacsy" style="color: #00008B; margin-top:70px;" >ĐỘI NGŨ BÁC SĨ</H3></CENTER>
<div  id="bacsy2" style="color: #00008B; margin-top:70px;" ><p id="p1"style="text-align:center">ＨƯỚＮＧ ＤẪＮ ＶÀ ＱＵＹ ĐỊＮＨ</p>
<p><a href="nvdt.php">🚑 𝑯𝒖̛𝒐̛́𝒏𝒈 𝒅𝒂̂̃𝒏 𝒏𝒉𝒂̣̂𝒑 𝒗𝒊𝒆̣̂𝒏 đ𝒊𝒆̂̀𝒖 𝒕𝒓𝒊̣</a></p>
<p><a href="dvbh.php">🩺 𝑩𝒂̉𝒐 𝒉𝒊𝒆̂̉𝒎</a></p>
<p><a href="qdtk.php">💊 𝑸𝒖𝒚 đ𝒊̣𝒏𝒉 𝒕𝒉𝒂̆𝒎 𝒌𝒉𝒂́𝒎</a></p><br>
<?php

include_once('mvc/controller/config.php');
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
<h3 id="lhct"> <img src="./mvc/view/image/l.gif"></img> HÃY HỎI!!!!</h3>
					 
<form name="contactus" method="post">
  <div>
    <span><label>ʜọ ᴠà ᴛêɴ</label></span> <br>
    <span><input type="text" name="fullname" required="true" value=""></span>
  </div>
  <div>
    <span><label>E-MAIL</label></span><br>
    <span><input type="email" name="emailid" required="ture" value=""></span>
  </div>
  <div>
     <span><label>Số điện thoại</label></span><br>
    <span><input type="text" name="mobileno" required="true" value=""></span>
  </div>
  <div>
    <span><label>Description</label></span><br>
    <span><textarea name="description" required="true"> </textarea></span>
  </div>
 <div>
     <span><input type="submit" name="submit" value="Submit"></span>
</div>
</form>
<div id="qtpt">
<video width="320" height="200" controls>
  <source src="./mvc/view/image/cv.mp4" type="video/mp4">
  
  
</video>
<video width="320" height="200" controls>
  <source src="./mvc/view/image/mm.mp4" type="video/mp4">

  
  
</video>



</div>
</div>
</div>				
</div>



</div>
             

  
<CENTER> <hr  width="30%" color="red"/></CENTER>
  <div class="card-deck row mt4" style="width: 69%">
    <div class="card">
      <img class="card-img-top" src="mvc/view/image/o.jpg" width="5%">
      <div class="card-body" >
        <h6 class="card-title">Giám đốc phòng khám: Nguyễn Hương</h6>
		 <p class="card-text" style="text-align:justify">Thực hiện báo cáo định kỳ, quyết định trong việc xây dựng, tổ chức quản lý đào tạo, đảm bảo chất lượng và chính sách phát triển nguồn nhân lực của Khoa và của Học viện </p>
     <img class="card-img-top" src="mvc/view/image/il.jpeg" width="5%">
      <div class="card-body">
        <h6 class="card-title">Y tá trưởng: Nguyễn Lan</h6>
        <p class="card-text" style="text-align:justify"> Nghiên cứu khoa học, phát triển công nghệ, thực hiện các dịch vụ khoa học và công nghệ theo kế hoạch của Học viện và Khoa giao thực hiện dịch vụ xã hội.</p></div> </div>
      </div>
  
   
    <div class="card">
      <img class="card-img-top" src="mvc/view/image/lk.jpg" width="10%">
      <div class="card-body">
        <h6 class="card-title">Chủ nhiệm khoa nội:Minh Thương</h6>    
		<p class="card-text" style="text-align:justify"> Nghiên cứu khoa học, phát triển công nghệ, thực hiện các dịch vụ khoa học và công nghệ theo kế hoạch của Học viện và Khoa giao</p><br>
    <img class="card-img-top" src="mvc/view/image/b.jpg" width="5%;">
      <div class="card-body">
        <h6 class="card-title">Chủ nhiệm khoa phục hồi chức năng: Hồ Nhất Thiên</h6>
        <p class="card-text" style="text-align:justify"> Nghiên cứu khoa học, phát triển công nghệ, thực hiện các dịch vụ khoa học và công nghệ theo kế hoạch của Học viện và Khoa giao.</p>
  </div>
  </div>
    </div>
    <div class="card">
      <img class="card-img-top" src="mvc/view/image/nb.jpg" width="5%" >
      <div class="card-body">
        <h6 class="card-title">Chủ nhiệm khoa ngoại: Hồ  Phương</h6>
		<p class="card-text" style="text-align:justify">Chủ động phối hợp với các cơ sở đào tạo, tổ chức khoa học và công nghệ, sản xuất kinh doanh, dịch vụ nhằm gắn đào tạo, nghiên cứu khoa học với hoạt động sản xuất.</p><br>
    <img class="card-img-top" src="mvc/view/image/iiii.jpg" width="100%;">
      <div class="card-body">
        <h6 class="card-title">Chủ nhiệm khoa dinh dưỡng: Dương Dương</h6>
        <p class="card-text" style="text-align:justify"> Nghiên cứu khoa học, phát triển công nghệ, thực hiện các dịch vụ khoa học và công nghệ theo kế hoạch của Học viện và Khoa giao.</p>
      </div>
   <br>
  </div>
	<br>
	
  
     <div>
      

    
  </div>
  
  </div>
  </div>
  
</div>

   

