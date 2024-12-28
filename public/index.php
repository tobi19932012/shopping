<?php
//die("1313123");
// Include các file cần thiết
require_once '../app/core/View.php';
require_once '../app/core/Router.php';
require_once '../app/core/Database.php';
require_once '../app/controllers/frontend/HomeController.php';
require_once '../app/controllers/frontend/AboutController.php';
require_once '../app/controllers/backend/DashboardController.php';
require_once '../app/controllers/backend/AuthController.php';

// Đăng ký route cho phương thức GET
Core\Router::get('/', ['controller' => 'Frontend\\HomeController', 'action' => 'index']);
Core\Router::get('/about', ['controller' => 'Frontend\\AboutController', 'action' => 'index']);
Core\Router::get('/admin', ['controller' => 'Backend\\DashboardController', 'action' => 'index']);
Core\Router::get('/admin/login', ['controller' => 'Backend\\AuthController', 'action' => 'loginForm']);
Core\Router::post('/admin/login', ['controller' => 'Backend\\AuthController', 'action' => 'login']);
// Lấy URL và phương thức HTTP
$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method = $_SERVER['REQUEST_METHOD'];  // Lấy phương thức GET hoặc POST


Core\Router::route($url, $method);
