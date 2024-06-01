<?php
require '../config/database.php';
require_once '../models/sanpham.php';
$sanpham_db = new Sanpham_db();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>
    <h1>Quản Lý Sản Phẩm</h1>

    <form action="../View/admin/themsanpham_form.php" method="get">
        <button type="submit">Thêm Sản Phẩm</button>
    </form>
    <form action="../View/quanlydanhmuc.php" method="get">
        <button type="submit">trang quản lý danh mục</button>
    </form>

    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Mã SP</th>
                    <th scope="col">Tên SP</th>
                    <th scope="col">Giá SP</th>
                    <th scope="col">Mô tả</th>
                    <th scope="col">Hình</th>
                    <th scope="col">Thao Tac</th>
                </tr>
            </thead>
            <tbody>
                <?php $dssp = $sanpham_db->layTatCaSanPham();
                foreach ($dssp as $sanpham) {
                ?>
                    <tr>
                        <td scope="col"><?php echo $sanpham['ma']; ?></td>
                        <td scope="col"><?php echo $sanpham['ten']; ?></td>
                        <td scope="col"><?php echo $sanpham['gia']; ?></td>
                        <td scope="col"><?php echo $sanpham['mota']; ?></td>
                        <td scope="col"><?php echo $sanpham['hinh']; ?></td>
                        <td scope="col">
                            <form action="../controller/xoasanpham.php" method="post" onsubmit="return confirm('Do you want to delete?')">
                                <button type="submit" class="btn btn-danger" name="sanphamId" value="<?php echo $sanpham['ma'] ?>">Delete</button>
                            </form>
                            <a href="../View/admin/suasappham.php?id=<?php echo $sanpham['ma'] ?>" class="btn btn-warning">Edit</a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
</body>

</html>