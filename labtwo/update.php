<html>
    <head>
        <title>Update Student Details</title>

        <style>
            input[type ="text"] {
                width : 600px;
            }
            
        </style>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
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

<h2 class="text-center mb-4">Update Student Details</h2>

<?php 
include "db_conn.php"; // using database connection file here

if(isset($_GET['id'])) { // check if id parameter is available
    $id = $_GET['id']; // get the id parameter value
    $sql = "SELECT * FROM student WHERE id = $id"; // SQL query to select user data based on id
    $result = mysqli_query($conn, $sql); // execute the query
    $row = mysqli_fetch_assoc($result); // fetch the result set into an associative array
}
?>

<form action="update.php?id=<?php echo $row['id']; ?>" method="POST" class="container mt-5 p-4 border rounded shadow-sm bg-light">
    <div class="mb-3">
        <label for="studentID" class="form-label">Student ID:</label>
        <input type="text" class="form-control" id="studentID" name="studentID" value="<?php echo $row['studentID']; ?>" required>
    </div>

    <div class="mb-3">
        <label for="name" class="form-label">Name:</label>
        <input type="text" class="form-control" id="name" name="name" value="<?php echo $row['name']; ?>" required>
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Email:</label>
        <input type="email" class="form-control" id="email" name="email" value="<?php echo $row['email']; ?>" required>
    </div>

    <div class="mb-3">
        <label for="address" class="form-label">Address:</label>
        <input type="text" class="form-control" id="address" name="address" value="<?php echo $row['address']; ?>" required>
    </div>

    <div class="mb-3">
        <label for="program" class="form-label">Program:</label>
        <input type="text" class="form-control" id="program" name="program" value="<?php echo $row['program']; ?>" required>
    </div>

    <fieldset class="mb-4">
        <legend class="h5">Gender:</legend>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" id="male" name="gender" value="MALE" <?php echo ($row['gender'] == 'MALE') ? 'checked' : ''; ?> required>
            <label class="form-check-label" for="male">MALE</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" id="female" name="gender" value="FEMALE" <?php echo ($row['gender'] == 'FEMALE') ? 'checked' : ''; ?> required>
            <label class="form-check-label" for="female">FEMALE</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" id="other" name="gender" value="OTHER" <?php echo ($row['gender'] == 'OTHER') ? 'checked' : ''; ?> required>
            <label class="form-check-label" for="other">OTHER</label>
        </div>
    </fieldset>

    <button type="submit" class="btn btn-success w-100">UPDATE</button>
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

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    </body>
</html>
