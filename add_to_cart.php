<?php
require_once 'bootstrap.html';
session_start();
//unset($_SESSION['cart']);
$id = $_GET['id'];

// kiểm tra nếu session trống
// ta kết nối sql tìm các sản phẩm theo id và thêm vào session
// lấy ra kết quả mảng đầu tiên
// quantity mặc định 1 khi thực hiện
// nếu sản phẩm đã có trong cart thì ++

if(empty($_SESSION['cart'][$id])) {
    require_once 'admin/connect.php';
    $sql = "select * from products
    where id = '$id'";
    $result = mysqli_query($connect,$sql);
    $each = mysqli_fetch_array($result);
    $_SESSION['cart'][$id]['name'] = $each['name'];
    $_SESSION['cart'][$id]['photo'] = $each['photo'];
    $_SESSION['cart'][$id]['price'] = $each['price'];
    $_SESSION['cart'][$id]['quantity'] = 1;
} else {
    $_SESSION['cart'][$id]['quantity']++;
}


// mysqli_close($connect);
//in mảng thì dùng
// print_r($_SESSION['cart']);

//echo json_encode($_SESSION['cart']);
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
    <div class="container">
        <h3>Đã thêm vào giỏ hàng thành công</h3>
        <div>
            <a href="view_cart.php" class="link-info">
                Xem giỏ hàng
            </a>
        </div>
        <div>
            <a href="index.php" class="link-primary">
                quay về trang chủ
            </a>
        </div>
    </div>
    
</body>
</html>