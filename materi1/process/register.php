<?php
session_start();
require '../koneksi.php';
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$password2 = $_POST['password2'];
$refresh = header('Location:../register.php');

if (empty($email)) {
    $_SESSION["error"] = 'Email tidak boleh kosong';
    echo $refresh;
} elseif (empty($username)) {
    $_SESSION["error"] = 'Username tidak boleh kosong';
    echo $refresh;
} elseif (empty($password)) {
    $_SESSION["error"] = 'Password tidak boleh kosong';
    echo $refresh;
} elseif (empty($password2)) {
    $_SESSION["error"] = 'Konfirmasi password tidak boleh kosong';
    echo $refresh;
} elseif ($password != $password2) {
    $_SESSION["error"] = 'Password tidak sama dengan Konfirmasi password';
    echo $refresh;
} else {
    $stmt = $conn->prepare("SELECT * FROM user WHERE username=:username AND email=:email");
    $stmt->bindValue(':username', $username);
    $stmt->bindValue(':email', $email);
    $stmt->execute();
    if ($stmt->rowCount()) {
        $_SESSION["error"] = 'Data yang anda masukkan sudah ada di aplikasi kami';
        echo $refresh;
    } else {
        $_SESSION["error"] = '';
        $hashedpass = password_hash($password, PASSWORD_DEFAULT);
        $signup = $conn->prepare("INSERT INTO user(username, email, password, role) VALUES(:username, :email, :password, 2)");
        $signup->bindValue(':username', $username);
        $signup->bindValue(':email', $email);
        $signup->bindValue(':password', $hashedpass);
        $signup->execute();
        header('Location:../login.php');
    }
}
