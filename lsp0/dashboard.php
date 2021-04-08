<?php include 'template/session.php'?>
<?php if (empty($user) || $user->role == 1){header("Location:index.php");} else {
?>
<?php include 'template/header.php'?>
<?php include 'template/navbar.php'?>
<?php
    if(isset($_COOKIE['error_insert'])){
        $error = $_COOKIE['error_insert'];
    }else{
        $error = null;
    }
?>
<div class="container">
<div class="row">
    <div class="col d-flex justify-content-center">
        <h1>Dashboard User</h1>
    </div>
</div>
<div class="row">
    <div class="col">
        <h3>Tambah Barang</h3>
        <form action="process/barang/insert.php" method="post">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Barang</label>
                <input name="nama" type="text" class="form-control" id="nama">
            </div>
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskirpsi Barang</label>
                <textarea name="deskripsi" class="form-control" id="deskripsi"></textarea>
            </div>
            <?php if($error){ ?>
                <div class="alert alert-danger"><?php echo $error ?></div>
            <?php } ?>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <div class="col">
        <h3>List Barang</h3>
        <table class="table">
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Dibuat Pada</th>
                <th>Diperbarui Pada</th>
                <th>Aksi</th>
            </tr>
            <?php
            $no = 1;
            $stmt = $conn->prepare("SELECT * FROM barang WHERE user_id=$user->id");
            $stmt->execute();
            while($barang = $stmt->fetch(PDO::FETCH_OBJ)) {
            ?>
            <tr>
                <td><?php echo $no ?></td>
                <td><?php echo $barang->nama ?></td>
                <td><?php echo date("d-m-Y h:m:s", strtotime($barang->created_at)) ?></td>
                <td><?php echo date("d-m-Y h:m:s", strtotime($barang->updated_at)) ?></td>
                <td><a href="process/barang/delete.php?status=user&id=<?php echo $barang->id?>">Delete</a></td>
            </tr>
            <?php $no++; } ?>
        </table>
    </div>
</div>
</div>
<?php include 'template/footer.php'?>
<?php } ?>