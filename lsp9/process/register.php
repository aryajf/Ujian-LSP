<?php
    require '../koneksi.php';
    session_start();

    $username = $_POST['username'];
    $nama = $_POST['nama'];
    $password = $_POST['password'];
    $refresh = header("Location:../register.php");

    if(empty($username)){
        $_SESSION['error_register'] = 'Username anda kosong';
        echo $refresh;
    }elseif(empty($nama)){
        $_SESSION['error_register'] = 'Nama anda kosong';
        echo $refresh;
    }elseif(empty($password)){
        $_SESSION['error_register'] = 'Password anda kosong';
        echo $refresh;
    }else{
        $stmt = $conn->prepare("SELECT * FROM user WHERE username=$username");
        $stmt->execute();
        if($stmt->rowCount()){
            $_SESSION['error_register'] = 'Akun anda sudah terdaftar di aplikasi kami';
            echo $refresh;
        }else{
            $_SESSION['error_register'] = '';
            $signup = $conn->prepare("INSERT INTO user(username, password, nama , role) VALUES(:username, :password, :nama, 2)");
            $signup->bindValue(':username', $username);
            $signup->bindValue(':password', $password);
            $signup->bindValue(':nama', $nama);
            $signup->execute();

            // $register = $conn->prepare("INSERT INTO user VALUES(:username,:password,:nama,2)");
            // $register->bindValue(':username', $username);
            // $register->bindValue(':password', $password);
            // $register->bindValue(':nama', $nama);
            // $register->execute();
            header('Location:../login.php');
        }
    }