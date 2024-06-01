<?php

require '../config/database.php';
require '../models/sanpham.php';

$ten = '';
$gia = '';
$mota = '';
$hinh = '';
$ma = '';
$danhmucId = [];

if (isset($_POST['ten'])) {
    $ten = $_POST['ten'];
}
if (isset($_POST['ma'])) {
    $ma = $_POST['ma'];
}

if (isset($_POST['gia'])) {
    $gia = $_POST['gia'];
}

if (isset($_POST['mota'])) {
    $mota = $_POST['mota'];
}


if (isset($_POST['hinh'])) {
    $hinh = $_POST['hinh'];
}

if (isset($_POST['danhmucId'])) {
    $danhmucId = $_POST['danhmucId'];
}


if (isset($ten) && isset($gia) && isset($mota) && isset($hinh) && isset($danhmucId)) {
    $sanpham_db = new Sanpham_db();
    $sanpham_db->suaSanPham($ma, $ten, $gia, $mota, $hinh, $danhmucId);
    header('location:../View/quanlysanpham.php');
}
