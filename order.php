<?php
require './database/connect.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php include "./partials/header.php" ?>
  <link rel="stylesheet" href="./css/style.css">
  <link rel="stylesheet" href="./css/order.css">
  <title>Đặt hàng</title>
</head>

<body>

  <!-- top -->
  <header class="bg">
    <?php include "./partials/nav.php" ?>
  </header>

  <!-- MAIN CONTENT -->
  <section class="container-fluid content">
    <div class="row mt-5">
      <!-- Menu list -->
      <div class="col-3 an ">
        <div class="order__menu__list">
          <h5>Danh Mục</h5>
          <ul>
            <li class="menu--item border-bottom">
              <a class="dropdown-item" href="#1">
                <img src="./images/Logo/logo_19.png" alt="" style="margin-right:3px; width:35px;">Trà sữa mỗi ngày
              </a>
            </li>
            <li class="menu--item border-bottom">
              <a class="dropdown-item" href="#2"><img src="./images/Logo/logo_6.png" alt="" style="margin-right:5px;width:35px">Kem tươi mỗi ngày</a>
            </li>
            <li class="menu--item border-bottom">
              <a class="dropdown-item" href="#3"><img src="./images/Logo/logo_18.png  " alt="" style="margin-right:5px;width:35px">Sản Phẩm về trà</a>
            </li>
            <li class="menu--item border-bottom">
              <a class="dropdown-item" href="#4"><img src="./images/Logo/logo_16.png" alt="" style="margin-right:5px;width:35px">Sản Phẩm liên quan</a>
            </li>
          </ul>
        </div>
      </div>
      <!-- products -->
      <div class="col-6 mt-5" style="margin-left: 20px;">
        <div id="1">
          <div class="order-milktea-title" onclick="openTab(event,'TraSuaMoiNgay')">
            <span>Trà sữa mỗi ngày</span>
            <i class='fas fa-angle-down'></i>
          </div>
          <div id="TraSuaMoiNgay" class="row">
            <?php
            $sql_order = "SELECT * FROM product limit 12";
            $result_order = $conn->query($sql_order);
            if ($result_order->num_rows > 0) {
              // output data of each row
              while ($row = $result_order->fetch_assoc()) {
                $item_name = $row["item_name"];
                $item_image = $row["item_image"];
                $item_price = $row["item_price"];

                echo "<div class='card m-3'>";
                echo "<div class='card-img'>
                      <img src='$item_image' alt=''>
                     </div>";
                echo "<div class='card-body'>";
                echo "<h5 class='card-title'>$item_name</h5>";
                echo "<div class='main__money'>
                      <span style='line-height: 55px;'>$item_price</span>
                      </div>";
                echo "<btn class='btn rounded-pill'><i class='fas fa-shopping-cart'></i> order now
                      </btn>";
                echo "</div>";
                echo "</div>";
              }
            } else {
              echo "0 results";
            }
            ?>
          </div>
        </div>

        <div id="2">
          <div class="order-milktea-title" onclick="openTab(event,'KemTuoiMoiNgay')">
            <span>Kem Tươi Mỗi Ngày</span>
            <i class='fas fa-angle-down'></i>
          </div>
          <div id="KemTuoiMoiNgay" class="row">
            <?php
            $sql_order = "SELECT * FROM product limit 12 OFFSET 13";
            $result_order = $conn->query($sql_order);
            if ($result_order->num_rows > 0) {
              // output data of each row
              while ($row = $result_order->fetch_assoc()) {
                $item_name = $row["item_name"];
                $item_image = $row["item_image"];
                $item_price = $row["item_price"];

                echo "<div class='card m-3'>";
                echo "<div class='card-img'>
                      <img src='$item_image' alt=''>
                     </div>";
                echo "<div class='card-body'>";
                echo "<h5 class='card-title'>$item_name</h5>";
                echo "<div class='main__money'>
                      <span style='line-height: 55px;'>$item_price</span>
                      </div>";
                echo "<btn class='btn rounded-pill'><i class='fas fa-shopping-cart'></i> order now
                      </btn>";
                echo "</div>";
                echo "</div>";
              }
            } else {
              echo "0 results";
            }
            ?>
          </div>
        </div>

        <div id="3">
          <div class="order-milktea-title" onclick="openTab(event,'SanPhamVeTra')">
            <span>Sản phẩm về trà</span>
            <i class='fas fa-angle-down'></i>
          </div>
          <div id="SanPhamVeTra" class="row">
            <?php
            $sql_order = "SELECT * FROM product limit 8 OFFSET 25";
            $result_order = $conn->query($sql_order);
            if ($result_order->num_rows > 0) {
              // output data of each row
              while ($row = $result_order->fetch_assoc()) {
                $item_name = $row["item_name"];
                $item_image = $row["item_image"];
                $item_price = $row["item_price"];

                echo "<div class='card m-3'>";
                echo "<div class='card-img'>
                      <img src='$item_image' alt=''>
                     </div>";
                echo "<div class='card-body'>";
                echo "<h5 class='card-title'>$item_name</h5>";
                echo "<div class='main__money'>
                      <span style='line-height: 55px;'>$item_price</span>
                      </div>";
                echo "<btn class='btn rounded-pill'><i class='fas fa-shopping-cart'></i> order now
                      </btn>";
                echo "</div>";
                echo "</div>";
              }
            } else {
              echo "0 results";
            }
            ?>
          </div>
        </div>
        <div id="4">
          <div class="order-milktea-title" onclick="openTab(event,'SanPhamLienQuan')">
            <span>Sản phẩm liên quan</span>
            <i class='fas fa-angle-down'></i>
          </div>
          <div id="SanPhamLienQuan" class="row">
            <?php
            $sql_order = "SELECT * FROM product limit 8 OFFSET 32";
            $result_order = $conn->query($sql_order);
            if ($result_order->num_rows > 0) {
              // output data of each row
              while ($row = $result_order->fetch_assoc()) {
                $item_name = $row["item_name"];
                $item_image = $row["item_image"];
                $item_price = $row["item_price"];

                echo "<div class='card m-3'>";
                echo "<div class='card-img'>
                      <img src='$item_image' alt=''>
                     </div>";
                echo "<div class='card-body'>";
                echo "<h5 class='card-title'>$item_name</h5>";
                echo "<div class='main__money'>
                      <span style='line-height: 55px;'>$item_price</span>
                      </div>";
                echo "<btn class='btn rounded-pill'><i class='fas fa-shopping-cart'></i> order now
                      </btn>";
                echo "</div>";
                echo "</div>";
              }
            } else {
              echo "0 results";
            }
            ?>
          </div>
        </div>
      </div>

    </div>

    <!-- cart shopping -->
    <div class="col-3 order__cart an">
      <div class="order__cart-title">
        <span>GIỎ HÀNG CỦA TÔI</span>
        <span class="del">Xóa tất cả</span>
      </div>
      <div class="order__cart-content">
        <span class="span-hidden">Chưa có sản phẩm nào</span>
        <div class="order__cart-content-product">
          <div class="icon__tea"><img src="./images/Logo/logo_12.png" style="width:30%" alt=""></div>
          <span>x</span>
          <span>0</span>
          <span>=</span>
          <span>0đ</span>
        </div>
        <button type="button" class="btn-primary">Thanh toán</button>
      </div>
    </div>

  </section>
  <?php include "./partials/login.php" ?>
  <?php include "./partials/footer.php" ?>
</body>

</html>