<?php include 'template/session.php' ?>
<?php include 'template/header.php' ?>
<?php include 'template/navbar.php' ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h3>Tambah Barang</h3>
            <form action="process/barang/insert.php" method="post">
                <div>
                    <label for="nama">Nama Barang</label><input type="text" name="nama" id="nama">
                </div>
                <div>
                    <label for="deskripsi">Deskripsi Barang</label>
                    <textarea name="deskripsi" id="deskripsi"></textarea>
                </div>
                <div>
                    <input type="submit" value="Buat barang">
                </div>
            </form>
        </div>
        <div class="col">
            <h3>List Barang</h3>
        </div>
    </div>
</div>
<?php include 'template/footer.php' ?>