<?php

require '../config/database.php';
require '../models/user.php';

$username = '';
$password = '';

$nguoidung = new User();
$nguoidungtk = $nguoidung->dangnhap();
if (isset($_POST['username'])) {
    $username = $_POST['username'];
}
if (isset($_POST['password'])) {
    $password = $_POST['password'];
}



foreach ($nguoidungtk as $user) {
    if (!empty($username) && !empty($password)) {
        if ($username == $user['taikhoan'] && password_verify($password, $user['matkhau'])) {
            $_SESSION['user_id'] = $user['ma'];
            if ($user['phanquyen'] == 1) {
                header('location: ../View/quanlysanpham.php');
            } else {
                header('location: ../View/trangchu.php');
            }
        }
    }
}
