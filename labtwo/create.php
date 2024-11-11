<html>

<head>
    <title>Student Registration Form</title>

    <style>
      
        .form-container {
            background-color: #f8d7da; 
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.2); 
            max-width: 800px; 
            width: 100%; 
        }
    </style>
    
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<body class="bg-light">

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


<div class="mt-5 container d-flex justify-content-center align-items-center">
    <form action="create.php" method="POST" class="col-md-6 col-lg-12 form-container">
        <h2 class="mb-4 text-center">Student Registration Form</h2>

        <div class="mb-3">
            <label for="studentID" class="form-label">Student ID: </label>
            <input class="form-control" type="text" name="studentID" id="studentID" required>
        </div>
       
        <div class="mb-3">
            <label for="name" class="form-label">Name: </label>
            <input class="form-control" type="text" name="name" id="name" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email: </label>
            <input class="form-control" type="email" name="email" id="email" required>
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">Address: </label>
            <input class="form-control" type="text" name="address" id="address" required>
        </div>

        <div class="mb-3">
            <label for="program" class="form-label">Program: </label>
            <input class="form-control" type="text" name="program" id="program" required>
        </div>

        <fieldset class="mb-3">
            <legend class="form-label">Gender</legend>
            <div class="form-check">
                <input type="radio" id="male" name="gender" value="MALE" class="form-check-input" required>
                <label for="male" class="form-check-label">MALE</label>
            </div>
            <div class="form-check">
                <input type="radio" id="female" name="gender" value="FEMALE" class="form-check-input" required>
                <label for="female" class="form-check-label">FEMALE</label>
            </div>
            <div class="form-check">
                <input type="radio" id="other" name="gender" value="OTHER" class="form-check-input" required>
                <label for="other" class="form-check-label">OTHER</label>
            </div>
        </fieldset>

        <button type="submit" class="btn btn-light w-100">Submit</button>
    </form>
</div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

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
