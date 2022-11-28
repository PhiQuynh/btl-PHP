<!DOCTYPE html>
<html lang="en">
<?php
require "../../database/connect.php";

if (isset($_GET['item_id'])) {
    $item_id = $_GET['item_id'];

    $sql = "SELECT item_name, item_price, cate_id FROM product Where item_id = $item_id";
    $result = $conn->query($sql);

    // SELECT CATEGORY -> OPTION
    $sql_cate = "SELECT cate_name, cate_id FROM category";
    $result_cate = $conn->query($sql_cate);

    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $product_name = $row["item_name"];
            $product_price = $row["item_price"];
            $cate_id = $row["cate_id"];

            // SELECT CURRENT CATE NAME
            $sql_current_cate_name = "SELECT cate_name FROM category WHERE cate_id = $cate_id ";

            $result_current_cate_name = $conn->query($sql_current_cate_name);
            if ($result_current_cate_name->num_rows > 0) {
                while ($row = $result_current_cate_name->fetch_assoc()) {
                    $current_cate_name = $row["cate_name"];
                }
            } else {
                echo "0 results";
            }
        }
    } else {
        // echo "0 results";
    }
}
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>

    <div class="container" style="width: 500px; margin-top: 200px;">
        <h2>Cập nhật sản phẩm ID: <?php echo $item_id ?></h2>
        <form action="../index.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <?php echo "<input type='hidden' class='form-control' name ='product_id' value='$item_id'>" ?>
            </div>
            <div class="mb-3">
                <label for="cate_id" class="form-label">Category</label>
                <select id='cate_id' class="form-control" name="cate_id">
                    <?php
                    if ($result_cate->num_rows > 0) {
                        while ($row = $result_cate->fetch_assoc()) {
                            $cate_id = $row["cate_id"];
                            $cate_name = $row["cate_name"];
                            echo "<option " . (($cate_name == $current_cate_name) ? ' selected="selected"' : '') . "value = '$cate_id'>$cate_name</option>";
                        }
                    } else {
                        echo "0 results";
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Name</label>
                <?php echo "<input type='text' class='form-control' name ='product_name' value='$product_name'>" ?>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Price</label>
                <?php echo "<input type='text' class='form-control' name= 'product_price' value='$product_price'>" ?>
            </div>

            <input type="submit" class="btn btn-primary" name="update" value="Cập nhật">
            <a class="btn btn-danger" href="../index.php" role="button">Quay lại</a>
        </form>
    </div>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>

3