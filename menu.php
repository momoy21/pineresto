<?php
session_start();

if (!isset($_SESSION['username'])) {
  include_once 'navbar.php';
  echo '<div class="d-flex justify-content-center align-items-center text-center">
        <div class="d-inline-block p-2 mt-4 mb-3 bg-danger text-white" style="border: 1px;">Silahkan LOGIN terlebih dahulu untuk dapat memesan menu</div>
     </div>';
} else {
  include_once 'navbar_logout.php';
}
include_once 'db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Food Order - Pengejar Deadline</title>
  <link rel="stylesheet" href="styles.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link rel="stylesheet" href="aos-by-red.css">
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
  <style>
     h2.mt-4 {
      font-size: 20px; /* Atur ukuran font sesuai kebutuhan Anda */
    }

    
    #button1 {
	box-shadow:inset -2px -3px 0px 0px #fbafe3;
  font-family:Georgia, 'Times New Roman', Times, serif;
	background:linear-gradient(to bottom, #FC6C85 5%, #ffc0cb 100%);
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
#button1:hover {
	background:linear-gradient(to bottom, #ef027d 5%, #ff5bb0 100%);
	background-color:#ef027d;
}
#button1 {
	position:relative;
	top:1px;
}

#demofont {
font-family: Georgia, serif;
font-size: 25px;
letter-spacing: 2px;
word-spacing: 2px;
color: #000000;
font-weight: 700;
text-decoration: none;
font-style: normal;
font-variant: normal;
text-transform: none;
}

#demofonttitle {
font-family: Georgia, serif;
font-size: 50px;
letter-spacing: 2px;
word-spacing: 2px;
color: #000000;
font-weight: 700;
text-decoration: none;
font-style: normal;
font-variant: normal;
text-transform: none;
background-color: #fdbcb4;
padding:10px;
color: white;
}

#textfood {
font-family: "Times New Roman", Times, serif;
font-size: 20px;
letter-spacing: 0.2px;
word-spacing: -2.6px;
color: #000000;
font-weight: 150;
text-decoration: none;
font-style: normal;
font-variant: normal;
text-transform: none;
}
  </style>
</head>
<body>


  <div class="container mt-3">
    <div class="text-center">
      <div class="card-header mb-2" id="demofonttitle">
        Choose Category
      </div>
      <div class="row row-cols-1 row-cols-3 g-4 mb-5">
      <div class="div" data-aos="fade-left" data-aos-duration="1000" data-aos-once="true">
        <div class="col">
          <div class="card">
            <img src="images\beefburger.jpg" class="card-img-top" alt="burger" style="height: 200px;">
            <div class="card-body">
              <h5 class="card-title" id="demofont">Heavy Meal</h5>
              <p class="card-text" id="textfood">Makanan berat ini sering kali kaya rasa dan memberikan rasa kenyang yang memuaskan.</p>
              <button class="btn btn-primary pilih-button" id="button1" data-category-id="1">Pilih Kategori</button>
            </div>
          </div>
        </div>
      </div>
      <div class="div" data-aos="fade-left" data-aos-duration="1000" data-aos-once="true">
        <div class="col">
          <div class="card">
            <img src="images\strawberryice.jpeg" class="card-img-top" alt="ice" style="height: 200px;">
            <div class="card-body">
              <h5 class="card-title" id="demofont">Dessert</h5>
              <p class="card-text" id="textfood">Dessert adalah cara yang sempurna untuk menyudahi makanan dengan manis.</p>
              <button class="btn btn-primary pilih-button" id="button1" data-category-id="2">Pilih Kategori</button>
            </div>
          </div>
        </div>
      </div>
      <div class="div" data-aos="fade-left" data-aos-duration="1000" data-aos-once="true">
        <div class="col">
          <div class="card">
            <img src="images\strawberrymilktea.jpeg" class="card-img-top" alt="strawberry" style="height: 200px">
            <div class="card-body">
              <h5 class="card-title" id="demofont">Drink</h5>
              <p class ="card-text" id="textfood">Minuman ini bisa memberikan kesegaran saat Anda haus atau ingin menikmati minuman yang nikmat.</p>
              <button class="btn btn-primary pilih-button" id="button1" data-category-id="3">Pilih Kategori</button>
            </div>
          </div>
        </div>
      </div>
      </div>
      
      <h2 class="mt-4" id="demofonttitle">Choose Menu</h2>
      <div id="menu-items-container" class="row">
        <?php include_once 'listmenu.php'; ?>
      </div>
    </div>
  </div>
  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      AOS.init({
        duration: 3000,
        once: true,
      });
    </script>

</body>

<script>
$(document).ready(function () {
  $(".pilih-button").click(function () {
    var selectedCategory = $(this).data("category-id");

    $.ajax({
      url: "listmenu.php",
      method: "GET",
      data: { category_id: selectedCategory },
      success: function (data) {
        $("#menu-items-container").html(data);
      }
    });
  });
});
</script>

</html>
