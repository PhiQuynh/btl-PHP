<?php
// Kết nối đến database
require "../../database/connect.php";

// đăng nhập, đăng xuất
session_start();
$admin_name = $_SESSION["admin_name"];
if (!isset($_SESSION["admin_name"])) {
    header('location: login.php');
}
if (isset($_POST["logout"])) {
    session_destroy();
    header('location: login.php');
}

// insert
if (isset($_POST["insert"])) {
    $cate_name = $_POST["cate_name"];

    $target_dir = "img/category/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], "../../" . $target_file)) {
        $sql = "INSERT INTO category (cate_name,cate_img)
                
                VALUES (' $cate_name ' , '$target_file')";

        $result = $conn->query($sql);
        header('location: select.php');
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
//update

if (isset($_POST['update'])) {

    $cate_id = $_POST['cate_id'];
    $cate_name = $_POST['cate_name'];
    //echo $cate_id
    $sql = "UPDATE category SET cate_name='$cate_name' WHERE cate_id =" . $cate_id;

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
        header("Location:select.php");
    } else {
        echo "Error updating record: ";
    }
}

//delete
if (isset($_GET["task"]) && $_GET["task"] == "delete") {
    $cate_id = $_GET["cate_id"];
    //echo $cate_id;
    $sql = "DELETE FROM category WHERE cate_id =" . $cate_id;

    if (mysqli_query($conn, $sql)) {
        //echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
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
                    <form method="post" class="d-flex m-2">
                        <input class="form-control me-2" name="txt_search" type="search" placeholder="Tìm kiếm" aria-label="Search">
                        <button class="btn btn-outline-primary" name="search" type="submit"><i class="fas fa-search"></i></button>
                    </form>
                    <a class="nav-link active" aria-current="page" href="./select.php">Danh mục sản phẩm</a>
                    <a class="nav-link" href="../index.php">Quản lý sản phẩm</a>
                    <a class="nav-link" href="#">Link</a>
                </nav>
            </div>

            <div class="col-9 border border-primary rounded pt-2">
                <a class="btn btn-outline-primary float-end" href="insert.php" role="button">Thêm mới</a>
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th scope="col">ID loại sản phẩm</th>
                            <th scope="col">Loại sản phẩm</th>
                            <th scope="col">Ảnh</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "";
                        if (isset($_POST["search"])) {
                            $txt_search = $_POST["txt_search"];
                            $sql = "SELECT * FROM category WHERE cate_name like '%" . $txt_search . "%'";
                        } else {
                            $sql = "SELECT * FROM category ORDER BY cate_id DESC";
                        }
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            // output data of each row
                            while ($row = $result->fetch_assoc()) {
                                $cate_img = $row["cate_img"];
                                echo "<tr>";
                                echo "<th scope='row'>" . $row["cate_id"] . "</th>";
                                echo "<td>" . $row["cate_name"] . "</td>";
                                echo "<td> <img src='../../$cate_img'  </td>";

                                echo "<td>
                                <a href='update.php?cate_id=" . $row["cate_id"] . "' class='btn btn-outline-success p-2'><i class='fas fa-pen'></i></a>
                                <a href='select.php?task=delete&cate_id=" . $row["cate_id"] . "' class='btn btn-outline-danger p-2'><i class='fas fa-trash'></i></a>
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