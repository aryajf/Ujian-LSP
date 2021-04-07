<?php
require '../../koneksi.php';
$delete = $conn->prepare('UPDATE user SET status=:status WHERE id=:id');
$delete->bindValue(':status', 'Active');
$delete->bindValue(':id', $_GET['id']);
$delete->execute();
if($_GET['status'] == 'admin'){
    echo header("Location:../../admin.php");
}else{
    echo header("Location:../../dashboard.php");
}