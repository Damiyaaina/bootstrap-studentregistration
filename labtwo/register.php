<html>
    <head>
        <title>Register</title>

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

            .register-container {
               background: rgba(255, 255, 255, 0.1); /* Semi-transparent white background */
               padding: 2rem;
               border-radius: 15px;
               backdrop-filter: blur(10px);
               max-width: 400px;
               width: 100%;
               text-align: center;
               color: white;
            }

            .register-container h2{
               font-size: 50px;
               font-weight: bold;
               margin-bottom: 1rem;
               color: rgb(244, 233, 225);
            }

            .register-container input[type="text"],
            .register-container input[type="password"] {
               width: 100%;
               padding: 1rem;
               margin: 0.5rem 0;
               border: none;
               border-radius: 8px;
               outline: none;
               background: rgba(255, 255, 255, 0.2);
               color: white;
            }

            .register-container input::placeholder {
               color: rgba(255, 255, 255, 0.7);
            }

            .register-container button {
               width: 100%;
               padding: 1rem;
               background-color: rgb(76, 175, 80);
               border: none;
               border-radius: 8px;
               font-size: 20px;
               color: white;
               cursor: pointer;
            }

            .register-container button:hover {
               background-color: rgb(69, 160, 73);
            }

            .register-container a {
               color: #ffffff;
               text-decoration: none;
               margin-top: 1rem;
               display: inline-block;
            }

            .register-container a:hover {
               text-decoration: underline;
            }
        </style>
    </head>

    <body>
        <div class="register-container">
        <h2> Register!</h2>
        <form action="register.php" method="POST">
            <label for="username">Username:</label><br>
            <input type="text" id="username" name="username"><br>
            <label for="password">Password:</label><br>
            <input type="password" id="password" name="password"><br>
            <button type="submit">Register</button>
        </form>

        <a href="login.php">Already have an account? Login Here</a>
        </div>
    </body>
</html>

<?php
include "db_conn.php"; //using database connection file here

if ($_SERVER["REQUEST_METHOD"] == "POST"){  //check if form is submitted
    $username = mysqli_real_escape_string($conn,$_POST['username']);
    $password = password_hash( $_POST['password'], PASSWORD_BCRYPT);

    $sql = "INSERT INTO user_reg (username, password) VALUES ('$username', '$password')";

    if (mysqli_query($conn,$sql)){
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

?>