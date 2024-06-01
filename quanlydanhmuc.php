<?php
require '../config/database.php';
require_once '../models/danhmuc.php';
$danhmuc_db = new Danhmuc_db();
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
    <h1>Quản Lý danh mục</h1>

    <form action="../View/danhmuc/themdanhmuc_Form.php" method="get">
        <button type="submit">Thêm Sản Phẩm</button>
    </form>

    <form action="../controller/dangxuat.php">
        <button type="submit">logout</button>
    </form>

    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Mã danh mục</th>
                    <th scope="col">Tên danh mục</th>
                    <th scope="col">Ghi chú</th>
                    <th scope="col">Thao Tac</th>
                </tr>
            </thead>
            <tbody>
                <?php $dssp = $danhmuc_db->layTatCaDanhMuc();
                foreach ($dssp as $danhmuc) {
                ?>
                    <tr>
                        <td scope="col"><?php echo $danhmuc['ma']; ?></td>
                        <td scope="col"><?php echo $danhmuc['ten']; ?></td>
                        <td scope="col"><?php echo $danhmuc['ghichu']; ?></td>
                        <td scope="col">
                            <form action="../controller/xoadanhmuc.php" method="post" onsubmit="return confirm('Do you want to delete?')">
                                <button type="submit" class="btn btn-danger" name="ma" value="<?php echo $danhmuc['ma'] ?>">Delete</button>
                            </form>
                            <a href="../View/danhmuc/suadanhmuc.php?id=<?php echo $danhmuc['ma'] ?>" class="btn btn-warning">Edit</a>
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