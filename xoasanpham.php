<?php

require '../config/database.php';
require '../models/sanpham.php';

if(isset($_POST['sanphamId'])) {
    $id = $_POST['sanphamId'];
    $productModel = new Sanpham_db();
    if ($productModel->xoaSanPham($id)) {
        $_SESSION['alert'] = 'Deleted successfully!!!';
    }
    else {
        $_SESSION['alert'] = 'Deleted failed!!!';
    }
    header('location: ../View/quanlysanpham.php');
}

?>