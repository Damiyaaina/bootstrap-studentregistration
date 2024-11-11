<html>
    <head>
        <title>LOG IN</title>


        <style>
            body {
               font-family: 'Times New Roman', Times, serif;
               display: flex;
               align-items: center;
               justify-content: center;
               min-height: 100vh;
               background: url('bg log in.jpg') no-repeat center center fixed;
               background-size: cover;
            }
        </style>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    </head>

    <body class="d-flex justify-content-center align-items-center vh-100 bg-light">

<div class="login-container">
    <div class="card shadow">
        <div class="card-body" style="background-color: #dfb6b2">
        <i class="bi bi-person-circle" style="font-size: 50px; color: #333;"></i>


            <h2 class="card-title text-center">LOG IN</h2>
            <form action="login.php" method="POST">
                <div class="mb-3">
                    <label for="username" class="form-label">Username:</label>
                    <input type="text" id="username" name="username" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password:</label>
                    <input type="password" id="password" name="password" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Log In</button>
            </form>
            <div class="text-center mt-3">
                <a href="register.php">Don't have an account? Register Here</a>
            </div>
        </div>
    </div>
</div>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        
    </body>
</html>

<?php
session_start();
include "db_conn.php";

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = mysqli_real_escape_string($conn,$_POST['username']);
    $password = $_POST['password'];

    $sql = " SELECT * FROM user_reg WHERE username = '$username'";
    $result = mysqli_query($conn,$sql);

    if (mysqli_num_rows($result) == 1) {
        while ($row = mysqli_fetch_assoc($result)){
            if(password_verify($password, $row['password'])){
                $_SESSION['username'] = $username;
                header("Location: form.php");
            } else {
                echo "Invalid username or password";
            }
        }
    } else {
        echo "No user found with that password";
    }
}