<html>
    <head>
        <title>Update Student Details</title>

        <style>
            input[type ="text"] {
                width : 600px;
            }
            
        </style>
    </head>

    <body>
        <h2>Update Student Details</h2>

        <?php 
        include "db_conn.php"; // using database connection file here

        if(isset($_GET['id'])) { // check if id parameter is available
            $id = $_GET['id']; // get the id parameter value
            $sql = "SELECT * FROM student WHERE id = $id"; // SQL query to select user data based on id
            $result = mysqli_query($conn, $sql); // execute the query
            $row = mysqli_fetch_assoc($result); // fetch the result set into an associative array
        }
        ?>
        
        <form action="update.php?id=<?php echo $row['id']; ?>" method="POST">
            <label> Student ID: </label>
            <input type="text" name="studentID" value="<?php echo $row['studentID']; ?>" required><br>

            <label> Name: </label>
            <input type="text" name="name" value="<?php echo $row['name']; ?>" required><br>

            <label> Email: </label>
            <input type="text" name="email" value="<?php echo $row['email']; ?>" required><br>

            <label> Address: </label>
            <input type="text" name="address" value="<?php echo $row['address']; ?>" required><br>

            <label> Program: </label>
            <input type="text" name="program" value="<?php echo $row['program']; ?>" required><br>

            <label>Gender:</label><br>
            <input type="radio" id="male" name="gender" value="MALE" <?php echo ($row['gender'] == 'MALE') ? 'checked' : ''; ?> required>
            <label for="male">MALE</label><br>

            <input type="radio" id="female" name="gender" value="FEMALE" <?php echo ($row['gender'] == 'FEMALE') ? 'checked' : ''; ?> required>
            <label for="female">FEMALE</label><br>

            <input type="radio" id="other" name="gender" value="OTHER" <?php echo ($row['gender'] == 'OTHER') ? 'checked' : ''; ?> required>
            <label for="other">OTHER</label><br>

            <button type="submit">UPDATE</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $studentid = $_POST['studentID'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $address = $_POST['address'];
            $program = $_POST['program'];
            $gender = $_POST['gender'];

            $sql = "UPDATE student SET studentID = '$studentid', name = '$name', email = '$email', 
                    address = '$address', program = '$program', gender = '$gender' WHERE id = $id";

            if (mysqli_query($conn, $sql)) {
                echo "Record updated successfully";
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        }
        ?>
   
        <br>
        <a href="form.php">Back to student registration list</a>
    </body>
</html>
