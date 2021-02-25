<?php
session_start();
require '../koneksi.php';
$username = $_POST['username'];
$password = $_POST['password'];
$refresh = header("Location:../register.php");

if (empty($username)) {
    $_SESSION['error_register'] = 'Username anda kosong';
    echo $refresh;
} elseif (empty($password)) {
    $_SESSION['error_register'] = 'Password anda kosong';
    echo $refresh;
} else {
    $_SESSION['error_register'] = '';
    echo $refresh;
}
