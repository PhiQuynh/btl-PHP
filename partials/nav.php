<?php
session_start();

$user_name = $_SESSION["user_name"];

// echo [$items_id[0]];
if (!isset($_SESSION["user_name"])) {
    // header('location: login.php');
} else {
    $items_id = array();
    $user_id = $_SESSION['user_id'];

    $sql = "SELECT item_id  FROM cart WHERE user_id = $user_id";
    $result = $conn->query($sql);

    // Lấy số lượng sản phẩm trong giỏ hàng tương ứng với mỗi user id
    $query = "SELECT sum(quantity) as count_quantity FROM cart WHERE user_id = $user_id";
    $result_query = $conn->query($query);
    if ($result_query->num_rows > 0) {
        $row = $result_query->fetch_assoc();
        $total_quantity = $row['count_quantity'] != 0 ? $row['count_quantity'] : 0;
    } else {
        // $total_quantity = 0;
    }

    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {

            $item_id = $row["item_id"];
            array_push($items_id, $item_id);
        }
    } else {
        echo "result 0";
    }
    $_SESSION['items_id'] = $items_id;
}
if (isset($_POST["logout"])) {
    session_destroy();
    header('location: index.php');
}


$logout = "<form method='post'>
            <button name='logout' class='nav-link text-white btn btn-link rounded-pill'>Đăng xuất</button>
           </form>"

?>

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
                    if ($user_name) {
                        echo "<li class='nav-item pt-4 mt-2' id='login'><i class='fas fa-user'></i>$user_name</li>";
                        echo "<li class='nav-link pt-4' >$logout</li>";
                    } else {
                        echo "<span class='nav-link nav-item pt-4 ' ><i class='fas fa-user'></i> Đăng nhập</span>";
                    }
                    ?>
                </li>
                <li>

                </li>
                <li class="nav-item p-4" id="cart">
                    <a class='nav-link' href="./cart.php"><i class='fas fa-shopping-cart'></i><span class='badge bg-primary rounded-pill'>
                            <?php
                            echo !$user_name ?  0 :  $total_quantity;
                            ?>

                        </span></a>
                </li>
            </ul>
        </div>

    </div>
</nav>