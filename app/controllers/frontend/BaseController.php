<?php

namespace Controllers\Frontend;

use Core\View;

class BaseController {
    public function render($view, $data = []) {
        // Tạo nội dung cần hiển thị cho các trang con
        ob_start();
        extract($data);
        View::render($view);
        $content = ob_get_clean();

        // Bao gồm layout và chèn nội dung vào đó
        include '../app/views/frontend/layout.php';
    }
}