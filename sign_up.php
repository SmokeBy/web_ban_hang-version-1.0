<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php require_once 'bootstrap.html';?>  
    <!-- nếu session có lỗi thì báo lỗi, in ra lỗi 1 lần và xóa lỗi -->
    <?php 
        session_start();
        if(isset($_SESSION['error'])){
            echo $_SESSION['error'];
            unset($_SESSION['error']);
        }
    ?>

    <div class="container col-xs-1">
        <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                    <li class="breadcrumb-item"><a href="sign_in.php">Đăng nhâp</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Đăng ký</li>
                </ol>
        </nav>

        <form action="process_sign_up.php" method="post">
            <h1>Đăng ký</h1>
            <div class="form-group">
                <label>Tên của bạn</label>
                <input type="text" name="name" class="form-control" placeholder="Nhập tên">
            </div>
            <br>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" placeholder="Nhập Email của bạn">
            </div>
            <br>
            <div class="form-group">
                <label>Mật khẩu</label>
                <input type="password" name="password" class="form-control" placeholder="Nhập mật khẩu">
            </div>
            <br>
            <div class="form-group">
                <label>Số điện thoại</label>
                <input type="text" name="phone_number" class="form-control" placeholder="Nhập số điện thoại">
            </div>
            <br>
            <div class="form-group">
                <label>Địa chỉ</label>
                <input type="text" name="address" class="form-control" placeholder="Nhập địa chỉ">
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Đăng ký</button>
        </form>
    </div>
</body>
</html>