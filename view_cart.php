<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Food Order - Pengejar Deadline</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link rel="stylesheet" href="styles.css">
  <style>
    #textfood {
font-family: "Times New Roman", Times, serif;
font-size: 22px;
letter-spacing: 0.2px;
word-spacing: 1px;
color: #000000;
font-weight: 350;
text-decoration: none;
font-style: normal;
font-variant: normal;
text-transform: none;
}

#demofont {
font-family: Georgia, serif;
background-color: #fdbcb4;
color: white;
padding: 5px;
font-size: 45px;
letter-spacing: 2px;
word-spacing: 2px;
font-weight: 700;
text-decoration: none;
font-style: normal;
font-variant: normal;
text-transform: none;
}
  </style>
</head>
<body>

<?php
session_start();

if (!isset($_SESSION['username'])) {
  unset($_SESSION['cart']);
  include_once 'navbar.php';

  header('Location: login.php');
  exit();
} else {
  include_once 'navbar_logout.php';
}
?>
  <div>
    <h1 class="text-center mt-3" id="demofont">Keranjang saat ini</h1>
  </div>
<div class="container mt-5">
  <?php
  if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
  $totalPrice = 0;
  
  // Urutkan array dalam urutan terbalik
  $_SESSION['cart'] = array_reverse($_SESSION['cart']);
  
  foreach ($_SESSION['cart'] as $key => $item) {
      // Tampilkan item dalam keranjang
      ?>
      <div class="card">
        <div class="card-body">
          <h5 class="card-title" id="textfood">Menu Name: <?php echo $item['menu_name']; ?></h5>
          <p class="card-text">Quantity: <?php echo $item['quantity']; ?></p>
          <p class="card-text">Price per item: Rp <?php echo number_format($item['menu_price']); ?></p>

          <?php
          // Harga total per item
          $itemTotalPrice = $item['menu_price'] * $item['quantity'];

// Tambahkan harga total per item ke total keseluruhan
$totalPrice += $itemTotalPrice;
          ?>
          <p class="card-text">Total Price for this item: Rp <?php echo number_format($itemTotalPrice); ?></p>

          

          <!-- Update -->
          <form method='post' action='update_cart.php'>
            <input type='hidden' name='menu_id' value='<?php echo $item['menu_id']; ?>'>
            <input type='number' name='new_quantity' min='1' value='<?php echo $item['quantity']; ?>'>
            <button type='submit' class="btn btn-primary" name='update_cart'>Update</button>
          </form>

          <!-- Delete -->
          <form method='post' action='remove_from_cart.php'>
            <input type='hidden' name='menu_id' value='<?php echo $item['menu_id']; ?>'>
            <button type='submit' class="btn btn-danger" name='remove_from_cart'>Remove</button>
          </form>
        </div>
      </div>
      <br>
      <?php
    }

    // Tampilkan total harga keseluruhan
    ?>
    <div class="alert alert-info">
      Total Price for All Items: Rp <?php echo number_format($totalPrice); ?>
    </div>
    <?php
    // Form untuk menyelesaikan pesanan
    ?>
    <form method='post' action='checkout.php'>
      <button type='submit' class="btn btn-success" name='checkout'>Checkout</button>
    </form>
    <?php
  } else {
    echo "<div class='alert alert-warning'>Your cart is empty.</div>";
  }
  ?>
</div>

</body>
</html>
</body>
</html>
