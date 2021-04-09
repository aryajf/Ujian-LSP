<?php include 'template/session.php'?>
<?php include 'template/header.php'?>
<?php include 'template/navbar.php'?>
<h1>dashboard User</h1>
<div class="container">
<div class="row">
<div class="col">
    <form action="process/barang/insert.php" method="post">
        <div class="mb-3">
            <label for="nama">Nama : </label><input type="text" name="nama" id="nama">
        </div>
        <div class="mb-3">
            <div>
                <label for="deskripsi">Deskripsi : </label>
            </div>
            <textarea name="deskripsi" id="deskripsi"></textarea>
        </div>
        <div class="mb-3">
            <input type="submit" class="btn btn-success" value="Create">
        </div>
    </form>
</div>
<div class="col">

</div>
</div>
</div>
<?php include 'template/footer.php'?>