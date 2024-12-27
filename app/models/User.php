<?php

namespace Models;

//use Core\Database;

class User
{
    private $db;

    public function __construct()
    {
        // Lấy kết nối cơ sở dữ liệu
//        $this->db = Database::getInstance()->getConnection();
    }

    // Lấy danh sách tất cả người dùng
    public function getAllUsers()
    {
//        $query = "SELECT id, name, email FROM users";
//        $result = $this->db->query($query);
//
//        if ($result->num_rows > 0) {
//            return $result->fetch_all(MYSQLI_ASSOC);
//        }

        return [
            ['id' => 0, 'name' => "123213", 'email' => "12313"],
        ];
    }
}
