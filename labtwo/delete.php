<?php 
include "db_conn.php"; //using database connection file here

if (isset($_GET['id'])) { //check if id parameter is available
    $id = $_GET['id']; // get the id parameter value

    if(isset(($_GET['confirm'])) && $_GET['confirm'] == 'yes'){
        $sql = "DELETE FROM student WHERE id = $id";
        $result = mysqli_query($conn, $sql);

        if ($result) {
        echo "<script>alert('Student Information Deleted Successfully'); window.location='form.php'</script>";
        } else {
        echo "<script>alert('Student Information Not Deleted'); window.location='form.php'</script>";
        }

   } else { 
      echo "<script>
       var userConfirmed = confirm('Are you sure you want to delete this student record?');
       if (userConfirmed) {
           window.location.href = 'delete.php?id=$id&confirm=yes';
        } else {
         window.location.href = 'form.php';
        }
    </script>";
   }
}
?>
