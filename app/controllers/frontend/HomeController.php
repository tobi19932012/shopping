<?php

namespace controllers\frontend;

class HomeController extends BaseController
{
    public function index()
    {
        die("1231");
        $data = [
            'title' => 'Trang chủ',
            'welcome_message' => 'Chào mừng bạn đến với trang chủ!',
        ];

        $this->renderFrontend('frontend/pages/home', $data);
    }
}
