<?php
require './database/connect.php';
session_start();

$user_name = $_SESSION["user_name"];
$user_id = $_SESSION["user_id"];
// Xóa sản phẩm trong giỏ hàng
if (isset($_GET["task"]) && $_GET["task"] == "delete") {
    $item_id = $_GET["item_id"];
    $user_id = $_GET["user_id"];
    $sql = "DELETE FROM cart WHERE item_id = $item_id AND user_id = $user_id";

    // xóa item_id trong session
    if ($conn->query($sql) === TRUE) {
        $key = array_search($item_id, $_SESSION['items_id']);
        unset($_SESSION['items_id'][$key]);
        echo "<script>window.location='cart.php'</script>";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

if (!$user_name) {
    echo "<script>alert('Chưa Đăng nhập')</script>";
    echo "<script>window.location='index.php'</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <!-- CSS only -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/new_style.css">
    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</head>

<body>
    <!-- Nav -->
    <nav class="navbar navbar-expand-lg navbar-light bg shadow fixed-top">
        <div class="container d-md-flex justify-content-around">
            <a class="navbar-brand fw-bold" href="./index.php"><i class="fas fa-coffee"></i> Milk tea</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item px-3">
                        <a class="nav-link active" aria-current="page" href="./index.php">Home</a>
                    </li>
                    <li class="nav-item px-3">
                        <a class="nav-link" href="./order.php">Đặt hàng</a>
                    </li>
                    <li class="nav-item px-3">
                        <a class="nav-link" href="./store.php">Cửa hàng</a>
                    </li>

            </div>

            <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item p-2" id="login">
                        <?php
                        echo "<li class='nav-item p-2' id='login'><i class='fas fa-user'></i> $user_name</li>";
                        ?>
                    </li>
                </ul>
            </div>

        </div>
    </nav>
    <div class="container">
        <!-- SELECT -->
        <div class="row" style="margin-top:120px;">
            <div class="col-9 shopping-cart border border-success rounded pt-2">
                <table class="table text-center">
                    <!-- <thead>
                        <tr>
                            <th scope="col">Ảnh</th>
                            <th scope="col">Tên Sản Phẩm</th>
                            <th scope="col">Giá</th>
                            <th scope="col">Số lượng</th>
                            <th scope="col">Xóa</th>
                            <th scope="col">Tổng</th>
                        </tr>
                    </thead> -->
                    <tbody>
                        <?php
                        //tính tổng các sản phẩm
                        $total = array(0);
                        if ($_SESSION['items_id']) {

                            foreach ($_SESSION['items_id'] as $product_id) {
                                // lấy số lượng sản phẩm
                                $query = "SELECT quantity FROM cart WHERE item_id = $product_id";
                                $result_query = $conn->query($query);
                                if ($result_query->num_rows > 0) {
                                    $row = $result_query->fetch_assoc();
                                    $quantity = $row['quantity'];
                                } else {
                                    $quantity = 0;
                                }
                                // truy vấn đến các trường của sản phẩm
                                $sql = "SELECT * FROM product WHERE item_id = $product_id";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    // output data of each row
                                    while ($row = $result->fetch_assoc()) {
                                        $item_name = $row["item_name"];
                                        $item_price = $row["item_price"];
                                        $item_image = $row["item_image"];
                                        $line_price = $item_price * $quantity;
                                        array_push($total, $line_price);
                                        echo "
                                    <tr class='product'>
                                        <td class='product-image'>
                                            <img src='$item_image'>
                                        </td>
                                        <td class='product-details'>
                                            <div class='product-title'>$item_name</div>
                                        </td>
                                        <td class='product-price'>$item_price</td>
                                        <td class='product-quantity'>
                                            <input type='number' value='$quantity' min='1'>
                                        </td>
                                        <td class='product-line-price'>$line_price</td>
                                        <td class='product-removal'>
                                            <a href='cart.php?task=delete&&user_id=" . $user_id . " &&item_id=" . $product_id . "' class='btn-outline-danger remove-product p-2'><i class='fas fa-trash'></i></a>
                                        </td>
                                    </tr>
                                ";
                                    }
                                } else {
                                    echo "0 results";
                                }
                            }
                        } else {
                            echo "<tr><td><h3 class='pb-4'>Chưa có sản phẩm trong giỏ hàng</h3></td></tr>";
                        }
                        ?>


                    </tbody>
                </table>
            </div>
            <div class="totals col-3 border border-success">
                <div class="totals-item">
                    <label>Total</label>
                    <div class="totals-value" id="cart-total">
                        <?php echo $total != 0 ? array_sum($total) : 0; ?>
                    </div>
                </div>
                <button class="checkout">Checkout</button>
            </div>
        </div>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- JavaScript Bundle with Popper -->
    <script src="./js/_cart.js"></script>

</body>


</html>