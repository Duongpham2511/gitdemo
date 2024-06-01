<?php
require_once '../config/database.php';
require '../models/user.php';

$userModel = new User();

if (isset($_POST['taikhoan'])) {
    $username = $_POST['taikhoan'];
}
if (isset($_POST['matkhau'])) {
    $password = $_POST['matkhau'];
}
if (isset($_POST['email'])) {
    $email = $_POST['email'];
}
var_dump($userModel);
if (!empty($username) && !empty($password) && !empty($email)) {
    $encryp = password_hash($password, PASSWORD_DEFAULT);
    if ($userModel->dangky($username,  $encryp, $email)) {
        header('location: ../Login/dangnhap_form.php');
    }
}
