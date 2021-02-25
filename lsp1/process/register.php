<?php
session_start();
require '../koneksi.php';

$username = $_POST['username'];
$password =  $_POST['password'];
$refresh = header("Location:../register.php");

if(empty($username)){
    $_SESSION['error'] = 'Username Kosong';
    echo $refresh;
}elseif(empty($password)){
    $_SESSION['error'] = 'Password Kosong';
    echo $refresh;
}else{

}
