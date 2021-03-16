<?php
    require '../koneksi.php';
    session_start();
    $email = $_POST['email'];
    $nama = $_POST['nama'];
    $password = $_POST['password'];
    $refresh = header("Location:../register.php");

    if(empty($email)){
        $_SESSION['error_register'] = 'Email anda kosong';
        echo $refresh;
    }elseif(empty($nama)){
        $_SESSION['error_register'] = 'Nama anda kosong';
        echo $refresh;
    }elseif(empty($password)){
        $_SESSION['error_register'] = 'Password anda kosong';
        echo $refresh;
    }else{
        $stmt = $conn->prepare('SELECT * FROM user WHERE email=:email');
        $stmt->bindValue(':email', $email);
        $stmt->execute();
        if($stmt->rowCount()){
            $_SESSION['error_register'] = 'User sudah terdaftar di aplikasi kami';
            echo $refresh;
        }else{
            $_SESSION['error_register'] = '';
            $hashedpass = password_hash($password, PASSWORD_DEFAULT);
            $register = $conn->prepare('INSERT INTO user(email,nama,password,role) VALUES(:email,:nama,:password,2)');
            $register->bindValue(':email', $email);
            $register->bindValue(':nama', $nama);
            $register->bindValue(':password', $hashedpass);
            $register->execute();
            header('Location:../login.php');
        }
    }