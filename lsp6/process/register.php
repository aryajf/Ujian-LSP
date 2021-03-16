<?php
session_start();
$username = $_POST['username'];
$nama = $_POST['nama'];
$password = $_POST['password'];
$refresh = header("Location:../register.php");

if (empty($username)) {
    $_SESSION['error_register'] = "Username anda kosong";
    echo $refresh;
} elseif (empty($nama)) {
    $_SESSION['error_register'] = "Nama anda kosong";
    echo $refresh;
} elseif (empty($password)) {
    $_SESSION['error_register'] = "Password anda kosong";
    echo $refresh;
}
