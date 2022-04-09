<?php

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$phone_number = $_POST['phone_number'];
$address = $_POST['address'];

// where kiểm tra xem có email nào trùng trong database vì email mỗi tài khoảng email không nên trùng
require_once 'admin/connect.php';
$sql = "select count(*) from customers
where
email = '$email'";
$result = mysqli_query ($connect,$sql);
$number_rows = mysqli_fetch_array($result)['count(*)'];

// select đếm kết quả tìm kiếm ở trên nếu có 1 thì ta báo lỗi về
if ($number_rows == 1){
    session_start();
    $_SESSION['error'] = 'Trùng email rồi. Bạn điền email khác đi';
    header('location:sign_up.php');
    exit;
}

$sql = "insert into customers(name,email,password,phone_number,address)
value ('$name','$email','$password','$phone_number','$address')";
mysqli_query ($connect,$sql);

$sql = "select id from customers
where
email = '$email'";
$result = mysqli_query ($connect,$sql);
$id = mysqli_fetch_array($result)['id'];

session_start();
$_SESSION['id'] = $id;
$_SESSION['name'] = $name;

mysqli_close($connect);