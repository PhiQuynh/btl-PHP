<?php
require '../database/connect.php';

if (isset($_POST['login'])) {
    $name = $_POST["admin_name"];
    $password = $_POST["admin_password"];

    $sql = "SELECT * FROM admin WHERE admin_name = '$name' AND
    admin_password = '$password '";

    $result = $conn->query($sql);
    if (mysqli_num_rows($result) == TRUE) {
        session_start();
        $_SESSION['admin_name'] = $name;
        header("location: index.php");
    } else {
        echo "<script>alert('Đăng nhập thất bại')</script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <div class="container" style="width: 500px; margin-top:200px;">
        <h3>Đăng nhập</h3>
        <form class="border border-primary rounded p-3" action="" method="post">
            <div class="mb-3 ">
                <label class="form-label">Tên đăng nhập</label>
                <input type="text" class="form-control" aria-describedby="emailHelp" name='admin_name'>
            </div>
            <div class="mb-3">
                <label class="form-label">Mật khẩu</label>
                <input type="password" class="form-control" name='admin_password'>
            </div>
            <button type="submit" class="btn btn-primary" name='login'>Đăng nhập</button>
        </form>
    </div>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>