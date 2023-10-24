<?php
session_start();

require_once('db.php');

// Initialize variables
$username = $password = "";
$login_error = "";

// Check if the form is submitted
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validate username and password
    if (empty($username) || empty($password)) {
        $login_error = "Username dan password harus diisi.";
    } else {
        // Check if the username exists in the database
        $sql = "SELECT user_id, username, password FROM users WHERE username = ?";
        $stmt = mysqli_stmt_init($db);

        if (mysqli_stmt_prepare($stmt, $sql)) {
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);

            // Get the result
            mysqli_stmt_store_result($stmt);

            if (mysqli_stmt_num_rows($stmt) > 0) {
                // Username exists, check the password
                mysqli_stmt_bind_result($stmt, $db_user_id, $db_username, $db_password);
                mysqli_stmt_fetch($stmt);

                if (password_verify($password, $db_password)) {
                    $_SESSION['user_id'] = $db_user_id;
                    $_SESSION['username'] = $db_username;
                    header("Location: index.php");
                    exit();
                } else {
                    echo "Password salah. Silakan coba lagi.";
                }
            } else {
                echo "Username tidak ditemukan. Silakan daftar atau gunakan username lain.";
            }

            mysqli_stmt_close($stmt);
        }
    }
}
?>
