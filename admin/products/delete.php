<?php

// nếu người dùng để trống thì quay lại trang insert
// if(empty($_GET['id'])){
//     header('location:index.php?error=Phải truyền mã để xóa');
//     exit;
// }

$id = $_GET['id'];

require_once '../connect.php';

$sql = "delete from products
where
id = '$id'";
//die($sql);
mysqli_query($connect,$sql);
$error = mysqli_error($connect);
mysqli_close($connect);
//header('location:index.php?success=Xóa thành công'); // điều hướng