<?php
    require "connection.php";
    $id = $_GET["student_id"];
    $query = "DELETE FROM student_details WHERE student_id = '$id'";
    if (mysqli_query($con, $query)) {
        header("location:Display_data.php");
    } else {
         echo "Something went wrong. Please try again later.";
    }
?> 