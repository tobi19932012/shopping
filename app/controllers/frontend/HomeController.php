<?php

namespace Controllers\Frontend;

require_once '../app/controllers/frontend/BaseController.php';
class HomeController extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Trang chủ',
            'welcome_message' => 'Chào mừng bạn đến với trang chủ!',
        ];

        $this->render('frontend/pages/home', $data);
    }
}
