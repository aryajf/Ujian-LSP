<?php
session_start();
require '../koneksi.php';
$username = $_POST['username'];
$nama = $_POST['nama'];
$password = $_POST['password'];
$refresh = header("Location:../signin.php");

if (empty($username)) {
    $_SESSION['error_register'] = 'Username anda kosong';
    echo $refresh;
} elseif (empty($nama)) {
    $_SESSION['error_register'] = 'Nama anda kosong';
    echo $refresh;
} elseif (empty($password)) {
    $_SESSION['error_register'] = 'Password anda kosong';
    echo $refresh;
}else{
    $stmt = $conn->prepare('SELECT * FROM user where username=:username');
    $stmt->bindValue(':username', $username);
    $stmt->execute();
    if ($stmt->rowCount()) {
        $_SESSION["error"] = 'Data yang anda masukkan sudah ada di aplikasi kami';
        echo $refresh;
    }
}
