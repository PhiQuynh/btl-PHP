<?php

$sql_cate = "SELECT * FROM category";
$result_cate = $conn->query($sql_cate);

$cate_ids = array();
?>

<div class="fluid-container w-100" id="menu">
    <div class="row w-100 py-2">
        <h3 class="text-center title" id="ITEM2"><i class="fas fa-coffee"></i> Sản Phẩm</h3>

    </div>
    <div class="row w-100">
        <ul class="menu__container d-flex justify-content-center">
            <?php
            if ($result_cate->num_rows > 0) {
                // output data of each row
                while ($row = $result_cate->fetch_assoc()) {
                    $cate_id = $row["cate_id"];
                    $cate_name = $row["cate_name"];
                    $cate_img = $row["cate_img"];

                    array_push($cate_ids, $cate_id);

                    $bg = $cate_id == $cate_ids[0] ? 'bg' : '';

                    echo "<li class='mx-2 d-flex flex-column'>";
                    echo "<div class='menu__img $bg' onclick='openMenu(event, $cate_id)'><img src='$cate_img'></div>";
                    echo "<div>$cate_name</div>";
                    echo "</li>";
                }
            } else {
                echo "0 results";
            }
            ?>
        </ul>
    </div>
</div>