<?php
    require "../koneksi.php";
    session_start();
    session_destroy();
    header("Location:../index.php");
?>