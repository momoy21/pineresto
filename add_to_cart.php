<?php
session_start();
include 'db.php';

if (isset($_POST['add_to_cart'])) {
  $menu_id = $_POST['menu_id'];
  $quantity = $_POST['quantity'];

  // Query untuk mengambil detail menu dari database
  $menuQuery = "SELECT * FROM MenuItems WHERE Item_ID = ?";
  $stmt = mysqli_prepare($db, $menuQuery);
  mysqli_stmt_bind_param($stmt, "i", $menu_id);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);
  $menu = mysqli_fetch_assoc($result);

  if ($menu) {
    $cart_item = array(
      'menu_id' => $menu['Item_ID'],
      'menu_name' => $menu['Name'],
      'menu_price' => $menu['Price'],
      'quantity' => $quantity
    );

    if (!isset($_SESSION['cart'])) {
      $_SESSION['cart'] = array();
    }

    // Cek apakah item sudah ada di keranjang, jika ya, update jumlahnya
    $found = false;
    foreach ($_SESSION['cart'] as &$item) {
      if ($item['menu_id'] == $menu_id) {
        $item['quantity'] += $quantity;
        $found = true;
        break;
      }
    }

    if (!$found) {
      $_SESSION['cart'][] = $cart_item;
    }
  }
}


header("Location: view_cart.php"); 
?>
