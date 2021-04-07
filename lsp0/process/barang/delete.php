<?php
require '../../koneksi.php';
$delete = $conn->prepare('DELETE FROM barang WHERE id=:id');
$delete->bindValue(':id', $_GET['id']);
$delete->execute();
if($_GET['status'] == 'admin'){
    echo header("Location:../../admin.php");
}else{
    echo header("Location:../../dashboard.php");
}