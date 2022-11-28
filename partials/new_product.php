<div class="fluid-container w-100">
  <!-- title -->
  <div class="row w-100 py-2">
    <h3 class="text-center title" id="ITEM1"><i class="fas fa-leaf"></i> Sản Phẩm nỗi bật</h3>
  </div>
  <!-- content -->
  <div class="row w-100" style="background:#FFF; padding:50px 0">
    <!-- new-products-slide -->
    <div id="carousel" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <div class="container d-flex justify-content-center flex-wrap py-3">

            <?php
            $sql_new_product = "SELECT * from product limit 4";
            $result_new_product = $conn->query($sql_new_product);
            if ($result_new_product->num_rows > 0) {
              // output data of each row
              while ($row = $result_new_product->fetch_assoc()) {

                $item_id = $row["item_id"];
                $item_name = $row["item_name"];
                $item_image = $row["item_image"];
                $item_price = $row["item_price"];
                echo " <form class='card mx-sm-5 mb-3' method='post'>";
                echo "<div class='card-img'>";
                echo "<img src='$item_image'>";
                echo "</div>";
                echo "<div class='card-body'>";
                echo "<div class='discount-tag'>New</div>";

                echo "<h5 class='card-title'>$item_name</h5>";
                echo "<p class='card-text1'>$item_price</p>";
                echo "<input type='hidden'  name='item_id' value='$item_id'>";
                echo "<button type='submit' class='btn rounded-pill' name='add'><i class='fas fa-shopping-cart'></i> order now</button>";
                echo "</div>";

                echo "</form>";
              }
            } else {
              echo "0 results";
            }
            ?>
          </div>

        </div>
        <div class="carousel-item">
          <div class="container d-flex justify-content-center flex-wrap py-3">
            <?php
            $sql_new_product = "SELECT * from product limit 4 OFFSET 4";
            $result_new_product = $conn->query($sql_new_product);
            if ($result_new_product->num_rows > 0) {
              // output data of each row
              while ($row = $result_new_product->fetch_assoc()) {
                $item_id = $row["item_id"];
                $item_name = $row["item_name"];
                $item_image = $row["item_image"];
                $item_price = $row["item_price"];
                echo " <form class='card mx-sm-5 mb-3' method='post'>";
                echo "<div class='card-img'>";
                echo "<img src='$item_image'>";
                echo "</div>";
                echo "<div class='card-body'>";
                echo "<div class='discount-tag'>New</div>";

                echo "<h5 class='card-title'>$item_name</h5>";
                echo "<p class='card-text1'>$item_price</p>";
                echo "<input type='hidden'  name='item_id' value='$item_id'>";
                echo "<button type='submit' class='btn rounded-pill' name='add'><i class='fas fa-shopping-cart'></i> order now</button>";
                echo "</div>";

                echo "</form>";
              }
            } else {
              echo "0 results";
            }
            ?>
          </div>
        </div>
      </div>
      <!-- btn next pre -->
      <div class="d-flex justify-content-center">
        <button class="btn-slide mx-2" data-bs-target="#carousel" data-bs-slide="prev"><i class="fas fa-arrow-left"></i></button>
        <button class="btn-slide mx-2" data-bs-target="#carousel" data-bs-slide="next"><i class="fas fa-arrow-right"></i></button>
      </div>
    </div>
  </div>
</div>