<?php

namespace Controllers\Backend;

use Core\View;

class DashboardController
{
    public function index()
    {
        die("12313");
        // Kiểm tra xem người dùng có gửi dữ liệu qua form POST không
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Giả sử đây là dữ liệu đăng nhập của người dùng
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';

            // Kiểm tra đăng nhập (đơn giản, không an toàn)
            if ($username === 'admin' && $password === '1234') {
                // Redirect đến dashboard nếu đăng nhập thành công
                header('Location: /admin/dashboard');
                exit();
            } else {
                // Đăng nhập không thành công
                $data = ['error' => 'Sai thông tin đăng nhập!'];
                View::render('backend/login', $data);
            }
        } else {
            // Hiển thị form đăng nhập
            $data = ['title' => 'Đăng nhập'];
            View::render('backend/login', $data);
        }
    }
}
