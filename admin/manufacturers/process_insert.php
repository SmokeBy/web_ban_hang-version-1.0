<?php

// nếu người dùng để trống thì quay lại trang insert
if(empty($_POST['name']) || empty($_POST['address']) || empty($_POST['phone']) || empty($_POST['photo'])){
    header('location:form_insert.php?error=Phải điền đầy đủ thông tin');
}

$name = $_POST['name'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$photo = $_POST['photo'];

require_once '../connect.php';

$sql = "insert into manufacturers(name,address,phone,photo)
values('$name','$address','$phone','$photo')";
//die($sql);
mysqli_query($connect,$sql);
mysqli_close($connect);

header('location:index.php?success=Thêm thành công');