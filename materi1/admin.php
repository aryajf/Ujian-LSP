<?php require 'template/session.php' ?>
<?php if($user->role == 1){
    isset($_COOKIE['error_user_mapel'])? $error_user_mapel = $_COOKIE['error_user_mapel']: $error_user_mapel = null;
    isset($_COOKIE['error_mapel'])? $error_mapel = $_COOKIE['error_mapel']: $error_mapel = null;
    include 'template/header.php';
    include 'template/navbar.php';
?>
<div class="container-fluid">
<h1>WASSUP ADMIN</h1>

<h2>List Siswa :</h2>
<table border="1">
<thead>
    <tr>
    <td>No</td>
    <td>Email</td>
    <td>Username</td>
    <td>Dibuat pada</td>
    </tr>
</thead>
<tbody>
<?php
$no = 1;
$stmt = $conn->prepare('SELECT * FROM user WHERE role=2');
$stmt->execute();
while($siswa = $stmt->fetch(PDO::FETCH_OBJ)) {
?>
<tr>
<td><?php echo $no ?></td>
<td><?php echo $siswa->username ?></td>
<td><?php echo $siswa->email ?></td>
<td><?php echo date('d/m/Y H:i:s', strtotime($siswa->created_at)) ?></td>
</tr>
<?php $no++; } $no = 1; ?>
</tbody>
</table>
<hr>
<br>
<h2>Materi : </h2>
<form action="process/admin/create_mapel.php" method="post">
    <div class="row mb-3">
        <div class="col-6">
            <label for="exampleInputEmail1" class="form-label">Nama Mata Pelajaran</label>
            <input type="text" name="mapel" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="col-2">
            <button type="submit" class="w-100 h-100 btn btn-success">Buat Materi</button>
        </div>
        <?php if($error_mapel){ ?>
        <div class="col-2 alert alert-danger"><?php echo $error_mapel ?></div>
        <?php } ?>
    </div>
</form>
<table border="1">
<thead>
    <tr>
    <td>No</td>
    <td>Nama Mapel</td>
    </tr>
</thead>
<tbody>
<?php
$no = 1;
$stmt = $conn->prepare('SELECT * FROM mapel');
$stmt->execute();
while($mapel = $stmt->fetch(PDO::FETCH_OBJ)) {
?>
<tr>
<td><?php echo $no ?></td>
<td><?php echo $mapel->nama_mapel ?></td>
</tr>
<?php $no++; } $no = 1; ?>
</tbody>
</table>
<hr>
<br>
<h2>List Siswa & Mata Pelajarannya :</h2>
<form action="process/admin/create_user_mapel.php" method="post">
    <div class="row mb-3">
        <div class="col-2">
            <label for="exampleInputEmail1" class="form-label">Nama Siswa</label>
            <select class="form-control" name="user">
            <?php
                $no = 1;
                $stmt = $conn->prepare('SELECT * FROM user WHERE role=2');
                $stmt->execute();
                while($siswa = $stmt->fetch(PDO::FETCH_OBJ)) {
            ?>
                <option value="<?php echo $siswa->id ?>"><?php echo $siswa->username ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="col-2">
            <label for="exampleInputEmail1" class="form-label">Nama Mata Pelajaran</label>
            <select class="form-control" name="mapel">
            <?php
                $no = 1;
                $stmt = $conn->prepare('SELECT * FROM mapel');
                $stmt->execute();
                while($mapel = $stmt->fetch(PDO::FETCH_OBJ)) {
            ?>
                <option value="<?php echo $mapel->id ?>"><?php echo $mapel->nama_mapel ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="col-2">
            <button type="submit" class="w-100 h-100 btn btn-success">Pasangkan</button>
        </div>
        <?php if($error_user_mapel){ ?>
        <div class="col-3 alert alert-danger"><?php echo $error_user_mapel ?></div>
        <?php } ?>
</form>
</div>
<table border="1">
<thead>
    <tr>
    <td>No</td>
    <td>Nama Mapel</td>
    </tr>
</thead>
<tbody>
<?php
$no = 1;
$stmt = $conn->prepare("SELECT user.username, mapel.nama_mapel FROM user_mapel INNER JOIN user ON user.id=user_mapel.user_id INNER JOIN mapel ON mapel.id=user_mapel.mapel_id ORDER BY user.id");
$stmt->execute();
while($user_mapel = $stmt->fetch(PDO::FETCH_OBJ)) {
?>
<tr>
<td><?php echo $no ?></td>
<td><?php echo $user_mapel->username ?></td>
<td><?php echo $user_mapel->nama_mapel ?></td>
</tr>
<?php $no++; } $no = 1; ?>
<tbody>
</table>
</div>
<?php include 'template/footer.php' ?>
<?php }else{
    header("Location:index.php");
}?>