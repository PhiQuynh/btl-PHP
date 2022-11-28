   
<?php

// thực hiện khi thêm sản phẩm vào giỏ hàng
if (isset($_POST["add"])) {
    // kiểm tra đã đăng nhập chưa
    if (!$user_name) {
        echo "<script>alert('Chưa Đăng nhập')</script>";
    } else {
        // check
        $item_id = $_POST["item_id"];
        $user_id = $_SESSION['user_id'];
        // kiểm tra sản phẩm đã có trong giỏ hàng chưa
        if (in_array($item_id, $items_id)) {
            $sql = "UPDATE cart
            SET quantity = quantity + 1
            WHERE item_id = $item_id;";
            $result = $conn->query($sql);
        } else {
            $sql = "INSERT INTO cart (user_id, item_id, quantity)
                VALUES ('$user_id','$item_id',1)";
            $result = $conn->query($sql);
        }
        echo "<script>window.location='index.php'</script>";
    }
}
?>


