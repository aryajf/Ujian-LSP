<?php include 'template/session.php' ?>
<?php if (empty($user) || $user->role == 2) {
    header("Location:index.php");
} else {
?>
    <?php include 'template/header.php' ?>
    <?php include 'template/navbar.php' ?>
    <div class="container">
        <div class="row">
            <div class="col">
            <h3>List User</h3>
                <table class="table">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Bergabung pada</th>
                    </tr>
                    <?php
                    $no = 1;
                    $stmt = $conn->prepare("SELECT * FROM user WHERE role=2");
                    $stmt->execute();
                    while ($users = $stmt->fetch(PDO::FETCH_OBJ)) {
                    ?>
                    <tr>
                        <td><?php echo $no ?></td>
                        <td><?php echo $users->nama ?></td>
                        <td><?php echo $users->email ?></td>
                        <td><?php echo $users->status ?></td>
                        <td><?php echo date("d-m-Y h:m:s", strtotime($users->created_at)) ?></td>
                    </tr>
                    <?php } ?>
                </table>
            </div>
            <div class="col">
            
            </div>
        </div>
    </div>
    <?php include 'template/footer.php' ?>
<?php } ?>