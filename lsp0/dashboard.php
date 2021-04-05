<?php include 'template/session.php' ?>
<?php isset($_COOKIE['error_tambah'])? $error = $_COOKIE['error_tambah'] : $error = null; ?>
<?php include 'template/header.php' ?>
<div class="container">
<div class="row">
<div class="col">
<h3>Isi Barang</h3>
<form action="process/barang/tambah.php" method="post">
<div><label for="nama">Nama :</label><input name="nama" placeholder="Isi nama" class="form-control" type="text"></div>
<div><label for="deskripsi">Deskripsi : </label><textarea name="deskripsi" placeholder="Isi deskripsi" class="form-control"></textarea></div>
<?php if($error){ ?>
  <div class="alert alert-danger"><?php echo $error ?></div>
<?php } ?>
<button class="mt-2 btn btn-success form-control" type="submit">Tambah</button>
</form>
</div>
<div class="col">
<h3>List Barang</h3>
    <table class="table">
    <thead>
        <tr>
        <th scope="col">No</th>
        <th scope="col">Nama</th>
        <th scope="col-2">Action</th>
        </tr>
    </thead>
    <tbody>
<?php
$no = 1;
$stmt = $conn->prepare('SELECT barang.nama FROM barang JOIN user WHERE barang.user_id=user.id');
$stmt->execute();
while($barang = $stmt->fetch(PDO::FETCH_OBJ)){
?>
        <tr>
        <th scope="row"><?php echo $no ?></th>
        <td><?php echo $barang->nama ?></td>
        <td></td>
        </tr>
<?php $no++; } ?>
    </tbody>
    </table>
</div>
</div>
</div>
<?php include 'template/footer.php' ?>