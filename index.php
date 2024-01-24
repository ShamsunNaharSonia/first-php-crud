<?php include("connection.php");
include("navbar.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        .insert-form{
            background-color:azure;
        }
        /* margin for doing button down from form */
        #back-btn{
             margin: 5px;0; 
        }
       
        </style>
</head>
<body>
    <section style="padding: 80px;">
       <div class="container-fluid">
        <div class="container">

            <form class="insert-form"  method="POST" action="#" enctype="multipart/form-data">
               <div class="form" >
                    <div class="form-group col-lg-4">

                        <div class="input_field">
                            <label for="">Photo</label><br>
                            <input type="file" name="fileToUpload" style="width:100%;"><br><br>
                        </div>
                

                        <label for="">Student Name</label>
                        <input type="text"  id="name" class="form-control" name="sname" autocomplete="off" required><br>
                   
                       
                   
                        <label for="">City</label>
                        <select name="city" id="city" class="form-control" required>
                            <option value="">Select City</option>
                            <option value="DHAKA"> Dhaka</option>
                            <option value="RANGPUR">Rangpur</option>
                            <option value="CHANDPUR">Chandpur</option>
                        </select><br>
                    
                   
                        <label for="">Age</label>
                        <input type="number" id="ageNumber" class="form-control" name="sage"  required><br>

                        <label for="">GPA</label>
                        <input type="double" id="gpa" class="form-control" name="sgpa" autocomplete="off" required>&nbsp;&nbsp;<br>
                        
                         <p> Gender</p>
                          <input type="radio" id="male" value="MALE" name="gender">
                          <label for="male">Male</label>
                          <input type="radio" id="female" value="FEMALE" name="gender">
                          <label for="female">Female</label>
                          <input type="radio" id="others" value="OTHERS" name="gender">
                          <label for="others">Others</label><br>
                        &nbsp;&nbsp;&nbsp; 
                        

                    <div class="form-group col-lg-4" >
                        <input type="submit" style="margin-left:300px" name="submit" id="submit" class="btn btn-success btn-lg">
                    </div>
               </div>
            </form>
            
        </div>
       </div>
       <div>
    <!-- <button class="btn btn-secondary" onclick="history.go(-1);">Back </button> -->
    <button type="button" class="btn btn-secondary" id="back-btn" onclick="history.back();">Back</button>               
    </div> 
    </section>
    
     
   <!-- <script src="connection.php"></script> -->
   <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> -->
</body>
</html>

<?php

if(isset($_POST['submit']))
{
    $filename= $_FILES["fileToUpload"]["name"];
    $tempname= $_FILES["fileToUpload"]["tmp_name"];
    $folder="s-images/".$filename;
    //echo $folder;
    move_uploaded_file($tempname,$folder);
    //echo "<img src='$folder' height='100px' width='100px'>";
   
    $studentName =$_POST['sname'];
    $studentCity = $_POST['city'];
    $studentAge =$_POST['sage'];
    $studentGpa = $_POST['sgpa'];
    $studentGender = $_POST['gender'];




   $query= "INSERT INTO student_details (`student_image`,`name`, `city`, `age`, `gpa`, `gender`) values('$folder','$studentName',' $studentCity','$studentAge','$studentGpa','$studentGender')";
   $query_pass= mysqli_query($con,  $query);
   if( $query_pass){
    echo "<script>alert('DATA INSERT SUCCESSFULLY')</script>";
    //header("location:index.php");
    ?>
<meta http-equiv = "refresh" content = "0; url =http://localhost/php-crud/display_data.php" />

    <?php
   
   }
   else{
    echo "<script>alert('DATA INSERTION FAILED')</script>";
   }
}

?>
<!-- image upload -->
<?php



?>
