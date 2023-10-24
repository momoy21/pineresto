<?php
include 'db.php';
?>
<?php
$selectedCategory = isset($_GET['category_id']) ? $_GET['category_id'] : 1;
$kategoriQuery = "SELECT * FROM MenuCategories";
$resultKategori = mysqli_query($db, $kategoriQuery);

$menuQuery = "SELECT * FROM MenuItems WHERE Category_ID = $selectedCategory";
$resultMenu = mysqli_query($db, $menuQuery);
?>

<?php
while ($kategori = mysqli_fetch_assoc($resultKategori)) {
  $categoryID = $kategori['Category_ID'];
  $categoryName = $kategori['Name'];
  $activeClass = ($categoryID == $selectedCategory) ? 'active' : '';
?>
  <a href="menu.php?category_id=<?php echo $categoryID; ?>" class="btn btn-primary <?php echo $activeClass; ?>"><?php echo $categoryName; ?></a>
<?php
}
?>