<?php

namespace Core;

use mysqli;

class Database
{
    private static $instance = null;
    private $connection;

    // Cấu hình thông tin kết nối
    private $host = 'localhost';
    private $username = 'root';
    private $password = '';
    private $database = 'mvc_example';

    private function __construct()
    {
        // Kết nối MySQL
        $this->connection = new mysqli($this->host, $this->username, $this->password, $this->database);

        // Kiểm tra lỗi kết nối
        if ($this->connection->connect_error) {
            die("Kết nối thất bại: " . $this->connection->connect_error);
        }
    }

    // Lấy instance duy nhất
    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    // Lấy kết nối
    public function getConnection()
    {
        return $this->connection;
    }
}
