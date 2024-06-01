<?php

require '../config/database.php';
require '../models/danhmuc.php';

$ten = '';
$ghichu = '';


if (isset($_POST['ten'])) {
    $ten = $_POST['ten'];
}

if (isset($_POST['ghichu'])) {
    $ghichu = $_POST['ghichu'];
}


/*

if (!empty($ten) && !empty($gia) && !empty($mota) && !empty($hinh)) {
    $sanpham_db = new Sanpham_db();
    $sanpham_db->themSanPham($ten, $gia, $mota, $hinh, $danhmucId);
    header('location:../View/quanlysanpham.php');
}
*/
if (isset($ten) && isset($ghichu)) {
    $danhmuc_db = new Danhmuc_db();
    $danhmuc_db->themDanhMuc($ten, $ghichu);
    header('location:../View/quanlydanhmuc.php');
}
