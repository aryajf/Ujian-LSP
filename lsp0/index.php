<?php include 'template/session.php'?>
<?php include 'template/header.php'?>
<?php include 'template/navbar.php'?>
<div class="container mt-5">
    <div class="row">
        <div class="col d-flex align-items-center justify-content-center">
            <h1 id="home-title">Kuyy borong semua!</h1>
        </div>
        <div class="col d-flex align-items-center justify-content-center" id="home-img"><img src="assets/shopping.png" alt="">
        </div>
    </div>
    <div class="row">
        <?php
            $no = 1;
            $stmt = $conn->prepare("SELECT barang.id, barang.nama, barang.deskripsi, user.username, barang.created_at FROM barang JOIN user ON barang.user_id=user.id");
            $stmt->execute();
            while($barang = $stmt->fetch(PDO::FETCH_OBJ)) {
        ?>
        <div class="col-md-3">
            <div data-aos="flip-left" data-aos-duration="500" data-aos-offset="250" class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $barang->nama ?></h5>
                    <p class="card-text"><?php echo $barang->deskripsi ?></p>
                    <hr>
                    <div>
                        <i class="uil uil-pen"></i> <?php echo $barang->username ?> 
                    </div>
                    <div>
                        <i class="uil uil-clock"></i> <?php echo date("d-m-Y h:m:s", strtotime($barang->created_at)) ?>
                    </div>
                    <hr>
                    <a href="show.php?id=<?php echo $barang->id ?>" class="btn btn-success">Baca Selengkapnya</a>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>
<?php include 'template/footer.php'?>