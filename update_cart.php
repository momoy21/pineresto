<?php
session_start();

if (isset($_POST['update_cart'])) {
  $menu_id = $_POST['menu_id'];
  $new_quantity = $_POST['new_quantity'];

  foreach ($_SESSION['cart'] as &$item) {
    if ($item['menu_id'] == $menu_id) {
      $item['quantity'] = $new_quantity;
      break;
    }
  }

  // Update session cart
  $_SESSION['cart'] = array_values($_SESSION['cart']); // Reindex the array

  header("Location: view_cart.php");
}
?>