<?php
require "../../database/connect.php";
if (isset($_GET['cate_id'])) {
    $cate_id = $_GET["cate_id"];
    //echo $cate_id
    $sql = "SELECT * FROM category WHERE cate_id=$cate_id";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result)    >   0) {
        //output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
            $cate_name = $row["cate_name"];
        }
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
        <h2>Cập nhật sản phẩm ID: <?php echo $cate_id ?></h2>
        <form action="select.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <?php echo "<input type='hidden' class='form-control' name ='cate_id' value='$cate_id'>" ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Tên loại sản phẩm</label>
                <?php echo "<input type='text' class='form-control' name ='cate_name' value='$cate_name'>" ?>
            </div>
            <input type="submit" class="btn btn-primary" name="update" value="Cập nhật">
            <a class="btn btn-danger" href="select.php" role="button">Quay lại</a>
        </form>
    </div>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>