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
        require_once '../menu.php';
        require_once '../connect.php';
        // lấy tất cả các cột từu table products bằng dấu *
        // table manufacturers thì lấy name và đổi tên thành manufacturers_name để xuống dưới echo ra
        // từ table products
        // ta lấy phân vùng chung của table 2 manufacturers ON 
        // table products thì ta selects column manufacturer_id còn table manufacturers thì ta selects id
        $sql = "select products.*,
        manufacturers.name as manufacturers_name
        from products
        join manufacturers ON products.manufacturer_id = manufacturers.id";
        $result = mysqli_query ($connect,$sql);
    ?>
    <h1>Quản lý sản phẩm</h1>
    <a href="form_insert.php">Thêm</a>
    <table border="1" width="100%">
        <tr>
            <th>Mã</th>
            <th>Tên</th>
            <th>Ảnh</th>
            <th>Giá</th>
            <th>Tên nhà sản xuất</th>
            <th>Sửa</th>
            <th>Xóa</th>
        </tr>
        <?php foreach ($result as $each): ?>
            <tr>
                <td><?php echo $each['id'] ?></td>
                <td><?php echo $each['name'] ?></td>
                <td>
                    <img height="100" src="photos/<?php echo $each['photo'] ?>" alt="photo">
                </td>
                <td><?php echo $each['price'] ?>.000 vnđ</td>
                <td><?php echo $each['manufacturers_name'] ?></td>
                <td>
                    <a href="form_update.php?id=<?php echo $each['id'] ?>">Sửa</a>
                </td>
                <td>
                    <a href="delete.php?id=<?php echo $each['id'] ?>">Xóa</a>
                </td>
            </tr>
        <?php endforeach ?>
    </table>
</body>
</html>