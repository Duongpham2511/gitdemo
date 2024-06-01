<?php

require '../config/database.php';
require '../models/danhmuc.php';

if (isset($_POST['ma'])) {
    $id = $_POST['ma'];
    $danhmucModel = new Danhmuc_db();
    if ($danhmucModel->xoadanhmuc($id)) {
        $_SESSION['alert'] = 'Deleted successfully!!!';
    } else {
        $_SESSION['alert'] = 'Deleted failed!!!';
    }
    header('location: ../View/quanlydanhmuc.php');
}
