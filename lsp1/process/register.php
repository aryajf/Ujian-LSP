<?php
session_start();
require '../koneksi.php';

$username = $_POST['username'];
$nama = $_POST['nama'];
$password =  $_POST['password'];
$refresh = header("Location:../register.php");

if(empty($username)){
    $_SESSION['error_register'] = 'Username Kosong';
    echo $refresh;
}elseif(empty($nama)){
    $_SESSION['error_register'] = 'Nama Kosong';
    echo $refresh;
}elseif(empty($password)){
    $_SESSION['error_register'] = 'Password Kosong';
    echo $refresh;
}else{
    $stmt = $conn->prepare('SELECT * FROM user WHERE username=:username');
    $stmt->bindValue(':username', $username);
    $stmt->execute();
    if($stmt->rowCount()){
        $_SESSION['error_register'] = 'User sudah terdaftar di aplikasi kami';
        echo $refresh;
    }else{
        $_SESSION['error_register'] = '';
        $register = $conn->prepare('INSERT INTO user(username,nama,password,role) VALUES(:username,:nama,:password,2)');
        $register->bindValue(':username', $username);
        $register->bindValue(':nama', $nama);
        $register->bindValue(':password', $password);
        $register->execute();
        header("Location:../login.php");
    }
}
