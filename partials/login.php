<!-- LOGIN -->
<?php

if (isset($_POST['user_login'])) {
    $password = md5($_POST["user_password"]);
    $name = $_POST["user_name"];

    $sql = "SELECT * FROM user WHERE user_name = '$name' AND
    user_password = '$password '";

    $result = $conn->query($sql);

    if (mysqli_num_rows($result) == TRUE) {
        $_SESSION['user_name'] = $name;
        $row = $result->fetch_assoc();
        $_SESSION['user_id'] = $row["user_id"];
        echo "<script>window.location='index.php'</script>";
        $user_name = $_SESSION['user_name'];
        $user_id = $_SESSION['user_id'];
    } else {
        echo "<script>alert('đăng nhập sai')</script>";
        echo "<script>window.location='index.php'</script>";
    }
}

?>

<div class="form-page">

    <div class="form d-flex flex-column">
        <div class="times">
            <i class="fas fa-times"></i>
        </div>
        <div class="login p-0">
            <img src="./images/store/shop.PNG" alt="">
            <p class="text-center title pt-2">
                Chào mừng bạn đến với cửa hàng
            </p>
            <h5 class="text-center title">MILK TEA</h5>
        </div>
        <form action="#" method="post">

            <div class="input-group mb-3">
                <span class="d-flex justify-content-center align-items-center p-2"><i class="fas fa-phone"></i></span>
                <input type="text" maxlength="11" minlength="4" class="lock" name="user_name" placeholder="Phone Number">
            </div>
            <div class="input-group mb-3">
                <span class="d-flex justify-content-center align-items-center p-2"><i class="fas fa-lock"></i></span>
                <input type="password" class="lock" name="user_password" placeholder="Password">
            </div>

            <input type="submit" class="submit rounded-pill" value="Đăng nhập" name="user_login">
        </form>

    </div>
</div>