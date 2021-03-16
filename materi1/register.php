<?php require 'template/session.php' ?>
<?php isset($_SESSION['error']) ? $error = $_SESSION['error'] : $error = null; ?>
<?php if (empty($user)) { ?>
<?php include 'template/header.php' ?>
<?php include 'template/navbar.php' ?>
<div class="container-fluid">
    <form method="post" action="process/register.php">
        <div class="mb-3">
            <label class="form-label">Email address</label>
            <input type="email" name="email" class="form-control">
            <div class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
            <label class="form-label">Username</label>
            <input type="text" name="username" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Confirm Password</label>
            <input type="password" name="password2" class="form-control">
        </div>
        <?php if ($error) { ?>
            <div>
                <div class="alert alert-danger"><?php echo $error; ?></div>
            </div>
        <?php } ?>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
<?php include 'template/footer.php' ?>
<?php } else {
  header("Location:index.php");
}
?>