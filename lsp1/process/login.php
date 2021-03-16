<?php
session_start();
require '../koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];
$refresh = header("Location:../login.php");

if(empty($username)){
    $_SESSION['error_login'] = 'Username Kosong';
    echo $refresh;
}elseif(empty($password)){
    $_SESSION['error_login'] = 'Password Kosong';
    echo $refresh;
}else{

}
?>