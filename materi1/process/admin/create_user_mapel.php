<?php
require '../../koneksi.php';

$user = $_POST['user'];
$mapel = $_POST['mapel'];

$stmt = $conn->prepare("SELECT * FROM user_mapel WHERE user_id='$user' AND mapel_id='$mapel'");
$stmt->execute();

if ($stmt->rowCount()) {
    setcookie('error_user_mapel', 'Data sudah pernah ditambahkan', time() + 5, "/");
    header('Location:../../admin.php');
} else {
    setcookie('error_user_mapel', null, time() + 5, "/");
    $stmt = $conn->prepare("INSERT INTO user_mapel(user_id,mapel_id) VALUES('$user','$mapel')");
    $stmt->execute();
    header('Location:../../admin.php');
}


