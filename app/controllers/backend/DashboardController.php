<?php

namespace Controllers\Backend;

use controllers\BackendController;

class DashboardController extends BackendController
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {

        session_start(); // Khởi tạo session

        var_dump($_SESSION);
//        session_destroy();
    }
}
