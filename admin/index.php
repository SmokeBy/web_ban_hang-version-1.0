<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php require_once 'bootstrap.html'; ?>

    <div class="container">
        <h1>Đăng nhập</h1>
        <div class="navbar navbar-light bg-light justify-content-between">
            <form action="process_login.php" method="post">
                <label for="exampleInputEmail1">Email Tài khoản</label>
                <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" placeholder="Nhập email">
                <br>
                <label for="exampleInputPassword1">Mật khẩu</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Mật khẩu của bạn">
                <br>
                <button type="submit" class="btn btn-primary">Đăng nhập</button>
            </form>
        </div>
    </div>
</body>
</html>