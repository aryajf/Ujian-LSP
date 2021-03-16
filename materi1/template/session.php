<?php
    session_start();
    if(isset($_SESSION['username'])){
        require 'koneksi.php';
        $user = $conn->prepare("SELECT * FROM user JOIN role WHERE user.role=role.id AND username='$_SESSION[username]'");
        $user->execute();
        $user = $user->fetch(PDO::FETCH_OBJ);
    }else{
        $user = null;
    }
?>