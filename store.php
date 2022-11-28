<?php
require './database/connect.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include "./partials/header.php" ?>
  <link rel="stylesheet" href="./css/store.css">
  <title>Cửa hàng</title>
</head>

<body>
  <header style="background: url(images/store/shop.PNG);background-repeat: no-repeat;background-size: cover;  height: 80vh;" class="bg">
    <?php include "./partials/nav.php" ?>
  </header>

  <div class="container-fluid">
    <div class="row">
      <div class="text-1">Milk Tea</div>
      <div class="text-2">Giới thiệu về cửa hàng</div>
      <div class="icon-bottom-title"></div>
    </div>
    <div class="row">
      <div class="col-md-6 p-0">
        <img class="img-fluid" src="./images/store/store1.jpg" alt="">
      </div>
      <div class="col-md-6 px-0 d-flex flex-column d-flex flex-column">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" class="bg">
          <path fill="#fff" fill-opacity="1" d="M0,192L12.6,170.7C25.3,149,51,107,76,85.3C101.1,64,126,64,152,85.3C176.8,107,202,149,227,144C252.6,139,278,85,303,58.7C328.4,32,354,32,379,69.3C404.2,107,429,181,455,213.3C480,245,505,235,531,213.3C555.8,192,581,160,606,176C631.6,192,657,256,682,245.3C707.4,235,733,149,758,112C783.2,75,808,85,834,106.7C858.9,128,884,160,909,181.3C934.7,203,960,213,985,208C1010.5,203,1036,181,1061,160C1086.3,139,1112,117,1137,133.3C1162.1,149,1187,203,1213,208C1237.9,213,1263,171,1288,149.3C1313.7,128,1339,128,1364,128C1389.5,128,1415,128,1427,128L1440,128L1440,320L1427.4,320C1414.7,320,1389,320,1364,320C1338.9,320,1314,320,1288,320C1263.2,320,1238,320,1213,320C1187.4,320,1162,320,1137,320C1111.6,320,1086,320,1061,320C1035.8,320,1011,320,985,320C960,320,935,320,909,320C884.2,320,859,320,834,320C808.4,320,783,320,758,320C732.6,320,707,320,682,320C656.8,320,632,320,606,320C581.1,320,556,320,531,320C505.3,320,480,320,455,320C429.5,320,404,320,379,320C353.7,320,328,320,303,320C277.9,320,253,320,227,320C202.1,320,177,320,152,320C126.3,320,101,320,76,320C50.5,320,25,320,13,320L0,320Z"></path>
        </svg>
        <div class="title">
          <h3 class="text-center title"><i class="fas fa-coffee"></i>Milk Tea</h3>
          <div class="icon-bottom-title"></div>
        </div>
        <div class="content px-5">
          <p style="font-size:18px">Được thành lập vào năm 2014, khởi đầu từ quán bán trà sữa nhỏ góc phố. MILK TEA từng bước đi lên, tường bước khẳng định vị thế, thương hiệu quán trà sữa hàng đầu. Cùng với giá trị cốt lõi là trà sữa MILK TEA còn đang và sẽ hành nhiều đồ uống, sản phẩm làm từ lá chè</p>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-6 px-0 d-flex flex-column d-flex flex-column">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" class="bg">
          <path fill="#fff" fill-opacity="1" d="M0,192L12.6,170.7C25.3,149,51,107,76,85.3C101.1,64,126,64,152,85.3C176.8,107,202,149,227,144C252.6,139,278,85,303,58.7C328.4,32,354,32,379,69.3C404.2,107,429,181,455,213.3C480,245,505,235,531,213.3C555.8,192,581,160,606,176C631.6,192,657,256,682,245.3C707.4,235,733,149,758,112C783.2,75,808,85,834,106.7C858.9,128,884,160,909,181.3C934.7,203,960,213,985,208C1010.5,203,1036,181,1061,160C1086.3,139,1112,117,1137,133.3C1162.1,149,1187,203,1213,208C1237.9,213,1263,171,1288,149.3C1313.7,128,1339,128,1364,128C1389.5,128,1415,128,1427,128L1440,128L1440,320L1427.4,320C1414.7,320,1389,320,1364,320C1338.9,320,1314,320,1288,320C1263.2,320,1238,320,1213,320C1187.4,320,1162,320,1137,320C1111.6,320,1086,320,1061,320C1035.8,320,1011,320,985,320C960,320,935,320,909,320C884.2,320,859,320,834,320C808.4,320,783,320,758,320C732.6,320,707,320,682,320C656.8,320,632,320,606,320C581.1,320,556,320,531,320C505.3,320,480,320,455,320C429.5,320,404,320,379,320C353.7,320,328,320,303,320C277.9,320,253,320,227,320C202.1,320,177,320,152,320C126.3,320,101,320,76,320C50.5,320,25,320,13,320L0,320Z"></path>
        </svg>
        <div class="title">
          <h3 class="text-center title"><i class="fas fa-coffee"></i>Trà sữa</h3>
        </div>
        <div class="content px-5">
          <p style="font-size:18px"> Là thức uống phổ biến không chỉ ở Việt Nam mà còn là trên khắp thế giới. MILK TEA shop là nơi mang đến cho bạn những ly trà sữa tươi mát nhất với đầy đủ những hương vị khác nhau, hang chục toppings cho bạn thỏa sức lựa chọn</p>
        </div>
      </div>
      <div class="col-md-6 p-0">
        <img class="img-fluid" src="./images/store/store2.jpg" alt="">
      </div>
    </div>

    <div class="row">
      <div class="col-md-6 p-0">
        <img src="./images/Logo/logo_10.jpg" alt="" class="img-fluid">
      </div>
      <div class="col-md-6  d-flex flex-column px-0">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" class="bg">
          <path fill="#fff" fill-opacity="1" d="M0,192L12.6,170.7C25.3,149,51,107,76,85.3C101.1,64,126,64,152,85.3C176.8,107,202,149,227,144C252.6,139,278,85,303,58.7C328.4,32,354,32,379,69.3C404.2,107,429,181,455,213.3C480,245,505,235,531,213.3C555.8,192,581,160,606,176C631.6,192,657,256,682,245.3C707.4,235,733,149,758,112C783.2,75,808,85,834,106.7C858.9,128,884,160,909,181.3C934.7,203,960,213,985,208C1010.5,203,1036,181,1061,160C1086.3,139,1112,117,1137,133.3C1162.1,149,1187,203,1213,208C1237.9,213,1263,171,1288,149.3C1313.7,128,1339,128,1364,128C1389.5,128,1415,128,1427,128L1440,128L1440,320L1427.4,320C1414.7,320,1389,320,1364,320C1338.9,320,1314,320,1288,320C1263.2,320,1238,320,1213,320C1187.4,320,1162,320,1137,320C1111.6,320,1086,320,1061,320C1035.8,320,1011,320,985,320C960,320,935,320,909,320C884.2,320,859,320,834,320C808.4,320,783,320,758,320C732.6,320,707,320,682,320C656.8,320,632,320,606,320C581.1,320,556,320,531,320C505.3,320,480,320,455,320C429.5,320,404,320,379,320C353.7,320,328,320,303,320C277.9,320,253,320,227,320C202.1,320,177,320,152,320C126.3,320,101,320,76,320C50.5,320,25,320,13,320L0,320Z"></path>
        </svg>
        <div class="title">
          <h3 class="text-center title"><i class="fas fa-seedling"></i>Trà xanh</h3>
        </div>
        <div class="content px-5">
          <p style="font-size:18px">Không thể bỏ qua các sản phẩm truyền thống từ lá chè. MILK TEA cung cấp những loại trà tuyệt hảo và đặc biệt phù hớp với mọi lứa tuổi. Nhâm nhi một chén trà mỗi ngày không chỉ giúp cơ thể tỉnh táo, mà còn cải thiện sức khỏe và giúp các chị em giữ được vóc dáng thon gọn nhất</p>
        </div>
      </div>
    </div>

    <div class="row py-2">
      <h class="text-center title" style="font-size: 30px;margin-top: 10x;"><i class="fas fa-map"></i>Địa chỉ cửa hàng</h>
    </div>
    <div class="row">
      <div class="p-2 col-sm-12 col-md-6 px-5">
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14892.069845346616!2d105.7739133!3d21.0719648!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x1584f79c805eb017!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBN4buPIC0gxJDhu4thIGNo4bqldA!5e0!3m2!1svi!2s!4v1633416449362!5m2!1svi!2s" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
      </div>
      <div class="p-2 col-sm-12 col-md-6 px-3">
        <img class="img-fluid" src="./images/store/humg.jpeg">
      </div>
    </div>
  </div>


  <?php include "./partials/login.php" ?>
  <?php include "./partials/footer.php" ?>




</body>

</html>