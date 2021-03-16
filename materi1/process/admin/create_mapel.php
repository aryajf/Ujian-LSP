<?php
require '../../koneksi.php';

$mapel = $_POST['mapel'];
if (empty($mapel)) {
    setcookie('error_mapel', 'Mapel belum diisi', time() + 5, "/");
    header('Location:../../admin.php');
} else {
    $stmt = $conn->prepare("INSERT INTO mapel(nama_mapel) VALUES('$mapel')");
    $stmt->execute();

    header('Location:../../admin.php');
}
