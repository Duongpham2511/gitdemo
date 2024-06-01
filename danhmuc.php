<?php


class Danhmuc_db extends DataBase
{

    //lấy tất cả danh mục
    public function layTatCaDanhMuc()
    {
        $sql = parent::$connection->prepare("SELECT * FROM danhmuc");
        return parent::select($sql);
    }
    // thêm danh mục
    public function themDanhMuc($ten, $ghichu)
    {
        $sql = parent::$connection->prepare("INSERT INTO `danhmuc` (`ten`,`ghichu`) VALUES (?, ?)");
        $sql->bind_param("ss", $ten, $ghichu);
        $sql->execute();
    }
    // xóa danh mục
    public function xoadanhmuc($ma)
    {
        // xóa danh mục
        $sql = parent::$connection->prepare('DELETE FROM `danhmuc` WHERE `ma` = ?');
        $sql->bind_param('i', $ma);
        $sql->execute();
    }
    // Sửa danh mục
    public function suaDanhMuc($ma, $ten, $ghichu)
    {
        // 2.Tạo câu sql
        $sql = parent::$connection->prepare("UPDATE `danhmuc` Set `ten` = ?,`ghichu` = ? where `ma` = ?");
        $sql->bind_param("ssi", $ten, $ghichu, $ma);
        $sql->execute();
    }

    // lấy danh mục theo sản phẩm   
    public function layDanhMucTheoSanPhamId($id)
    {
        $sql = parent::$connection->prepare("SELECT d.ma FROM `danhmuc` d INNER JOIN sanpham_danhmuc sd 
        on d.ma=sd.danhmuc_id inner JOIN sanpham s on s.ma=sd.sanpham_id WHERE s.ma = ? ");
        $sql->bind_param("i", $id);
        return parent::select($sql);
    }



    // lấy tất cả danh mục của 1 sản phẩm
    public function getCategoryById($id)
    {
        // 2. Tạo câu SQL
        $sql = parent::$connection->prepare('SELECT *
                                          FROM `danhmuc` 
                                          WHERE ma = ?');
        $sql->bind_param('i', $id);
        return parent::select($sql)[0];
    }

       // xóa danh mục
//     public function destroy($categoryId)
//     {
//         $sql = parent::$connection->prepare('DELETE FROM `categories` WHERE `id`=?');
//         $sql->bind_param('i', $categoryId);
//         $sql->execute();
//         $sql = parent::$connection->prepare('DELETE cp 
//         FROM category_product cp
//         INNER JOIN categories c ON cp.category_id = c.id
//         WHERE c.id = ?;
//         ');
//         $sql->bind_param('i', $categoryId);
//         $sql->execute();
//         $sql = parent::$connection->prepare(' DELETE p FROM products p LEFT JOIN category_product cp ON cp.product_id = p.id WHERE cp.product_id IS NULL');
//         return $sql->execute();        
//     }
}
