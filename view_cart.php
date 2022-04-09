<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- lấy session cart ra để loop in các giá trị trong session đã add từ add_to_cart trước đó -->
    <!-- cart là mảng cần loop, each là giá trị của phần tử ở vị trí id -->
    <?php
        session_start();
        $cart = $_SESSION['cart'];
        $sum = 0;
    ?>

    <?php require_once 'bootstrap.html';?>

    <div class="container">
        <table id="cart" class="table table-hover table-condensed">
            <thead>
                <tr>
                    <th>Ảnh</th>
                    <th>Tên</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th class="text-center">Tổng tiền</th>
                    <th>Xóa</th>
                </tr>
            </thead>
            
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Giỏ hàng</li>
                </ol>
            </nav>

            <?php foreach($cart as $id => $each): ?>
                <tr>
                    <td><img src="admin/products/photos/<?php echo $each['photo'] ?>" alt="" height='100'></td>
                    <td><?php echo $each['name'] ?></td>
                    <td><?php echo $each['price'] ?></td>
                    <td>
                        <a href="update_quantity_in_cart.php?id=<?php echo $id ?>&type=decre">
                            <i class="bi bi-arrow-down"></i>
                        </a>
                        <?php echo $each['quantity'] ?>
                        <a href="update_quantity_in_cart.php?id=<?php echo $id ?>&type=incre">
                            <i class="bi bi-arrow-up"></i>
                        </a>
                    </td>
                    <!-- tổng tiền thì dùng price * quantity -->
                    <td>
                        <?php 
                            $result = $each['price'] * $each['quantity'];
                            echo $result;
                            $sum += $result;
                        ?>.000.vnd
                    </td>
                    <td>
                        <a href="delete_from_cart.php?id=<?php echo $id ?>">Xóa sản phẩm</a>
                    </td>
                </tr>
            <?php endforeach ?>
        </table>
        <h1>
            Tổng tiền phải thanh toán là: 
            <?php echo $sum ?>
        </h1>
        <br>
        <?php 
        $id = $_SESSION['id'];
        require_once 'admin/connect.php';
        $sql = "select * from customers
        where id = '$id'";
        $result = mysqli_query($connect,$sql);
        $each = mysqli_fetch_array($result);

        ?>
        <form action="process_checkout.php" method="post">
            Tên người nhận
            <input type="text" name="name_receiver" value=<?php echo $each ['name'] ?>>
            <br>
            Số điện thoại người nhận
            <input type="text" name="phone_receiver" value=<?php echo $each ['phone_number'] ?>>
            <br>
            Địa chỉ người nhận
            <input type="text" name="address_receiver" value=<?php echo $each ['address'] ?>>
            <br>
            <button class="btn btn-success">
                Đặt hàng
            </button>
        </form>
        
    </div>
</body>
</html>