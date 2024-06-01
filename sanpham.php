<?php

class Sanpham_db extends DataBase
{

    // lấy tất cả sản phẩm
    public function layTatCaSanPham()
    {
        $sql = parent::$connection->prepare("SELECT * FROM sanpham");
        return parent::select($sql);
    }
    // lấy sản phẩm theo danh mục id
    public function laySanPhamTheoDanhMucID($id)
    {
        $sql = parent::$connection->prepare("SELECT sp.ma ,sp.ten, sp.gia, sp.mota, sp.hinh FROM `sanpham` sp 
        INNER JOIN sanpham_danhmuc pc on sp.ma=pc.sanpham_id 
        INNER JOIN danhmuc c on c.ma = pc.danhmuc_id WHERE c.ma = ? ");
        $sql->bind_param("i", $id);
        return parent::select($sql);
    }
    // chi tiết sản phẩm
    public function getProductById($id)
    {
        // 2. Tạo câu SQL
        $sql = parent::$connection->prepare('SELECT * FROM `sanpham` WHERE `ma`= ?');
        $sql->bind_param('i', $id);
        return parent::select($sql)[0];
    }
    /*
    // chi tiết sản phẩm
    function chitietsanphamId($id)
    {
        if ($id>0) {
            $sql = parent::$connection->prepare("SELECT * FROM sanpham where ma=".$id);
            $sql->bind_param("i",$id);
            $sql->execute();
        }else{
            return 0;
        }
    }
    */

    // Search
    public function search($keyword)
    {
        $keyword = "%{$keyword}%";
        $sql = parent::$connection->prepare('SELECT * FROM `sanpham` WHERE `ten` LIKE ?');
        $sql->bind_param('s', $keyword);
        return parent::select($sql);
    }


    // thêm sản phẩm 
    public function themSanPham($ten, $gia, $mota, $hinh, $danhmucId)
    {
        $sql = parent::$connection->prepare("INSERT INTO sanpham (`ten`,`gia`,`mota`,`hinh`) VALUES (?, ?, ?, ?)");
        $sql->bind_param("siss", $ten, $gia, $mota, $hinh);
        $sql->execute();
        $Id = parent::$connection->insert_id;
        $sql = self::$connection->prepare("INSERT INTO sanpham_danhmuc (`sanpham_id`,`danhmuc_id`) VALUES (?, ?)");
        $sql->bind_param("ii", $Id, $danhmucId);
        $sql->execute();
    }
    /*
     //Xóa sản phẩm
     public function destroy($productId)
     {
         // Xoa product
         $sql = parent::$connection->prepare('DELETE FROM `sanpham` WHERE `ma`=?');
         $sql->bind_param('i', $productId);
         $sql->execute();
 
        
     }
     */


    // xóa sản phẩm
    public function xoaSanPham($sanphamId)
    {
        // xóa sản phẩm
        $sql = parent::$connection->prepare('DELETE FROM `sanpham` WHERE `ma` = ?');
        $sql->bind_param('i', $sanphamId);
        $sql->execute();
    }

    // sửa sản phẩm
    public function suaSanPham($ma, $ten, $gia, $mota, $hinh, $danhmuc)
    {
        // 2.Tạo câu sql
        $sql = parent::$connection->prepare("UPDATE `sanpham` SET `ten` = ?,`gia` = ?,`mota` = ?,`hinh` = ? WHERE `ma` = ?");
        $sql->bind_param("sissi", $ten, $gia, $mota, $hinh, $ma);
        $sql->execute();
        // xóa danh mục sp cũ
        $sql = parent::$connection->prepare("DELETE FROM `sanpham_danhmuc` WHERE sanpham_id =?");
        $sql->bind_param("i", $ma);
        $sql->execute();
        // thêm danh mục mới

        foreach ($danhmuc as $danhmucId) {
            $sql = parent::$connection->prepare("INSERT INTO `sanpham_danhmuc`(`sanpham_id`, `danhmuc_id`) VALUES (?, ?)");
            $sql->bind_param("ii", $ma, $danhmucId);
            $sql->execute();
        }
    }
    // like san pham
    public function themlike($like)
    {
        $sql = parent::$connection->prepare('UPDATE `sanpham` SET likes = likes + 1 WHERE ma = ? ');
        $sql->bind_param('i',$like);
        $sql->execute();
        $sql = parent::$connection->prepare('SELECT `likes` FROM `sanpham` WHERE ma=? ');
        $sql->bind_param('i',$like);
        return parent::select($sql)[0];
    }


}
