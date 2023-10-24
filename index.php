<?php
session_start();

if (!isset($_SESSION['username'])) {
  include_once 'navbar.php';
} else {
  include_once 'navbar_logout.php';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Food Order - Pengejar Deadline</title>
  <link rel="stylesheet" href="styles.css">
  <link rel="stylesheet" href="aos-by-red.css">
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <style>
    #demofont {
font-family: Georgia, serif;
font-size: 30px;
letter-spacing: 2px;
word-spacing: 2px;
color: white;
font-weight: 700;
text-decoration: none;
font-style: normal;
font-variant: normal;
text-transform: none;
}

#textfood {
font-family: "Times New Roman", Times, serif;
font-size: 20px;
letter-spacing: 0.2px;
word-spacing: -1.6px;
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
  <style>
    .carousel {
      margin-bottom: 30px;
    }

    .card {
      padding: 20px;
    }
  </style>

  <!-- Carousel -->
  <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active" data-bs-interval="5000">
        <img src="images\icecreambanner.png" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item" data-bs-interval="5000">
        <img src="images\burgerbanner.png" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item" data-bs-interval="5000">
        <img src="images\pizzabanner.png" class="d-block w-100" alt="...">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

  <!-- Card-->
  <h2 class="text-center" id="demofont">Recommendation</h2>
  <div class="row row-cols-1 row-cols-md-3 g-4">
  <div class="div" data-aos="fade-left" data-aos-duration="1000" data-aos-once="true">
    <div class="col">
      <div class="card h-100">
        <img src="images\strawberry.png" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title" id="demofont">Strawberry Ice Cream</h5>
          <p class="card-text" id="textfood">Lelehkan diri Anda dalam kelezatan es krim stroberi kami 
              yang segar dan manis. Nikmati rasa buah stroberi yang alami dan lembut dengan 
              setiap gigitan. Diolah dengan hati dan bahan-bahan terbaik, es krim ini adalah 
              kombinasi sempurna antara manisnya stroberi dan kreaminess es krim. </p>
        </div>
        <div class="card-footer">
          <small class="text-muted">Last updated 3 mins ago</small>
        </div>
      </div>
    </div>
  </div>
  <div class="div" data-aos="fade-left" data-aos-duration="1000" data-aos-once="true">
    <div class="col">
      <div class="card h-100">
        <img src="images\burger.jpeg" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title" id="demofont">Chicken Burger</h5>
          <p class="card-text" id="textfood">Nikmati kesempurnaan rasa dengan Chicken Burger kami. Potongan ayam 
              yang renyah, disajikan dalam roti empuk, dengan sentuhan bumbu rahasia yang membuat 
              setiap gigitan istimewa. Tambahkan saus pilihan Anda dan bumbui dengan sayuran segar 
              untuk pengalaman burger yang tak terlupakan.</p>
        </div>
        <div class="card-footer">
          <small class="text-muted">Last updated 30 days ago</small>
        </div>
      </div>
    </div>
  </div>
  <div class="div" data-aos="fade-left" data-aos-duration="1000" data-aos-once="true">
    <div class="col">
      <div class="card h-100">
        <img src="images\milktea.jpg" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title" id="demofont">Strawberry Milk Tea</h5>
          <p class="card-text" id="textfood">Dalam setiap tegukan Strawberry Milk Tea kami, 
              Anda akan menemukan perpaduan manisnya stroberi segar dan kelembutan 
              susu yang lembut. Nikmati kesegaran buah stroberi yang terasa seperti 
              musim panas sepanjang tahun. Rasakan cita rasa yang lezat dan berpadu 
              sempurna antara manisnya stroberi dan gurihnya susu.</p>
        </div>
        <div class="card-footer">
          <small class="text-muted">Last updated 1 year ago</small>
        </div>
      </div>
    </div>
  </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      AOS.init({
        duration: 3000,
        once: true,
      });
    </script>
</body>
</html>
