    <!-- MENU_ITEM1 -->



    <?php
    foreach ($cate_ids as $id) {

        $d_flex = ($id == $cate_ids[0]) ? 'd-flex' : '';
        echo "<div class='menu container $d_flex flex-wrap py-3 align-content-center ' id= $id style='display: none;'>";
        $sql_product = "SELECT * FROM product WHERE cate_id = $id";
        $result_product = $conn->query($sql_product);
        if ($result_product->num_rows > 0) {
            // output data of each row
            while ($row = $result_product->fetch_assoc()) {

                $item_id = $row["item_id"];
                $item_name = $row["item_name"];
                $item_image = $row["item_image"];
                $item_price = $row["item_price"];
                echo " <form class='card mx-sm-5 mb-3' method='post'>";
                echo "<div class='card-img'>";
                echo "<img src='$item_image'>";
                echo "</div>";
                echo "<div class='card-body'>";
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
        echo "</div>";
    }
    ?>