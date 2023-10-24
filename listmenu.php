<?php

include 'db.php';

$selectedCategory = isset($_GET['category_id']) ? $_GET['category_id'] : 1;

$kategoriQuery = "SELECT * FROM MenuCategories";
$resultKategori = mysqli_query($db, $kategoriQuery);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Food Order - Pengejar Deadline</title>
  <link rel="stylesheet" href="aos-by-red.css">
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <style>
    .description {
      margin-bottom: 20px;
    }

    .price-button-container {
      display: flex;
      justify-content: space-between;
    }

    .card {
      height: 100%;
    }

    .card-body {
      display: flex;
      flex-direction: column;
    }

    .card-text {
      flex: 1;
    }

    /* Menambahkan kelas text-justify untuk meratakan teks */
    .text-justify {
      text-align: justify;
    }

    /* Menggunakan Flexbox untuk mengatur tata letak ke tengah */
    .center-cards {
      display: flex;
      justify-content: center;
    }

    

.myButton {
	box-shadow:inset -2px -3px 0px 0px #fbafe3;
	font-family:Georgia, 'Times New Roman', Times, serif;
	background:linear-gradient(to bottom, #FC6C85 5%, #ffc0cb 100%);
	background-color:#ff5bb0;
	background-color:#ff5bb0;
	border-radius:14px;
	border:1px solid #ee1eb5;
	display:inline-block;
	cursor:pointer;
	color:#ffffff;
	font-family:Georgia;
	font-size:15px;
	font-weight:bold;
	padding:6px 24px;
	text-decoration:none;
	text-shadow:0px 1px 0px #c70067;
}
.myButton:hover {
	background:linear-gradient(to bottom, #ef027d 5%, #ff5bb0 100%);
	background-color:#ef027d;
}
.myButton:active {
	position:relative;
	top:1px;
}

#textfood {
font-family: "Times New Roman", Times, serif;
font-size: 18px;
letter-spacing: 0.2px;
word-spacing: -1.6px;
color: #000000;
font-weight: 150;
text-decoration: none;
font-style: normal;
font-variant: normal;
text-transform: none;
}

#demofont {
font-family: Georgia, serif;
font-size: 20px;
letter-spacing: 2px;
word-spacing: 2px;
color: #000000;
font-weight: 700;
text-decoration: none;
font-style: normal;
font-variant: normal;
text-transform: none;
}

  </style>
</head>
<body>
<div class="container mt-5">
  <div class="row">
    <?php
    $kategoriQuery = "SELECT * FROM MenuCategories";
    $resultKategori = mysqli_query($db, $kategoriQuery);
    
    $menuQuery = "SELECT * FROM MenuItems WHERE Category_ID = $selectedCategory";
    $resultMenu = mysqli_query($db, $menuQuery);
    
    while ($menu = mysqli_fetch_assoc($resultMenu)) {
        $menuName = $menu['Name'];
        $menuDescription = $menu['Description'];
        $menuPrice = $menu['Price'];
        $menuImage = $menu['ImageURL'];
    ?>
    <div class="col-md-4 mb-5">
      <div class="card" style="width: 22rem;">
      
        <div class="card-body">
        <div class="div" data-aos="fade-left" data-aos-duration="1000" data-aos-once="true">
  <img src="images/<?php echo $menuImage; ?>" class="card-img-top" alt="Menu Image" style="height: 200px;">
  <h5 class="card-title" id="demofont"><?php echo $menuName; ?></h5>
  <p class="card-text description text-justify" id="textfood"><?php echo $menuDescription; ?></p>
  <div class="price-button-container">
    <p class="card-text price" id="demofont">Price: Rp <?php echo number_format($menuPrice); ?></p>
  </div>
    </div>
</div>

<form method="post" action="add_to_cart.php">
  <input type="hidden" name="menu_id" value="<?php echo $menu['Item_ID']; ?>">
  <!-- Form tambahan untuk mengatur jumlah item -->
  <div class="row g-2">
    <div class="col-3">
      <input type="number" value="1" name="quantity" class="form-control"/>
    </div>
    <div class="col-9">
      <button type="submit" class="myButton" name="add_to_cart">Tambahkan Pesanan</button>
    </div>
  </div>
</form>
      </div>
    </div>
    <?php
    }
    ?>
  </div>
</div>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      AOS.init({
        duration: 5000,
        once: true,
      });
    </script>
</body>
</html>