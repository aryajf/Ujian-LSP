<?php include 'template/session.php' ?>
<?php include 'template/header.php' ?>
<?php include 'template/navbar.php' ?>
<div class="container">
    <div class="row my-5">
        <div class="col d-flex justify-content-center align-items-center">
            <h1 id="home-title">Skuyy borong semua!!</h1>
        </div>
        <div class="col d-flex justify-content-center align-items-center">
            <img id="home-image" src="assets/shop.png" alt="">
        </div>
    </div>
    <hr>
    <div class="row">
        <?php
            $stmt = $conn->prepare("SELECT * FROM barang");
            $stmt->execute();
            while($barang = $stmt->fetch(PDO::FETCH_OBJ)) {
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
<?php include 'template/footer.php' ?>