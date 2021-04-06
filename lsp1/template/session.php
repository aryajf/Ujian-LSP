<?php
    session_start();
    if(isset($_SESSION['username'])){
        require 'koneksi.php';
        $stmt = $conn->prepare('SELECT * FROM user WHERE username=:username');
        $stmt->bindValue(':username', $_SESSION['username']);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_OBJ);
    }else{
        $user = null;
    }
?>