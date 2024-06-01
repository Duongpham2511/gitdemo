<?php
require '../config/database.php';
require_once '../models/sanpham.php';
$sanpham_db = new Sanpham_db();

if (isset($_GET['id'])) {
    $sanpham_id = $_GET['id'];
    $allsanpham = $sanpham_db->getProductById($sanpham_id);
}

?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container">
    <div class="row">
        <div class="col-md">
            <img class="card-img-top" src="./image/<?php echo $allsanpham['hinh'] ?>" alt="..." style="width: 200px;" />
        </div>

        <div class="col-my-3">
            <h1><a href=""></a><?php echo $allsanpham['ten'] ?></h1>
            <p><?php echo $allsanpham['gia'] ?></p>
            <?php echo $allsanpham['mota'] ?>
            <br>
            <br>
            <div data-productId="<?php echo $allsanpham['ma']  ?>" class="btn-like"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143q.09.083.176.171a3 3 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15" />
            </svg></div>
            <span class="view-like"></span>
        </div>
        <div class="col-md">
            <div class="d-grid gap-2 mt-5">
                <a href="#" class="btn btn-outline-dark" type="submit">Mua ngay</a>
                <br>
                <a href="giohang.php?id=<?php echo $allsanpham['ma']  ?>" class="btn btn-outline-primary" type="submit">Thêm vào giỏ</a>
            </div>
        </div>
    </div>
</div>
<script src="js/app.js"></script>
<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="js/scripts.js"></script>