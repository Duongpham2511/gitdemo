<?php

class User extends DataBase
{
    public function dangnhap()
    {
        $sql = parent::$connection->prepare('SELECT * FROM `nguoidung` ');
        return parent::select($sql);
    }
    public function logout()
    {
    }
    public function phanquyen($id)
    {
        $sql = parent::$connection->prepare('SELECT p.ma FROM `phanquyen` p 
        INNER JOIN `nguoidung_phanquyen` np ON p.ma = np.phanquyen_ma 
        JOIN `sanpham` sp WHERE sp.ma=np.nguoidung_ma AND sp.ma= ? ');
        $sql->bind_param('i', $id);
        return parent::select($sql)['id'];
    }
    /*
    public function dangky($taikhoan, $matkhau, $email)
    {
        $sql = parent::$connection->prepare('INSERT INTO `nguoidung` (`taikhoan`,`matkhau`,`email`) VALUES (?,?,?)');
        $sql->bind_param('sss', $taikhoan, $matkhau, $email);
        $sql->execute();
        $insertedUser = parent::$connection->insert_id;
        $phanquyen_ma = 2;
        $sql = parent::$connection->prepare('INSERT INTO `nguoidung_phanquyen` (`nguoidung_ma`,`phanquyen_ma`) VALUES (?, ?) ');
        $sql->bind_param('ii', $insertedUser, $phanquyen_ma);
        return $sql->execute();
    }
    */


    public function dangky($username, $password, $email)
    {
        $sql = parent::$connection->prepare('INSERT INTO `nguoidung`(`taikhoan`, `matkhau`, `email`) VALUES (?,?,?)');
        $sql->bind_param('sss', $username, $password, $email);
        $sql->execute();
        $insertedUser = parent::$connection->insert_id;
        $phanquyen_ma = 2;
        $sql = parent::$connection->prepare('INSERT INTO `nguoidung_phanquyen` (`nguoidung_ma`,`phanquyen_ma`) VALUES (?, ?) ');
        $sql->bind_param('ii', $insertedUser, $phanquyen_ma);
        return $sql->execute();
    }

    /*
    public function login($username, $password)
    {
        $sql = parent::$connection->prepare('SELECT * FROM `nguoidung` WHERE taikhoan = ?');
        $sql->bind_param('s', $username);
        $user = parent::select($sql)[0];
        if (password_verify($password, $user['matkhau'])) {
            return $user;
        }
        return false;
    }
    */
}
