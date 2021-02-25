<?php
session_start();
require '../koneksi.php';
$email = $_POST['email'];
$password = $_POST['password'];
$refresh = header("Location:../login.php");

if (empty($email)) {
    $_SESSION["error"] = 'Email tidak boleh kosong';
    echo $refresh;
} elseif (empty($email)) {
    $_SESSION["error"] = 'Password tidak boleh kosong';
    echo $refresh;
} else {
    $stmt = $conn->prepare("SELECT * FROM user WHERE email=:email");
    $stmt->bindValue(':email', $email);
    $stmt->execute();

    if ($stmt->rowCount()) {
        $row = $stmt->fetch(PDO::FETCH_OBJ);
        if (password_verify($password, $row->password)) {
            $_SESSION['error'] = '';
            $_SESSION['username'] = $row->username;
            header("Location:../index.php");
        } else {
            $_SESSION['error'] = 'Email dan password tidak sesuai';
            echo $refresh;
        }
    } else {
        $_SESSION["error"] = 'Email belum terdaftar';
        echo $refresh;
    }
}
