<?php

// xóa session và đặt cookie remember trống thời gian tồn tại to cho âm
session_start();
unset($_SESSION['id']);
unset($_SESSION['name']);
setcookie('remember',null,-1);

header('location:index.php');