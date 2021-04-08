<nav class="navbar navbar-expand-lg navbar-light">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav ms-auto me-auto">
        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        <?php if ($user) { ?>
          <a class="nav-link" href="
          <?php
          if ($user->role == 1) {
            echo 'admin.php';
          } else {
            echo 'user.php';
          }
          ?>
          "><?php echo $user->nama ?></a>
          <a class="nav-link" href="process/signout.php">Signout</a>
        <?php } else { ?>
          <a class="nav-link" href="login.php">Login</a>
          <a class="nav-link" href="register.php">Register</a>
        <?php } ?>
      </div>
    </div>
  </div>
</nav>