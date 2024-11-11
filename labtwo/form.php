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
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Registration Form</title>

     
    <style>
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
    </style>


</head>

<body>

<nav class="navbar navbar-light" style="background-color: #f4e9e1;">
  <div class="container-fluid">
    <a class="navbar-brand"><i class="bi bi-mortarboard-fill px-2"></i>STUDENT PORTAL</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item ">
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

<img src="UTM-LOGO-FULL.png" class="img-fluid rounded mx-auto d-block my-4 w-25" alt="UTM logo">


<div class="text-center"><h1 class="lead text-center display-4">STUDENT REGISTRATION LIST</h1></div>

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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>
