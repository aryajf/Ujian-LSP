<?php
    include 'template/session.php';
    if($user->role == 1 && $user){
?>
<?php include 'template/header.php' ?>
<?php include 'template/footer.php' ?>
<?php }else{
    header("Location:index.php");
} ?>