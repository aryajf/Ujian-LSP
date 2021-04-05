<?php
session_start();
require '../koneksi.php';
$username = $_POST['username'];
$nama = $_POST['nama'];
$password = $_POST['password'];
$refresh = header("Location:../register.php");

if (empty($username)) {
    setcookie('error_register', 'Username anda kosong', time()+ 2 ,"/");
    echo $refresh;
} elseif (empty($nama)) {
    setcookie('error_register', 'Nama anda kosong', time()+ 2 ,"/");
    echo $refresh;
} elseif (empty($password)) {
    setcookie('error_register', 'Password anda kosong', time()+ 2 ,"/");
    echo $refresh;
} else {
    $stmt = $conn->prepare('SELECT * FROM user WHERE username=:username');
    $stmt->bindValue(':username', $username);
    $stmt->execute();
    if($stmt->rowCount()){
        setcookie('error_register', 'User sudah terdaftar di aplikasi kami', time() + 2, "/");
        echo $refresh;
    }else{
        setcookie('error_register', '', time() + 2, "/");
        $hashedpass = password_hash($password, PASSWORD_DEFAULT);
        $register = $conn->prepare('INSERT INTO user(username,nama,password,role) VALUES(:username,:nama,:password,2)');
        $register->bindValue(':username', $username);
        $register->bindValue(':nama', $nama);
        $register->bindValue(':password', $hashedpass);
        $register->execute();
        header("Location:../login.php");
    }
}
?>