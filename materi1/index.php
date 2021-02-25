<?php session_start();
if (isset($_SESSION['username'])) {
    require 'koneksi.php';
    $user = $conn->prepare("SELECT * FROM user JOIN role where user.role=role.id AND username = '$_SESSION[username]'");
    $user->execute();
    $user = $user->fetch(PDO::FETCH_OBJ);
    // echo $user->value;
} else {
    $user = null;
} ?>
<?php include 'template/navbar.php' ?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link active" aria-current="page" href="index.php">Home</a>

                <?php if (empty($user)) { ?>
                    <a class="nav-link" href="login.php">Login</a>
                    <a class="nav-link" href="register.php">Register</a>
                <?php } else { ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?php echo $user->username ?>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="<?php if($user->value === "Admin"){echo 'admin/index.php';}else{echo 'member/index.php';}?>">Dashboard</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="signout.php">Sign Out</a></li>
                        </ul>
                    </li>
                <?php } ?>
            </div>
        </div>
    </div>
</nav>
<h1>Home</h1>
<?php include 'template/footer.php' ?>