<?php

namespace Controllers\Backend;

use Core\View;
use Core\Database;

class AuthController
{

    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
        session_start(); // Khởi động phiên làm việc

        die($_SESSION);
            // Kiểm tra nếu chưa đăng nhập, chuyển hướng về trang login
        if (!empty($_SESSION['logged_in'])) {
            header('Location: /admin');
            exit();

        }
    }

    public function loginForm()
    {
        View::render('backend/auth/login');
    }

    // Kiểm tra người dùng đã đăng nhập
    public function check()
    {
        return isset($_SESSION['logged_in']);
    }

    // Lấy thông tin người dùng hiện tại
    public function user()
    {
        if ($this->check()) {
            return [
                'id' => $_SESSION['user_id'],
                'name' => $_SESSION['user_name'] ?? '',
                'phone' => isset($_SESSION['phone']) ? $_SESSION['phone'] : '',
                'email' => isset($_SESSION['email']) ? $_SESSION['email'] : '',
            ];
        }
        return null;
    }

    public function login()
    {

        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';

        $user = $this->db->fetchOne("SELECT * FROM users WHERE username = ? AND role ='1'", [$username]);

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['logged_in'] = true;
            $_SESSION['user_name'] = $user['name'];
            $_SESSION['phone'] = $user['phone'] ?? '';
            $_SESSION['email'] = $user['email'] ?? '';

            header('Location: /admin');
        } else {
            $_SESSION['message_error'] = "Tài khoản hoặc mặt khẩu không đúng";
            header('Location: /admin/login');
        }
    }

    public function logout()
    {
        session_destroy(); // Hủy session
        header('Location: /admin/login'); // Chuyển về trang login
    }
}
