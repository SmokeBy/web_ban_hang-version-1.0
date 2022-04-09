<?php

session_start();
$id = $_GET['id'];
$type = $_GET['type'];

// xóa session cart theo id và số lượng trên 1 thì xóa
// nếu sai thì xóa luôn cái cart đó
if($type === 'decre'){
    if($_SESSION['cart'][$id]['quantity'] > 1){
        $_SESSION['cart'][$id]['quantity']--;
    } else {
        unset($_SESSION['cart'][$id]);
    }
} else {
    $_SESSION['cart'][$id]['quantity']++;
}

header('location:view_cart.php');