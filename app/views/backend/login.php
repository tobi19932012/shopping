<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
</head>
<body>

<h2>Đăng nhập vào Admin Panel</h2>

<?php if (isset($error)) : ?>
    <p style="color:red;"><?= $error ?></p>
<?php endif; ?>

<form method="POST" action="/admin/login">
    <label for="username">Tên đăng nhập:</label>
    <input type="text" id="username" name="username" required><br>

    <label for="password">Mật khẩu:</label>
    <input type="password" id="password" name="password" required><br>

    <button type="submit">Đăng nhập</button>
</form>

</body>
</html>
