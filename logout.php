<?php
    session_start();

    // Unset semua session variables
    $_SESSION = array();

    // Hancurkan sessionnya
    session_destroy();
    header("Location: login.php");
    exit();
?>
