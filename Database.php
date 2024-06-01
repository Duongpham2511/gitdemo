<?php

class DataBase{
    public static $connection = NULL;
    public function __construct()
    {
        if (!self::$connection) {
            self::$connection = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
            self::$connection ->set_charset('utf8mb4');
        }
    }

    //thực thi câu select
    public function select($sql){
        $items = [];

        //. 3 thực thi câu sql
        $sql->execute();
        //. 4 xử lý kết quả 
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
}

?>