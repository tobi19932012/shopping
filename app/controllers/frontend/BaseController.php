<?php

namespace controllers\frontend;


use Core\View;

class BaseController {
//    public function __construct() {
//        die;
//        session_start();
//        // Kiểm tra nếu chưa đăng nhập, chuyển hướng về trang login
//        if (empty($_SESSION['logged_in'])) {
//            header('Location: /admin/login');
//            exit();
//        }
//    }

    public function renderFrontend($view, $data = [])
    {
        // Tạo nội dung cần hiển thị cho các trang con
        ob_start();
        View::render($view, $data);
        $content = ob_get_clean();

        // Bao gồm layout và chèn nội dung vào đó
        include '../app/views/frontend/layout.php';
    }
}
