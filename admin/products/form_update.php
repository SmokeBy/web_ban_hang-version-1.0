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
        $id = $_GET['id'];
        require_once '../menu.php'; 
        require_once '../connect.php';
        // select cow có id từ thanh địa chỉ để edit
        $sql = "select * from products 
        where 
        id = '$id'";
        $result = mysqli_query ($connect,$sql);
        // trả result về kiểu array nên ta lấy phần tử đầu tiên 
        $each = mysqli_fetch_array($result);

        // select và lấy ra dữ liệu của table manufacturers
        // để có thể select name manufacturer_id from table thay vì echo id
        $sql = "select * from manufacturers";
        $manufacturers = mysqli_query ($connect,$sql);
    ?>
    <form action="process_update.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $each['id'] ?>">

        Tên
        <input type="text" name="name" value="<?php echo $each['name'] ?>"><br>
        Đổi ảnh mới
        <input type="file" name="photo_new"><br>
        Hoặc giữ ảnh cũ
        <img src="photos/<?php echo $each['photo'] ?>" height='100'>
        <input type="hidden" name="photo_old" value="<?php echo $each['photo'] ?>"><br>
        
        Giá
        <input type="text" name="price" value="<?php echo $each['price'] ?>"><br>
        Mô tả
        <textarea name="description"><?php echo $each['description'] ?></textarea><br>
        Nhà sản xuất
        <select name="manufacturer_id">
            <?php foreach($manufacturers as $manufacturer): ?>
                <option value="<?php echo $manufacturer['id'] ?>"
                    <?php if($each['manufacturer_id'] == $manufacturer['id']){ ?>
                        selected
                    <?php } ?>
                >
                    <?php echo $manufacturer['name'] ?>
                </option>
            <?php endforeach ?>
        </select><br>
        <button>Sửa</button>
    </form>
</body>
</html>