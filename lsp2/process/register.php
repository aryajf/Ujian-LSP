<?php
session_start();
require '../koneksi.php';
$username = $_POST['username'];
$nama = $_POST['nama'];
$password = $_POST['password'];
$refresh = header("Location:../register.php");

if (empty($username)) {
    $_SESSION['error_register'] = 'Username anda kosong';
    echo $refresh;
} elseif (empty($nama)) {
    $_SESSION['error_register'] = 'Nama anda kosong';
    echo $refresh;
} elseif (empty($password)) {
    $_SESSION['error_register'] = 'Password anda kosong';
    echo $refresh;
} else {
    $stmt = $conn->prepare('SELECT * FROM user WHERE username=:username');
    $stmt->bindValue(':username', $username);
    $stmt->execute();
    if ($stmt->rowCount()) {
        $_SESSION['error_register'] = 'User anda telah terdaftar di aplikasi kami';
        echo $refresh;
    } else {
        $_SESSION['error_register'] = '';
        $hashedpass = password_hash($password, PASSWORD_DEFAULT);
        $register = $conn->prepare('INSERT INTO user(username,nama,password,role) VALUES(:username,:nama,:password,2)');
        $register->bindValue(':username', $username);
        $register->bindValue(':nama', $nama);
        $register->bindValue(':password', $hashedpass);
        $register->execute();
        header('Location:../login.php');
    }
}
