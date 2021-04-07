<?php
require '../../koneksi.php';
session_start();
$nama =  $_POST['nama'];
$deskripsi =  $_POST['deskripsi'];
$refresh = header("Location:../../dashboard.php");

if (empty($nama)) {
    setcookie('error_insert', 'Nama Barang anda kosong', time() + 2, "/");
    echo $refresh;
} else if (empty($deskripsi)) {
    setcookie('error_insert', 'Deskripsi Barang anda kosong', time() + 2, "/");
    echo $refresh;
} else {
    // Mengeluarkan data
    $stmt = $conn->prepare("SELECT id FROM user WHERE username=:username");
    $stmt->bindValue(':username', $_SESSION['username']);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_OBJ);

    // Tambah data
    $insert = $conn->prepare('INSERT INTO barang(nama,deskripsi,user_id) VALUES(:nama,:deskripsi,:user_id)');
    $insert->bindValue(':nama', $nama);
    $insert->bindValue(':deskripsi', $deskripsi);
    $insert->bindValue(':user_id', $user->id);
    $insert->execute();
    header("Location:../../dashboard.php");
}
