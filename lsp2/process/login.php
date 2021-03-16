<?php
session_start();
require '../koneksi.php';
$username = $_POST['username'];
$password = $_POST['password'];
$refresh = header("Location:../login.php");

if (empty($username)) {
    $_SESSION['error_login'] = 'Username anda kosong';
    echo $refresh;
} elseif (empty($password)) {
    $_SESSION['error_login'] = 'Password anda kosong';
    echo $refresh;
} else {
    $stmt = $conn->prepare('SELECT * FROM user WHERE username=:username');
    $stmt->bindValue(':username', $username);
    $stmt->execute();
    if ($stmt->rowCount()) {
        $row = $stmt->fetch(PDO::FETCH_OBJ);
        if(password_verify($password, $row->password)) {
            $_SESSION['error_login'] = '';
            $_SESSION['username'] = $row->username;
            header("Location:../index.php");
        } else {
            $_SESSION['error_login'] = 'Username dan password tidak sesuai';
            echo $refresh;
        }
    } else {
        $_SESSION['error_login'] = 'User belum terdaftar di aplikasi kami';
        echo $refresh;
    }
}