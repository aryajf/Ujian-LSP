<?php require 'template/session.php' ?>
<?php if($user->role == 2){ ?>
<?php include 'template/header.php' ?>
<?php include 'template/navbar.php' ?>
<h1>HAIII MURID MURIDKU</h1>
<h2>List Mata Pelajaran :</h2>
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
$stmt = $conn->prepare("SELECT * FROM user_mapel INNER JOIN user ON user.id=user_mapel.user_id INNER JOIN mapel ON mapel.id=user_mapel.mapel_id WHERE user_id='$user->id'");
$stmt->execute();
while($mapel = $stmt->fetch(PDO::FETCH_OBJ)) {
?>
<tr>
<td><?php echo $no ?></td>
<td><?php echo $mapel->nama_mapel ?></td>
</tr>
<?php $no++;} $no = 1; ?>
</tbody>
</table>
<?php include 'template/footer.php' ?>
<?php }else{
    header("Location:index.php");
}?>