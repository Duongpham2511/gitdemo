<?php

require '../config/database.php';
require '../models/danhmuc.php';
$ma = '';
$ten = '';
$ghichu = '';


if (isset($_POST['ten'])) {
    $ten = $_POST['ten'];
}
if (isset($_POST['ma'])) {
    $ma = $_POST['ma'];
}
if (isset($_POST['ghichu'])) {
    $ghichu = $_POST['ghichu'];
}

if (isset($ten) && isset($ghichu)) {
    $danhmuc_db = new Danhmuc_db();
    $danhmuc_db->suaDanhMuc($ma, $ten, $ghichu);
    header('location:../View/quanlydanhmuc.php');
}
