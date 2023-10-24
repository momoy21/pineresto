<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Food Order - Pengejar Deadline</title>
  <link rel="stylesheet" href="../styles.css">
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
  </style>
</head>
<body>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light" style="background-color:#fdbcb4; font-size:20px; font-family:Georgia, serif;">
  <div class="container-fluid">
    <a class="navbar-brand" href="home.php">
      <img src="../images/logo_websitefood.png" alt="Website Logo" width="60">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" style="color: white; weight:200px;" aria-current="page" href="#">ADMIN</a>
        </li>
      </ul>
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" style="color: white; weight:200px;" href="../logout.php">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

  <div>
    <h1 class="text-center mt-3 mb-2" id="demofont">
      ADMIN PANEL
    </h1>
  </div>
  <?php 
    include 'list_data.php';
  ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
