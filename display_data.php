<!-- <!DOCTYPE html> -->
<link rel="stylesheet" href="style.css">
<!-- <head>
<title>Display-Page</title>

</head> -->




<?php 
require("connection.php");

$sql = "SELECT student_id, name, city, age,gpa,gender FROM student_details";

$data = mysqli_query($con, $sql);
if(mysqli_num_rows($data) > 0)
{
   echo 
  
   '<h2 align="center">DISPLAY STUDENT DETAILS</h2>
   <center><table class="tbl" cellspacing="7" width="" > 
   <tr> 
   <th width="7%"> ID </th>
    <th width="22%"> NAME </th> 
    <th width="20%"> CITY </th>
    <th width="5%"> AGE </th> 
    <th width="5%"> GPA </th>
    <th width="10%"> GENDER </th>
    <th width="25%"> ACTION </th>
    </tr>';
   while($row = mysqli_fetch_assoc($data)){
 
       echo '  <tbody><tr> <td>' . $row["student_id"] . '</td>
       <td>' . $row["name"] . '</td>
       <td> ' . $row["city"] . '</td>
       <td>' . $row["age"] . '</td> 
       <td>' . $row["gpa"] . '</td> 
       <td>' . $row["gender"] . '</td>
       <td>
       <a href=deleteData.php?student_id=' .$row["student_id"].'><input type=submit value=DELETE class=delete></a>
       <a href=updateData.php?student_id=' .$row["student_id"].'><input type=submit value=UPDATE class=update></a>
       </td>
      
        

        
       </tr></tbody>';
    
   }
  
   echo '</table></center>';
   ?>
   <button class="d-back-btn"  onclick="history.go(-1);">Back </button>
   <?php
}
else
{
    echo "0 results";
}



?>
