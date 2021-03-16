<?php session_start(); ?>
<?php isset($_SESSION['error_login']) ? $error = $_SESSION['error_login'] : $error = null; ?>
<?php require 'template/header.php'; ?>
<form action="process/login.php" method="post">
<div class="mb-3 row">
  <label for="exampleInputEmail1" class="form-label">Username</label>
  <input type="text" name="username" class="form-control" id="exampleInputEmail1">
</div>
<div class="mb-3 row">
  <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
  <div class="col-sm-10">
    <input name="password" type="password" class="form-control" id="inputPassword">
  </div>
</div>
<?php if ($error) { ?>
  <div class="alert alert-danger"><?php echo $error; ?></div>
<?php } ?>
<button type="submit" class="btn btn-primary">Submit</button>
</form>
<?php require 'template/footer.php'; ?>