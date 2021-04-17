<?php
require '../../koneksi.php';
session_start();
$nama =  $_POST['nama'];
$deskripsi =  $_POST['deskripsi'];

// Mengeluarkan data
$stmt = $conn->prepare("SELECT id FROM user WHERE email=:email");
$stmt->bindValue(':email', $_SESSION['email']);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_OBJ);
// Tambah data
$insert = $conn->prepare("INSERT INTO barang(nama_barang,deskripsi,user_id) VALUES('$nama','$deskripsi','$user->id')");
$insert->execute();
header("Location:../../user.php");
