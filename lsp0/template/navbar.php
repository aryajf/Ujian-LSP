<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ms-auto me-auto">
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