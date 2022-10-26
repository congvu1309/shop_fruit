<?php
    include("../database/connect.php");
    unset($_SESSION['users']);
    session_destroy();
    header("location:../../../index.php");
?>
