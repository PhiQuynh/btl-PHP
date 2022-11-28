<?php

require "../database/connect.php";
// login
session_start();

$admin_name = $_SESSION["admin_name"];
if (!isset($_SESSION["admin_name"])) {
    header('location: login.php');
}
if (isset($_POST["logout"])) {
    session_destroy();
    header('location: login.php');
}
// index
if (isset($_POST['search'])) {
    $search_txt = $_POST['search-txt'];
    $sql = "SELECT * FROM product where item_name LIKE '%$search_txt%'";
} else {
    $sql = "SELECT * FROM product ORDER BY item_id DESC";
}
$result = $conn->query($sql);

// insert
if (isset($_POST["insert"])) {

    $item_name = $_POST["product_name"];
    $item_price = $_POST["price"];
    $cate_id = $_POST["cate_id"];

    $target_dir = "img/product/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], "../" . $target_file)) {
        $sql = "INSERT INTO product (item_name, item_price, item_image,cate_id)
                
                VALUES (' $item_name ' ,' $item_price', '$target_file','$cate_id')";

        $result = $conn->query($sql);
        header('location: index.php');
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
// delete
if (isset($_GET["task"]) && $_GET["task"] == "delete") {
    $item_id = $_GET["item_id"];
    $sql = "DELETE FROM product WHERE item_id = $item_id";

    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
        header('location:index.php');
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}
// update

if (isset($_POST['update'])) {

    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $price = $_POST['product_price'];
    $cate_id = $_POST['cate_id'];

    $sql = "UPDATE product SET item_name='$product_name', item_price='$price',  cate_id='$cate_id' WHERE item_id = $product_id";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
        header("Location:index.php");
    } else {
        echo "Error updating record: ";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Admin</title>
    <style>
        tr:nth-child(even) {
            background-color: #dddddd;
        }

        img {
            width: 100px;
            height: 100px;
        }
    </style>
</head>

<body>
    <header class="bg-primary p-2 fixed-top">
        <ul class="nav container justify-content-between">
            <li class="nav-item text-white">
                <?php echo "<p class='fs-4'><i class='far fa-user-circle'></i> " . $admin_name . "</ơ>"; ?>
            </li>

            <li class="nav-item text-white">
                <form method="post">
                    <button name='logout' class="nav-link text-white btn btn-danger" href="#">Đăng xuất</button>
                </form>
            </li>
        </ul>
    </header>
    <div class="container">
        <!-- SELECT -->
        <div class="row" style="margin-top:120px;">
            <div class="col-3 float-start">
                <nav class="nav flex-column border border-primary rounded">
                    <form class="d-flex m-2" method="post">
                        <input class="form-control me-2" type="search" placeholder="Tìm kiếm" aria-label="Search" name="search-txt">
                        <button class="btn btn-outline-primary" type="submit" name="search"><i class="fas fa-search"></i></button>
                    </form>
                    <a class="nav-link active" aria-current="page" href="./Cate/select.php">Danh mục sản phẩm</a>
                    <a class="nav-link" href="./index.php">Quản lý sản phẩm</a>
                    <a class="nav-link" href="#">Link</a>

                </nav>
            </div>
            <div class="col-9 border border-primary rounded pt-2">
                <a class="btn btn-outline-primary float-end" href="./product/insert.php" role="button">Thêm mới</a>
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th scope="col">ID Sản Phẩm</th>
                            <th scope="col">ID Danh mục</th>
                            <th scope="col">Tên Sản Phẩm</th>
                            <th scope="col">Giá</th>
                            <th scope="col">Ảnh</th>
                            <th scope="col">Sửa/Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        if ($result->num_rows > 0) {
                            // output data of each row
                            while ($row = $result->fetch_assoc()) {
                                $item_img = $row["item_image"];
                                echo "<tr>";
                                echo "<th scope='row'>" . $row["item_id"] . "</th>";
                                echo "<td>" . $row["cate_id"] . "</td>";
                                echo "<td>" . $row["item_name"] . "</td>";
                                echo "<td>" . $row["item_price"] . "</td>";
                                echo "<td> <img src='../$item_img'  </td>";

                                echo "<td>
                                <a href='./product/update.php?item_id=" . $row["item_id"] . "' class='btn btn-outline-success p-2'><i class='fas fa-pen'></i></a>
                                <a href='index.php?task=delete&&item_id=" . $row["item_id"] . "' class='btn btn-outline-danger p-2'><i class='fas fa-trash'></i></a>
                            </td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "0 results";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>