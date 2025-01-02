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
    private $database = 'shop';

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

    public function fetchAll($sql, $params = [])
    {
        $stmt = $this->connection->prepare($sql);

        if ($params) {
            $types = str_repeat('s', count($params)); // Định dạng các tham số (s = string)
            $stmt->bind_param($types, ...$params);
        }

        $stmt->execute();
        $result = $stmt->get_result();

        if ($result === false) {
            return false;
        }

        return $result->fetch_all(MYSQLI_ASSOC); // Trả về mảng kết quả
    }

    // Phương thức lấy một bản ghi duy nhất
    public function fetchOne($sql, $params = []) {
//        var_dump(1231, $sql);
//        die;
        $stmt = $this->connection->prepare($sql);

        if ($params) {
            $types = str_repeat('s', count($params));
            $stmt->bind_param($types, ...$params);
        }

        $stmt->execute();
        $result = $stmt->get_result();

        if ($result === false) {
            return null;
        }

        return $result->fetch_assoc(); // Trả về bản ghi đầu tiên dưới dạng mảng kết hợp
    }

    public function deleteById($table, $id) {
        $query = "DELETE FROM $table WHERE id = ?";
        $stmt = $this->connection->prepare($query);

        if ($stmt) {
            $stmt->bind_param("i", $id); // Bind giá trị $id với kiểu integer
            return $stmt->execute();    // Thực thi câu lệnh
        } else {
            return false;
        }
    }

    /**
     * Hàm chung để chèn dữ liệu vào bảng
     *
     * @param string $table Tên bảng
     * @param array $data Dữ liệu cần chèn (key là tên cột, value là giá trị)
     * @return bool|int Trả về ID của bản ghi vừa thêm hoặc false nếu thất bại
     */
    public function insert($table, $data) {
        // Tạo chuỗi cột và giá trị
        $columns = implode(", ", array_keys($data));
//        var_dump($data, $columns);
//        die;
        $placeholders = implode(", ", array_fill(0, count($data), '?'));

        // Câu lệnh SQL
        $sql = "INSERT INTO $table ($columns) VALUES ($placeholders)";

        // Chuẩn bị câu lệnh
        $stmt = $this->connection->prepare($sql);
        if (!$stmt) {
            echo "Prepare failed: " . $this->connection->error;
            return false;
        }

        // Ràng buộc các giá trị (bind values)
        $types = str_repeat('s', count($data)); // Tất cả giá trị được giả định là chuỗi
        $stmt->bind_param($types, ...array_values($data));

        // Thực thi câu lệnh
        if ($stmt->execute()) {
            $insertId = $stmt->insert_id;
            $stmt->close();
            return $insertId; // Trả về ID của bản ghi vừa thêm
        } else {
            echo "Execute failed: " . $stmt->error;
            $stmt->close();
            return false;
        }
    }
}
