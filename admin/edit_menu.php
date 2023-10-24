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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $item_id = $_POST['item_id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $category = $_POST['category'];

    // Handle the uploaded image
    if (isset($_FILES['image']) && $_FILES['image']['size'] > 0) {
        $image = $_FILES['image'];
        $image_name = $image['name'];
        $image_tmp = $image['tmp_name'];
        $image_path = "../menu/" . $image_name;

        if (move_uploaded_file($image_tmp, $image_path)) {
            // Update the menu data including the image
            $sql = "UPDATE menuitems SET Name = ?, Description = ?, Price = ?, Category_ID = ?, ImageURL = ? WHERE Item_ID = ?";
            $stmt = mysqli_prepare($koneksi, $sql);
            mysqli_stmt_bind_param($stmt, "ssdssi", $name, $description, $price, $category, $image_path, $item_id);

            if (mysqli_stmt_execute($stmt)) {
                header("Location: index.php");
                exit();
            } else {
                echo "Gagal mengupdate data ke database.";
            }
            mysqli_stmt_close($stmt);
        } else {
            echo "Gagal mengunggah gambar.";
        }
    } else {
        // Update the menu data excluding the image
        $sql = "UPDATE menuitems SET Name = ?, Description = ?, Price = ?, Category_ID = ? WHERE Item_ID = ?";
        $stmt = mysqli_prepare($koneksi, $sql);
        mysqli_stmt_bind_param($stmt, "ssdsi", $name, $description, $price, $category, $item_id);

        if (mysqli_stmt_execute($stmt)) {
            header("Location: index.php");
            exit();
        } else {
            echo "Gagal mengupdate data ke database.";
        }
        mysqli_stmt_close($stmt);
    }
}

// Fetch the menu item data
if (isset($_GET['item_id'])) {
    $item_id = $_GET['item_id'];
    $sql = "SELECT * FROM menuitems WHERE Item_ID = ?";
    $stmt = mysqli_prepare($koneksi, $sql);
    mysqli_stmt_bind_param($stmt, "i", $item_id);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    $menu_item = mysqli_fetch_assoc($result);
} else {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
              .btn-primary {
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
.btn-primary:hover {
	background:linear-gradient(to bottom, #ef027d 5%, #ff5bb0 100%);
	background-color:#ef027d;
}
.btn-primary:active {
	position:relative;
	top:1px;
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
            <a class="nav-link active" aria-current="page" href="#">ADMIN</a>
            </li>
        </ul>
        <ul class="navbar-nav">
            <li class="nav-item">
            <a class="nav-link" href="../logout.php">Logout</a>
            </li>
        </ul>
        </div>
    </div>
    </nav>

<div class="card">
    <div class="card-header text-white bg-secondary mt-5 me-5 ms-5">
        Edit Menu Makanan
    </div>
    <div class="card-body mx-auto">
        <form action="edit_menu.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="item_id" value="<?php echo $menu_item['Item_ID']; ?>">
            
            <div class="form-group">
                <label for="name">Nama Menu</label>
                <input type="text" name="name" id="name" class="form-control"  value="<?php echo $menu_item['Name']; ?>" required>
            </div>
            <br>

            <div class="form-group">
                <label for="description">Deskripsi</label>
                <textarea name="description" id="description" class="form-control" rows="4" required><?php echo $menu_item['Description'];?></textarea>
            </div>
            <br>

            <div class="form-group">
                <label for="price">Harga (IDR)</label>
                <input type="number" name="price" id="price" class="form-control" value="<?php echo $menu_item['Price']; ?>" required>
            </div>
            <br>

            <label for="category">Kategori</label>
            <select name="category" required>
                <?php
                $sql_categories = "SELECT * FROM menucategories";
                $result_categories = mysqli_query($koneksi, $sql_categories);
                
                while ($row = mysqli_fetch_array($result_categories)) {
                    $category_id = $row['Category_ID'];
                    $category_name = $row['Name'];
                    $selected = ($category_id == $menu_item['Category_ID']) ? 'selected' : '';
                    echo '<option value="' . $category_id . '" ' . $selected . '>' . $category_name . '</option>';
                }
                ?>
            </select>
            <br><br>

            <label for="image">Gambar Menu (Biarkan kosong jika tidak ingin mengganti gambar)</label>
            <input class="form-control" type="file" name="image" accept="image/*">
            <br><br>

            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="index.php" class="btn btn-danger">Batal</a>
        </form>
    </div>
</div>

</body>
</html>