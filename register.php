<?php
session_start();
require_once('db.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Data from Form
    $first_name = ($_POST['first_name']);
    $last_name = ($_POST['last_name']);
    $username = ($_POST['username']);
    $password = $_POST['password'];
    $birthdate = $_POST['birthdate'];
    $gender = $_POST['gender'];

    // Validate gender
    if ($gender !== 'male' && $gender !== 'female') {
        echo 'Invalid gender selection.';
        exit; 
    }

    // Encrypt the Password
    $en_pass = password_hash($password, PASSWORD_BCRYPT);

    // SQL Query with prepared statement
    $sql = "INSERT INTO users (Username, Password, First_Name, Last_Name, Birthdate, Gender) VALUES (?, ?, ?, ?, ?, ?)";

    // Execute Query
    $stmt = $db->prepare($sql);
    $stmt->bind_param('ssssss', $username, $en_pass, $first_name, $last_name, $birthdate, $gender);
    
    if ($stmt->execute()) {
        header('location: login.php');
    } else {
        echo 'Error: ' . $stmt->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <title>Register Page</title>
</head>
<body>
<?php
include_once 'navbar.php';
?>

    <!-- Main Container -->
    <form action="register.php" method="post">
        <div class="container d-flex justify-content-center align-items-center min-vh-100">
            <div class="row border rounder-5 p-4 bg-white shadow box-area mt-5 mb-5">
                <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box" style="background: #103cbe;">
                    <div class="featured-image mb-2">
                        <img src="images/user1.png" class="img-fluid" style="width: 250px;">
                    </div>
                    <p class="text-white fs-3 text-center" style="font-family: 'Poppins', sans-serif; font-weight: 450;">Welcome to Register Page</p>
                </div>

                <!-- Right Box -->
                <div class="col-md-6 right-box">
                    <div class="row mx-auto p-2" style="width: 400px;">
                        <div class="header-text mb-4 text-center">
                            <p>Sudah memiliki akun? <a href="login.php">Login</a></p>
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control form-control-lg bg-light fs-6" name="first_name" id="first_name" placeholder="Your first name">
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control form-control-lg bg-light fs-6" name="last_name" id="last_name" placeholder="Your last name">
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control form-control-lg bg-light fs-6" name="username" id="username" placeholder="Username">
                        </div>
                        <div class="input-group mb-1">
                            <input type="password" class="form-control form-control-lg bg-light fs-6" name="password" id="password" placeholder="Password">
                        </div>
                        <div class="input-group mb-3 pt-3">
                            <input type="date" class="form-control" id="birthdate" name="birthdate" required>
                        </div>
                        <div class="input-group mb-3 d-flex align-items-center">
                            <label for="gender" class="form-label pe-3 mb-0" style="width: 100px;">Gender</label>
                            <select class="form-select" id="gender" name="gender" required>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>
                        <div class="input-group mb-3 pt-5">
                            <button type="submit" class="btn btn-lg btn-primary w-100 fs-5">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <!-- Input Validation -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const form = document.querySelector('form');

            form.addEventListener('submit', function (event) {
                // Validate First Name
                const firstNameInput = document.getElementById('first_name');
                if (firstNameInput.value.trim() === '') {
                    alert('First Name is required');
                    event.preventDefault(); 
                }

                // Validate Last Name
                const lastNameInput = document.getElementById('last_name');
                if (lastNameInput.value.trim() === '') {
                    alert('Last Name is required');
                    event.preventDefault(); 
                }

                // Validate Username
                const usernameInput = document.getElementById('username');
                if (usernameInput.value.trim() === '') {
                    alert('Username is required');
                    event.preventDefault(); 
                }

                // Validate Password
                const passwordInput = document.getElementById('password');
                if (passwordInput.value.trim() === '') {
                    alert('Password is required');
                    event.preventDefault(); 
                }
            });
        });
    </script>
</body>
</html>