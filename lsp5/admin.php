<?php include 'template/session.php' ?>
<?php include 'template/header.php' ?>
<?php include 'template/navbar.php' ?>
<h1>dashboard Admin</h1>
<div class="container">
    <div class="row">
        <div class="col">
            <h3>List User</h3>
            <table class="table">
                <tr>
                    <th>No</th>
                    <th>Username</th>
                    <th>Nama</th>
                    <th>Status</th>
                    <th>Bergabung pada : </th>
                </tr>
                <?php
                $no = 1;
                $stmt = $conn->prepare("SELECT * FROM user WHERE role=2");
                $stmt->execute();
                while ($users = $stmt->fetch(PDO::FETCH_OBJ)) {
                ?>
                    <tr>
                        <td><?php echo $no ?></td>
                        <td><?php echo $users->username ?></td>
                        <td><?php echo $users->nama ?></td>
                        <td><?php echo $users->status ?></td>
                        <td><?php echo date("d-m-Y h:m:s", strtotime($users->created_at)) ?></td>
                    </tr>
                <?php } ?>
            </table>
        </div>
        <div class="col">
            <h3>List Barang</h3>
            <table class="table">
                <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Pemilik</th>
                    <th>Dibuat pada :</th>
                    <th>Diupdate pada : </th>
                </tr>
                <?php
                $no = 1;
                $stmt = $conn->prepare("SELECT barang.id, barang.nama_barang, user.username, barang.created_at FROM barang JOIN user ON barang.user_id=user.id");
                $stmt->execute();
                while ($barang = $stmt->fetch(PDO::FETCH_OBJ)) {
                ?>
                    <tr>
                        <td><?php echo $no ?></td>
                        <td><?php echo $barang->nama_barang ?></td>
                        <td><?php echo $barang->username ?></td>
                        <td><?php echo date("d-m-Y h:m:s", strtotime($barang->created_at)) ?></td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</div>
<?php include 'template/footer.php' ?>