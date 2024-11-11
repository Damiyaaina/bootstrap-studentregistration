<html>

<head>
    <title>Student Registration Form</title>

    <style>
        /* General Styling */
        body {
            background-color: rgb(164 119 99);
            font-family: 'Times New Roman', Times, serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: 0;
            padding: 0;
        }

        h2 {
            background-color: rgb(210 151 123);
            color: white;
            font-size: 30px;
            font-family: 'Times New Roman', Times, serif;
            text-align: center;
            padding: 15px;
            width: 100%;
            margin: 0;
        }

        form {
            font-size: 18px;
            background-color: rgb(203 148 142);
            padding: 25px 30px;
            border-radius: 10px;
            box-shadow: 0px 6px 12px rgba(0, 0, 0, 0.15);
            width: 60%;
            max-width: 700px;
            margin-top: 20px;
        }

        label {
            display: inline-block;
            width: 120px;
            margin-bottom: 10px;
            font-weight: bold;
            color: black;
        }

        input[type="text"],
        .studID,
        .name,
        .email,
        .address,
        .program {
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
            border: 1px solid;
            width: calc(100% - 130px);
        }

        input[type="text"]:focus {
            border-color: rgb(74 111 165);
            outline: none;
            box-shadow: 0px 0px 5px rgba(74, 111, 165, 0.3);
        }

        input[type="radio"] {
            margin-left: 5px;
            margin-right: 5px;
        }

        /* Submit Button */
        button {
            padding: 10px 25px;
            font-size: 18px;
            background-color: rgb(74 111 165);
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
            display: block;
            margin-left: auto;
            margin-right: auto;
        }

        button:hover {
            background-color: rgb(58 92 133);
            transform: scale(1.05);
        }

        /* Back Link */
        a {
            display: inline-block;
            margin-top: 15px;
            text-decoration: none;
            color: #4a6fa5;
            font-weight: bold;
            transition: color 0.3s;
            text-align: center;
        }

        a:hover {
            color: #3a5c85;
        }
    </style>
</head>

<body>
    <h2>Student Registration Form</h2>
    <form action="create.php" method="POST">
        <label> Student ID: </label>
        <input class="studID" type="text" name="studentID" required><br>

        <label> Name: </label>
        <input class="name" type="text" name="name" required><br>

        <label> Email: </label>
        <input class="email" type="text" name="email" required><br>

        <label> Address: </label>
        <input class="address" type="text" name="address" required><br>

        <label> Program: </label>
        <input class="program" type="text" name="program" required><br>

        <label>Gender:</label><br>
        <input type="radio" id="male" name="gender" value="MALE">
        <label for="male">MALE</label><br>

        <input type="radio" id="female" name="gender" value="FEMALE">
        <label for="female">FEMALE</label><br>

        <input type="radio" id="other" name="gender" value="OTHER">
        <label for="other">OTHER</label><br><br>

        <button type="submit">Submit</button>
    </form>

    <a href="form.php">Back to Student registration list</a>
</body>

</html>

<?php 
include "db_conn.php"; // Using database connection file here

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $studentid = $_POST['studentID'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $program = $_POST['program'];
    $gender = $_POST['gender'];

    $sql = "INSERT INTO student (studentID, name, email, address, program, gender) VALUES ('$studentid', '$name' , '$email','$address','$program','$gender')";

    if(mysqli_query($conn, $sql)){
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>
