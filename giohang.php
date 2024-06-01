<?php

require '../config/database.php';
require_once '../models/sanpham.php';
$sanpham_db = new Sanpham_db();


if (isset($_GET['id'])) {
    $sanpham_id = $_GET['id'];
    $allsanpham = $sanpham_db->getProductById($sanpham_id);
    if (isset($_SESSION['cart'])) {
        $nhan = [
            'cart' => [
                'id' => $allsanpham['ma'],
                'name' => $allsanpham['ten'],
                'price' => $allsanpham['gia'],
                'description' => $allsanpham['mota'],
                'image' => $allsanpham['hinh']
            ]
        ];
        $_SESSION['cart'][] = $nhan['cart']; // Thêm sản phẩm mới vào mảng $_SESSION['cart']
    } else {
        $_SESSION['cart'] = [
            'cart' => [
                'id' => $allsanpham['ma'],
                'name' => $allsanpham['ten'],
                'price' => $allsanpham['gia'],
                'description' => $allsanpham['mota'],
                'image' => $allsanpham['hinh']
            ]
        ];
    }
}





?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="../public/css/style.css">
</head>

<body>
    <div class="container text-light">
        <h1>Your cart</h1>
        </span>
        <?php
        foreach ($_SESSION['cart'] as  $sanpham) {
        ?>
        <div class="row mt-3">
            <div class="col-md-3"><img class="img-flui  d" src="../View/image/<?php echo $sanpham['image'] ?> " alt="">
            </div>
            <p><?php echo $sanpham['name']  ?></p>
            <div class="col-md-3">
                <p class="fs-4">
                    <?php echo $sanpham['price']  ?>
                </p>
                <p class="fs-4">
                    <?php echo $sanpham['description']  ?>
                </p>
            </div>
            <div class="col-md-3">
                <div class="btn btn-outline-info px-5"> <a href="login.php" style="text-decoration: none; color: aqua;">
                        Pay</a></div>
            </div>
            <div class="col-md-3">
                <div class="btn btn-outline-danger px-3"> <a style="text-decoration:none;"
                        href="destroy-cart.php">Delete</a> </div>
            </div>
            <hr>
        </div>
        <?php
        }
        ?>
        <div class="btn btn-info ms-5 me-3 px-5">Pay ALL</div>
        <span class="fs-3">Total :
        </span>
    </div>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>

</html>