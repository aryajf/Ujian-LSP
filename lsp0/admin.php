<?php
    include 'template/session.php';
    if($user->role == 1 && $user){
?>
<?php include 'template/header.php' ?>
<div class="container">
<h3>List Siswa yang terdaftar</h3>
<table class="table" border="1">
    <tr>
        <th>No</th>
        <th>Username</th>
        <th>Nama</th>
        <th>Dibuat pada</th>
    </tr>
<?php
$no = 1;
$stmt = $conn->prepare('SELECT * FROM user WHERE role=2');
$stmt->execute();
while($siswa = $stmt->fetch(PDO::FETCH_OBJ)){
?>
    <tr>
        <td><?php echo $no ?></td>
        <td><?php echo $siswa->username ?></td>
        <td><?php echo $siswa->nama ?></td>
        <td><?php echo $siswa->created_at ?></td>
    </tr>
<?php $no++; } ?>
</table>
</div>
<?php include 'template/footer.php' ?>
<?php }else{
    header("Location:index.php");
} ?>