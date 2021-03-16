<?php include 'template/header.php' ?>
<?php session_start() ?>
<?php isset($_SESSION['error_register']) ? $error = $_SESSION['error_register'] : $error = null ?>
<form action="process/register.php" method="post">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Username</label>
    <input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Nama</label>
    <input type="text" name="nama" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
  </div>
  <?php if($error){ ?>
  <div class="alert alert-danger"><?php echo $error ?></div>
  <?php } ?>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
<?php include 'template/footer.php' ?>