<?php
session_start();
if(!isset($_SESSION['username'])){
    header("location: login.php");
    exit();
}

$username = $_SESSION['username'];
?>

<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Registration Form</title>

     
    <!--
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: rgb(102, 79, 99);
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        h1 {
            background-color: purple;
            font-size: 2.5em;
            text-align: center;
            padding: 0.5em;
            color: white;
            width: 100%;
            margin: 0;
            border-radius: 8px;
        }

        h2 {
            color: #fff;
            font-size: 1.2em;
            margin-top: 1em;
        }

        h3 img {
            width: 300px;
            height: 100px;
            vertical-align: middle;
        }

        a {
            text-decoration: none;
            color: #d9534f;
            font-weight: bold;
            margin-left: 10px;
            transition: color 0.3s ease;
        }

        a:hover {
            color: #c9302c;
        }

        table {
            border-collapse: collapse;
            width: 98%;
            margin-top: 1em;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        table th, table td {
            padding: 10px;
            text-align: left;
        }

        table th {
            background-color: rgb(172 127 132);
            color: white;
            font-weight: bold;
            border: 1px solid #ddd;
        }

        table td {
            border: 1px solid #ddd;
            background-color: rgb(184 167 177);
            color: #333;
        }

        table tr:nth-child(even) .sec-row {
            background-color: rgb(184 167 177);
        }

        table tr:hover {
            background-color: #f1f1f1;
        }


        a.edit, a.delete {
            text-decoration: none;
            padding: 5px 10px;
            border-radius: 4px;
            color: white;
            font-weight: bold;
        }

        a.edit {
            background-color: rgb(92 184 92);
        }

        a.edit:hover {
            background-color: rgb(76 174 76);
        }

        a.delete {
            background-color: rgb(217 83 79);
        }

        a.delete:hover {
            background-color: rgb(201 48 44);
        }

        .new-student-link {
            display: inline-block;
            margin-top: 1.5em;
            padding: 10px 20px;
            text-decoration: none;
            background-color: rgb(91 192 222);
            color: white;
            border-radius: 5px;
            font-weight: bold;
        }

        .new-student-link:hover {
            background-color: rgb(49 176 213);
        }
    </style>
-->

</head>

<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">STUDENT PORTAL</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="create.php">Add Student</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="form.php">List Student</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php">Log Out</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<img src="UTM-LOGO-FULL.png" class="rounded mx-auto d-block" alt="UTM Logo" >

<h1>STUDENT REGISTRATION LIST</h1>

<table>
    <tr>
        <th>NO</th>
        <th>Student ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Address</th>
        <th>Program</th>
        <th>Gender</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>

    <?php
    include "db_conn.php";
    $sql = "SELECT * FROM student";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0){
        while ($row = mysqli_fetch_assoc($result)){
            echo "<tr class='sec-row'>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['studentID'] . "</td>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['address'] . "</td>";
            echo "<td>" . $row['program'] . "</td>";
            echo "<td>" . $row['gender'] . "</td>";
            echo "<td><a href='update.php?id=" . $row['id'] . "' class='edit'>Edit</a></td>";
            echo "<td><a href='delete.php?id=" . $row['id'] . "' class='delete'>Delete</a></td>";
            echo "</tr>";
        } 
    } else {
        echo "<tr><td colspan='9'>No Data Found</td></tr>";
    }
    ?>
</table>

<a href="create.php" class="new-student-link">New Student Registration</a>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>
