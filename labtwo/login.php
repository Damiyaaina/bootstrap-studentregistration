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
               background: url('bg login.jpg') no-repeat center center fixed;
               background-size: cover;
            }

            .login-container {
               background: rgba(255, 255, 255, 0.1); /* Semi-transparent white background */
               padding: 2rem;
               border-radius: 15px;
               backdrop-filter: blur(10px);
               max-width: 400px;
               width: 100%;
               text-align: center;
               color: white;
            }

            .login-container h2{
               font-size: 50px;
               font-weight: bold;
               margin-bottom: 1rem;
               color: rgb(244, 233, 225);
            }

            .login-container input[type="text"],
            .login-container input[type="password"] {
               width: 100%;
               padding: 1rem;
               margin: 0.5rem 0;
               border: none;
               border-radius: 8px;
               outline: none;
               background: rgba(255, 255, 255, 0.2);
               color: white;
            }

            .login-container input::placeholder {
               color: rgba(255, 255, 255, 0.7);
            }

            .login-container button {
               width: 100%;
               padding: 1rem;
               background-color: rgb(76, 175, 80);
               border: none;
               border-radius: 8px;
               font-size: 20px;
               color: white;
               cursor: pointer;
            }

            .login-container button:hover {
               background-color: rgb(69, 160, 73);
            }

            .login-container a {
               color: #ffffff;
               text-decoration: none;
               margin-top: 1rem;
               display: inline-block;
            }

            .login-container a:hover {
               text-decoration: underline;
            }

        </style>
    </head>

    <body>
        <div class="login-container"><h2>LOG IN</h2>
        <form action="login.php" method="POST">
            <label for="username">Username:</label><br>
            <input type="text" id="username" name="username"><br>
            <label for="password">Password:</label><br>
            <input type="password" id="password" name="password"><br>
            <button type="submit">Log In</button>
        </form>

        <a href="register.php">Don't have an account? Register Here</a>
        </div>
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