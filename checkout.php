<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Checkout - Food Order</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="styles.css">
</head>
<body>

<?php
session_start();
include 'db.php';
include_once 'navbar_logout.php';

if (isset($_POST['checkout'])) {
  // Mendapatkan data pengguna saat ini (contoh: Anda mungkin sudah memiliki informasi pengguna yang masuk)
  //$user_id = $_SESSION['user_id']; // Gantilah ini dengan cara Anda mengidentifikasi pengguna yang masuk

  // Mendapatkan informasi pesanan dari keranjang
  $cartItems = $_SESSION['cart'];

  // Memasukkan informasi pesanan ke dalam tabel 'orders'
  foreach ($cartItems as $item) {
    $menu_id = $item['menu_id'];
    $quantity = $item['quantity'];
    $order_date = date('Y-m-d H:i:s'); // Menggunakan timestamp saat ini sebagai order_date

    // Menyimpan pesanan ke dalam database dengan prepared statement
    $insertOrderQuery = "INSERT INTO orders (user_id, item_id, quantity, order_date) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($db, $insertOrderQuery);
    mysqli_stmt_bind_param($stmt, "iiis", $user_id, $menu_id, $quantity, $order_date);
    mysqli_stmt_execute($stmt);
  }

  // Mengosongkan keranjang setelah pesanan selesai
  unset($_SESSION['cart']);

  echo "Pesanan Anda telah berhasil ditempatkan. Terima kasih!";
}
?>
  <h1 class="ms-3">Checkout!</h1>
  <!-- Tambahkan tombol "Kembali" -->
  <a href="menu.php" class="btn btn-primary ms-3">Kembali ke Menu</a>
</body>
</html>
