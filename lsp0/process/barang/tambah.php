<?php
session_start();
require '../../koneksi.php';
$nama = $_POST['nama'];
$deskripsi = $_POST['deskripsi'];
$refresh = header("Location:../../dashboard.php");

if (empty($nama)) {
    setcookie('error_tambah', 'Nama anda kosong', time()+ 2 ,"/");
    echo $refresh;
} elseif (empty($deskripsi)) {
    setcookie('error_tambah', 'Deskripsi anda kosong', time()+ 2 ,"/");
    echo $refresh;
} else {
    setcookie('error_tambah', '', time()+ 2 ,"/");
    $stmt = $conn->prepare('SELECT id FROM user WHERE username=:username');
    $stmt->bindValue(':username', $_SESSION['username']);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_OBJ);
    $insert = $conn->prepare("INSERT INTO barang(nama,deskripsi,user_id) VALUES('$nama','$deskripsi','$row->id')");
    $insert->bindValue(':nama', $nama);
    $insert->bindValue(':deskripsi', $deskripsi);
    $insert->execute();
    header('Location:../../dashboard.php');
}