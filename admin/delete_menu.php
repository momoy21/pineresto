<?php
session_start();

if (!isset($_SESSION['username']) || !isset($_SESSION['admin_id'])) {
    header('Location: ../login_admin.php');
    exit();
}

$host = "localhost";
$user = "root";
$pass = "";
$db = "orderfood";

$koneksi = mysqli_connect($host, $user, $pass, $db);
if (!$koneksi) {
    die("Tidak bisa terkoneksi ke database");
}

if (isset($_GET['item_id'])) {
    $item_id = $_GET['item_id'];
    $sql = "DELETE FROM menuitems WHERE Item_ID = ?";
    $stmt = mysqli_prepare($koneksi, $sql);
    mysqli_stmt_bind_param($stmt, "i", $item_id);

    if (mysqli_stmt_execute($stmt)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Gagal menghapus data dari database.";
    }
    mysqli_stmt_close($stmt);
} else {
    header("Location: index.php");
    exit();
}
?>
