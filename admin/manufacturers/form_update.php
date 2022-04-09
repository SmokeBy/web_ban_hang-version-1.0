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
        if(empty($_GET['id'])){
            header('location:index.php?error=Phải truyền mã để sửa');
        }
        $id = $_GET['id'];
        require_once '../menu.php';
        require_once '../connect.php';
        $sql = "select * from manufacturers
        where id = '$id'";
        $result = mysqli_query($connect,$sql);
        // kiểm tra id đúng có kết quả trả về có 1 row thì mới chạy tiếp
        $number_rows = mysqli_num_rows($result);
        if($number_rows === 1){
            $each = mysqli_fetch_array($result);
    ?>

    <form action="process_update.php" method="post">
        <input type="hidden" name="id" value="<?php echo $each['id'] ?>">
        Tên
        <input type="text" name="name" value="<?php echo $each['name'] ?>"><br>
        Địa chỉ 
        <textarea name="address"><?php echo $each['address'] ?></textarea><br>
        Điện thoại 
        <input type="text" name="phone" value="<?php echo $each['phone'] ?>"><br>
        Ảnh
        <input type="text" name="photo" value="<?php echo $each['photo'] ?>"><br>
        <button>Sửa</button>
    </form>
    <?php } else{ ?>
        <h1>Không tìm thấy theo mã này</h1>
    <?php } ?>
</body>
</html>