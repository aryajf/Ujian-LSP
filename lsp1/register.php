<?php session_start(); ?>
<?php isset($_SESSION['error']) ? $error = $_SESSION['error'] : $error = null; ?>
<?php require 'template/header.php'; ?>
<form action="process/register.php" method="post">
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Username</label>
        <input type="text" name="username" class="form-control" id="exampleInputEmail1">
        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input name="password" type="password" class="form-control" id="exampleInputPassword1">
    </div>
    <?php if ($error) { ?>
        <div class="alert alert-danger"><?php echo $error; ?></div>
    <?php } ?>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
<?php require 'template/footer.php'; ?>