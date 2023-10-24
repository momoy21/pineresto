<?php
    session_start();


// Check if the user is not logged in
if (!isset($_SESSION['username']) || !isset($_SESSION['admin_id'])) {
    header('Location: ../login_admin.php'); // Redirect to the login page
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

// Check if the form is submitted to add a new menu
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $category = $_POST['category'];

    // Handle the uploaded image
    $image = $_FILES['image'];
    $image_name = $image['name'];
    $image_tmp = $image['tmp_name'];
    $image_path = "../images/" . $image_name;

    if (move_uploaded_file($image_tmp, $image_path)) {
        // Insert the menu data into the database
        $sql = "INSERT INTO menuitems (Name, Description, Price, Category_ID, ImageURL) VALUES (?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($koneksi, $sql);
        mysqli_stmt_bind_param($stmt, "ssdss", $name, $description, $price, $category, $image_path);

        if (mysqli_stmt_execute($stmt)) {
            // Data berhasil ditambahkan
            header("Location: index.php"); // Redirect to the admin page
            exit();
        } else {
            echo "Gagal menambahkan data ke database.";
        }
        mysqli_stmt_close($stmt);
    } else {
        echo "Gagal mengunggah gambar.";
    }
}

// Get the list of menu items
$sql2 = "SELECT * FROM menuitems ORDER BY Item_ID ASC";
$q2 = mysqli_query($koneksi, $sql2);
$urut = 1;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles.css">
    <style>
        .mx-auto {
            width: 800px;
        }
        .card {
            margin-top: 10px;
        }

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
    <div class="mx-auto">
        <div class="card">
    <div class="card-header text-white bg-secondary">
        Tambah Menu Makanan
    </div>
    <div class="card-body">
        <form action="index.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Nama Menu</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <br>

            <div class="form-group">
                <label for="description">Deskripsi</label>
                <textarea name="description" id="description" class="form-control" rows="4" required></textarea>
            </div>
            <br>

            <div class="form-group">
                <label for="price">Harga (IDR)</label>
                <input type="number" name="price" id="price" class="form-control" required>
            </div>
            <br>

            <div class="form-group">
                <label for="category">Kategori</label>
                <select name="category" id="category" class="form-control" required>
                    <?php
                    $sql_categories = "SELECT * FROM menucategories";
                    $result_categories = mysqli_query($koneksi, $sql_categories);

                    while ($row = mysqli_fetch_array($result_categories)) {
                        echo '<option value="' . $row['Category_ID'] . '">' . $row['Name'] . '</option>';
                    }
                    ?>
                </select>
            </div>
            <br>

            <div class="form-group">
                <label for="image">Gambar Menu</label>
                <input class="form-control" type="file" name="image" id="image" class="form-control" accept="image/*" required>
            </div>
            <br>

            <button type="submit" class="btn btn-primary">Tambahkan Menu</button>
        </form>
    </div>
</div>


    <!-- List of menu items -->
    <div class="card mt-5">
        <div class="card-header text-white bg-secondary">
            Daftar Menu Makanan
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Nomor</th>
                        <th scope="col">Nama Menu</th>
                        <th scope="col">Deskripsi</th>
                        <th scope="col">Harga (IDR)</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Gambar</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($r2 = mysqli_fetch_array($q2)) {
                        $name = $r2['Name'];
                        $description = $r2['Description'];
                        $price = $r2['Price'];
                        $category = $r2['Category_ID'];
                        $image = $r2['ImageURL'];
                        $item_id = $r2['Item_ID'];
                    ?>
                        <tr>
                            <th scope="row"><?php echo $urut++; ?></th>
                            <td><?php echo $name; ?></td>
                            <td><?php echo $description; ?></td>
                            <td><?php echo number_format($price, 0, ",", "."); ?></td>
                            <td><?php echo "Kategori " . $category; ?></td>
                            <td><img src="<?php echo $image; ?>" alt="<?php echo $name; ?>" width="100"></td>
                            <td> 
                                <a href="edit_menu.php?item_id=<?php echo $item_id; ?>" class="mb-2 btn btn-warning">Edit</a>
                                <a href="delete_menu.php?item_id=<?php echo $item_id; ?>" onclick="return confirm('Yakin mau delete menu ini?')" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
        </div>
    </div>
</body>
</html>
