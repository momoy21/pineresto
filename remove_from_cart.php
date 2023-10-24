<?php
session_start();

if (isset($_POST['remove_from_cart'])) {
  $menu_id = $_POST['menu_id'];

  foreach ($_SESSION['cart'] as $key => $item) {
    if ($item['menu_id'] == $menu_id) {
      unset($_SESSION['cart'][$key]); // Hapus item dari keranjang
      break;
    }
  }

  header("Location: view_cart.php");
}