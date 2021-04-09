<?php include 'template/session.php' ?>
<?php if(empty($user) || $user->role == 1) {
    header("Location:index.php");
}else{
?>
<?php include 'template/header.php' ?>
<?php include 'template/navbar.php' ?>
<div class="container">
    <div class="row">
        <div class="col">
            <form action="process/barang/tambah.php" method="post">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Barang</label>
                <input name="nama" type="text" class="form-control" id="nama">
            </div>
            <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea name="deskripsi" class="form-control" id="deskripsi" rows="3"></textarea>
            </div>
            <div class="mb-3">
                <input type="submit" class="btn btn-success" value="Create">
            </div>
            </form>
        </div>
        <div class="col"></div>
    </div>
</div>
<?php include 'template/footer.php' ?>
<?php } ?>