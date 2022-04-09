<?php 
    // lưu cookie 
    session_start();
    if(isset($_COOKIE['remember'])){
        $token = $_COOKIE['remember'];
        require_once 'admin/connect.php';
        $sql = "select * from customers
        where token = '$token'
        limit 1";
        $result = mysqli_query ($connect,$sql);
        $number_rows = mysqli_num_rows($result);
        if($number_rows == 1){
            $each = mysqli_fetch_array ($result);
            $_SESSION['id'] = $each ['id'];
            $_SESSION['name'] = $each ['name'];
        }   
    }
    if(isset($_SESSION['id'])){
        header('location:user.php');
        exit;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container col-xs-1">
        <?php require_once 'bootstrap.html';?>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="sign_up.php">Đăng ký</a></li>
                <li class="breadcrumb-item active" aria-current="page">Đăng nhập</li>
            </ol>
        </nav>

        <form action="process_sign_in.php" method="post">
            <h1>Đăng nhập</h1>
            <div class="form-group">
                <label for="exampleInputEmail1">Email Tài khoản</label>
                <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" placeholder="Nhập email">
                <small id="emailHelp" class="form-text text-muted">Chúng tôi sẽ không bao giờ chia sẻ email của bạn với bất kỳ ai khác.</small>
            </div>
            <br>
            <div class="form-group">
                <label for="exampleInputPassword1">Mật khẩu</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Mật khẩu của bạn">
            </div>
            <br>
            <div class="form-check">
                <input type="checkbox" name="remember" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Ghi nhớ đăng nhập của tôi </label>
            </div>
            <button type="submit" class="btn btn-primary">Đăng nhập</button>
        </form>
        <br>
        <label>Bạn chưa có tài khoản? hãy</label>
        <a href="sign_up.php" class="btn btn-success">Đăng ký</a>
    </div>
</body>
    <!-- <?php mysqli_close($connect) ?> -->
</html>