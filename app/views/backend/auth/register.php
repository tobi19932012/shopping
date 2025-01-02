<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Register</title>

    <!-- Custom fonts for this template-->
    <link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="/css/sb-admin-2.min.css" rel="stylesheet">

    <style>
        .box-container {
            width: 700px;
        }
    </style>
</head>

<body class="bg-gradient-primary">

<div class="container box-container">

    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Tạo đăng ký</h1>
                        </div>
                        <form class="user" action="/admin/register" method="POST">
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="text" class="form-control"
                                           name="name"
                                           placeholder="Nhập họ tên">
                                </div>
                                <div class="col-sm-6">
                                    <select class="form-control" name="role">
                                        <option value="1">Quản trị</option>
                                        <option value="2">Khách hàng</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <input type="email" class="form-control"
                                           placeholder="Nhập email">
                                </div>
                                <div class="col-sm-6">
                                    <input type="phone" class="form-control"
                                           placeholder="Nhập số điện thoại">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="text" class="form-control" name="username" placeholder="Nhập tài khoản">
                                </div>
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="password" class="form-control" name="password" placeholder="Password">
                                </div>
                            </div>
                            <input type="submit" class="btn btn-primary btn-user btn-block" value="Cập nhật">
<!--                            <a href="login.html" class="btn btn-primary btn-user btn-block">-->
<!--                                Register Account-->
<!--                            </a>-->
                        </form>
                        <hr>
                        <div class="text-center">
                            <a class="small" href="/admin/login">Already have an account? Login!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

</body>

</html>