<?php include 'template/session.php' ?>
<?php include 'template/header.php' ?>
<?php include 'template/navbar.php'?>
<?php
    $no = 1;
    $stmt = $conn->prepare("SELECT barang.id, barang.nama, barang.deskripsi, user.username, barang.created_at FROM barang JOIN user ON barang.user_id=user.id WHERE barang.id=:id");
    $stmt->bindValue(':id', $_GET['id']);
    $stmt->execute();
    $barang = $stmt->fetch(PDO::FETCH_OBJ)
?>
<div class="container">
<h1><?php echo $barang->nama ?></h1>
<hr>
<p><?php echo $barang->deskripsi ?></p>
</div>
<?php include 'template/footer.php' ?>