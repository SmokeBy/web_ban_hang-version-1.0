<?php

session_start();
$id = $_GET['id'];
// xóa session theo id
unset($_SESSION['cart'][$id]);

header('location:view_cart.php');