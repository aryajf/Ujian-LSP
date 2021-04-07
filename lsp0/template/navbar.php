<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">Aplikasi Penjualan <i class="uil uil-shopping-cart"></i></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link" aria-current="page" href="index.php"><i class="uil uil-home"></i> Home</a>
                <?php if ($user) { ?>
                    <a class="nav-link" href="
                        <?php if ($user->role == 1) {
                            echo 'admin.php';
                        } else {
                            echo 'dashboard.php';
                        }
                        ?>"
                    >
                    <i class="uil uil-user"></i> <?php echo $user->nama ?>
                    </a>
                    <a class="nav-link" href="process/signout.php"><i class="uil uil-signout"></i> Signout</a>
                <?php } else { ?>
                    <a class="nav-link" href="login.php"><i class="uil uil-sign-in-alt"></i> Login</a>
                    <a class="nav-link" href="register.php"><i class="uil uil-signin"></i> Register</a>
                <?php } ?>
            </div>
        </div>
    </div>
</nav>