<?php
require "../../database/connect.php";

$sql = "SELECT cate_name, cate_id FROM category";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert</title>

    <!-- font awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>

<body>
    <div class="container" style="width: 500px; margin-top:150px">
        <form action="../index.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <h2>Thêm sản phẩm mới</h2>
            </div>
            <div class="mb-3">
                <label for="product_name" class="form-label">Name</label>
                <input type="text" class="form-control" name="product_name" required>
            </div>
            <div class="mb-3">
                <label for="cate_id" class="form-label">Category</label>
                <select id='cate_id' class="form-control" name="cate_id">
                    <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $cate_id = $row["cate_id"];
                            $cate_name = $row["cate_name"];
                            echo "<option value = '$cate_id'>$cate_name</option>";
                        }
                    } else {
                        echo "0 results";
                    }
                    ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="text" class="form-control" name="price" required>
            </div>
            <div class="mb-3">
                <label for="img" class="form-label">Upload Img</label>
                <input type="file" class="form-control" name="fileToUpload" accept='image/*'>
            </div>

            <input type="submit" class="btn btn-primary" name="insert" value="Thêm mới">
            <a class="btn btn-danger" href="../index.php" role="button">Quay lại</a>
        </form>


    </div>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>