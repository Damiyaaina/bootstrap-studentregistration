<?php 

include "db_conn.php"; //using database connection filw here

if(isset($_GET['id'])){   //check if id parameter is available

    $id = $_GET['id']; // get the id parameter value

    $sql = "DELETE FROM student WHERE id='$id'"; //SQL query to select user data based on id
    $result = mysqli_query($conn,$sql);// execute the query

    if ($result){
        echo "<script>alert('User Deleted Successfully'); window.location='form.php'</script>";
    } else {
        echo "<script>alert('User Not Deleted'); window.location='form.php'</script>";
    }
}

?>
