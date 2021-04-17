<?php
    session_start();
    require 'koneksi.php';
    if(isset($_SESSION['username'])){
        $stmt = $conn->prepare('SELECT * FROM user WHERE username=:username');
        $stmt->bindValue(':username', $_SESSION['username']);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_OBJ);
    }else{
        $user = null;
    }
?>