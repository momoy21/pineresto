<?php
session_start();

if (!isset($_SESSION['username']) ||
    !isset($_SESSION['user_id'])) {
    echo "You don't have access to this page";
} else {
    if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
        header('Location: login.php');
        exit;
    }
}

if (!isset($_SESSION['user_id']))  {
    ?>
    <a href="login.php">Login</a>
    <?php
} else {
    ?>
    <a href="logout.php">Logout</a>
    <?php
}
?>
