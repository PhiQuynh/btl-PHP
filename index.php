<?php
require './database/connect.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php include "./partials/header.php" ?>
  <title>Home Page</title>
  <!-- jquery -->
</head>

<body>

  <header class="bg">
    <?php include "./partials/nav.php" ?>
    <section class="banner">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6 content align-items-start">
            <h1 class="pb-3 text-white">Lorem ipsum dolor sit amet.</h1>
            <p class="pb-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit, nam voluptate? Reiciendis
              voluptas hic suscipit aliquam quo nulla nostrum rerum.</p>
            <div><a href="#menu" class="btn rounded-pill"></i> Order Now</a></div>
          </div>
          <div class="col-md-6">
            <div class="img py-3">
              <img src="images/banner.png" alt="">
            </div>
          </div>
        </div>
      </div>
    </section>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
      <path fill="#fff" fill-opacity="1" d="M0,64L48,90.7C96,117,192,171,288,181.3C384,192,480,160,576,144C672,128,768,128,864,154.7C960,181,1056,235,1152,224C1248,213,1344,139,1392,101.3L1440,64L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
      </path>
    </svg>
  </header>

  <!----------------------------------PRODUCTS---------------------------------------------------->

  <section class="wrapper">
    <!-- NEW-MENU-SLIDE  -->
    <?php include "./partials/login.php" ?>
    <!-- Shopping cart -->
    <?php include "./partials/add_to_cart.php" ?>
    <!-- new product -->
    <?php include "./partials/new_product.php" ?>
    <!-- CATEGORY  -->
    <?php include "./partials/category.php" ?>
    <!-- PRODUCT -->
    <?php include "./partials/product.php" ?>
  </section>

  <!-- STORE PART -->
  <?php include "./partials/store.php" ?>
  <!-- LOGIN PART -->
  <!-- FOOTER PART -->
  <?php include "./partials/footer.php" ?>



</body>

</html>