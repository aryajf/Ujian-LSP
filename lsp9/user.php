<?php include 'template/session.php' ?>
<?php
  if(empty($user) || $user->role == 1){
    header("Location:index.php");
  }else{
?>
<?php include 'template/header.php' ?>
<?php include 'template/navbar.php' ?>
<div class="container">
<div class="row">
<h1>Dashboard Admin</h1>
</div>
<div class="row">
    <div class="col">
        <h3>Tambah Barang</h3>
        <form action="process/barang/insert.php" method="post">
        <div>
          <label for="nama">Nama</label>
          <input type="text" id="nama" name="nama">
        </div>
        <div>
          <label for="deskripsi"></label>
          <textarea type="text" id="deskripsi" name="deskripsi"></textarea>
        </div>
        <div>
          <input type="submit" value="Buat">
        </div>
        </form>
    </div>
    <div class="col">
        <h3>List Barang</h3>
        
    </div>
</div>
</div>
<?php include 'template/footer.php' ?>
<?php } ?>