<?php include 'template/session.php'?>
<?php include 'template/header.php'?>
<?php include 'template/navbar.php'?>
<div class="container">
    <div class="row my-5">
        <div class="col d-flex justify-content-center align-items-center">
            <h1>Skuyy borong semuaa!</h1>
        </div>
        <div class="col d-flex justify-content-center align-items-center">
            <img src="assets/shop.png" alt="">
        </div>
    </div>
    <hr>
    <div class="row">
        <?php
            $no = 1;
            $stmt = $conn->prepare("SELECT barang.id, barang.nama_barang, user.username, barang.deskripsi, barang.created_at FROM barang JOIN user ON barang.user_id=user.id");
            $stmt->execute();
            while ($barang = $stmt->fetch(PDO::FETCH_OBJ)) {
        ?>
        <div class="col">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $barang->nama_barang ?></h5>
                    <p class="card-text"><?php echo $barang->deskripsi ?></p>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>
<?php include 'template/footer.php'?>