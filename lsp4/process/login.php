<?php
session_start();
require '../koneksi.php';
$username = $_POST['username'];
$password = $_POST['password'];
$refresh = header("Location:../signin.php");

if (empty($username)) {
    setcookie('error_register', 'Username anda kosong', time()+ 2 ,"/");
    echo $refresh;
}elseif (empty($password)) {
    setcookie('error_register', 'Password anda kosong', time()+ 2 ,"/");
    echo $refresh;
}else{
    $stmt = $conn->prepare('SELECT * FROM user WHERE username=:username');
    $stmt->bindValue(':username', $username);
    $stmt->execute();
    if ($stmt->rowCount()) {
        $row = $stmt->fetch(PDO::FETCH_OBJ);
        if (password_verify($password, $row->password)) {
            setcookie('error_login', '', time()+ 2 ,"/");
            $_SESSION['username'] = $row->username;
            header("Location:../index.php");
        } else {
            setcookie('error_login', 'Username dan Password tidak sesuai', time()+ 2 ,"/");
            echo $refresh;
        }
    } else {
        setcookie('error_login', 'User belum terdaftar di aplikasi kami', time()+ 2 ,"/");
        echo $refresh;
    }
}