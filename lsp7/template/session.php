<?php session_start() ?>
<?php
if (isset($_SESSION['email'])) {
    require 'koneksi.php';
    $stmt = $conn->prepare('SELECT * FROM user WHERE email=:email');
    $stmt->bindValue(':email', $_SESSION['email']);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_OBJ);
} else {
    $user = null;
}
?>