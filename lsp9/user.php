<?php include 'template/session.php' ?>
<?php
if (empty($user) || $user->role == 1) {
  header("Location:index.php");
} else {
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
            <div><label for="deskripsi">Deskripsi</label></div>
            <textarea type="text" id="deskripsi" name="deskripsi"></textarea>
          </div>
          <div>
            <input type="submit" value="Buat">
          </div>
        </form>
      </div>
      <div class="col">
        <h3>List Barang</h3>
        <table>
          <tr>
            <th>No</th>
            <th>Nama Barang</th>
            <th>Dibuat Pada</th>
            <th>Diupdate Pada</th>
          </tr>
          <?php
          $no = 1;
          $stmt = $conn->prepare("SELECT * FROM barang WHERE user_id='$user->id'");
          $stmt->execute();
          while ($barang = $stmt->fetch(PDO::FETCH_OBJ)) {
          ?>
            <tr>
              <td><?php echo $no ?></td>
              <td><?php echo $barang->nama_barang ?></td>
              <td><?php echo $barang->created_at ?></td>
              <td><?php echo $barang->updated_at ?></td>
            </tr>
          <?php $no++;
          } ?>
        </table>
      </div>
    </div>
  </div>
  <?php include 'template/footer.php' ?>
<?php } ?>