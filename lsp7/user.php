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
            <h3>Tambah Barang</h3>
            <form action="process/barang/insert.php" method="post">
                <div>
                    <label for="nama">Nama Barang</label>
                    <input type="text" name="nama" id="nama">
                </div>
                <div>
                    <div><label for="deskripsi">Deskripsi Barang</label></div>
                    <textarea name="deskripsi" id="deskripsi"></textarea>
                </div>
                <div>
                    <input type="submit" value="Buat">
                </div>
            </form>
        </div>
        <div class="col">

        </div>
    </div>
</div>
<?php include 'template/footer.php' ?>
<?php } ?>