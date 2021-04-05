<?php
    require '../koneksi.php';

    $username = $_POST['username'];
    $nama = $_POST['nama'];
    $password = $_POST['password'];
    $refresh = header("Location:../register.php");

    if(empty($username)){
        setcookie('error_register', 'Username anda kosong', time() + 2, "/");
        echo $refresh;
    }elseif(empty($nama)){
        setcookie('error_register', 'Nama anda kosong', time() + 2, "/");
        echo $refresh;
    }elseif(empty($password)){
        setcookie('error_register', 'Password anda kosong', time() + 2, "/");
        echo $refresh;
    }else{
        $stmt = $conn->prepare("SELECT * FROM user WHERE username=$username");
        $stmt->execute();
        if($stmt->rowCount()){
            setcookie('error_register', 'Akun anda sudah terdaftar di aplikasi kami', time() + 2, "/");
            echo $refresh;
        }else{
            setcookie('error_register', '', time() + 2, "/");
            $hashedpass = password_hash($password, PASSWORD_DEFAULT);
            $signup = $conn->prepare("INSERT INTO user(username, password, nama , role) VALUES(:username, :password, :nama, 2)");
            $signup->bindValue(':username', $username);
            $signup->bindValue(':password', $hashedpass);
            $signup->bindValue(':nama', $nama);
            $signup->execute();
            header('Location:../login.php');
        }
    }