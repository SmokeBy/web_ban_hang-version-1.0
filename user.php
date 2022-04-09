<?php 
// kiểm tra session xem có id không
// nếu không báo lỗi
// có id thì xác nhận thân phận gửi lời chào và có đăng xuất
session_start();
if(empty($_SESSION['id'])){
    header('location:index.php?error=Đăng nhập đi bạn');
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
    <?php
        if($_SESSION['id']){ ?>
            <div class="alert alert-success" role="alert">
                This is a success alert—check it out!
            </div>
            <?php header('location:index.php'); ?>
    <?php } ?>
    <!-- Xin chào bạn  
    <?php
        echo $_SESSION['name'];
    ?>
    <a href="sign_out.php">
        Nhấn để xuất>>>
    </a> -->
    
</body>
</html>