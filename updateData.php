<?php include("connection.php");
require("navbar.php");
$id= $_GET['student_id'];
$sql = "SELECT * FROM student_details where student_id='$id'";

$data = mysqli_query($con, $sql);
$total=mysqli_num_rows($data);
$reslt=mysqli_fetch_assoc($data);
$reslt['city'] = trim($reslt['city']);
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
    .back-btn {
      
    display:block;
    width:50px;
    height:30px;
    text-align:center;
    background-color:;
    border:1px solid #000000;
    }
    .up-form{
        background-color:azure;
    }
   </style>
    
</head>
<body>
    <section style="padding: 80px;">
       <div class="container-fluid">
        <div class="container">

            <form class="up-form" method="POST" action="#" enctype="multipart/form-data">
               <div class="row" >
                    <div class="form-group col-lg-4">





                   <!-- photo -->
                   <div class="form-group">
							<!-- <h3>Current Photo</h3> -->
							<img src="<?php echo $reslt['student_image']?>" height="120" width="150" />
							<input type="hidden" name="previous" value="<?php echo $reslt['student_image']?>"/>
							<!-- <h3>New Photo</h3> -->
							<input type="file" class="form-control" name="fileToUpload" value="<?php echo $reslt['student_image']?>"/>
						</div>


 <!-- <td><img src="'. $row["student_image"] . '" height="100px" width="100px"</td> -->



<!-- 
                    <div class="input_field">
                            <label for="">Photo</label><br>
                            <input type="file" name="fileToUpload" style="width:100%;"><br><br>
                        </div> -->
                    

                        <label for="">Student Name</label>
                        <input type="text" value="<?=$reslt['name']?>" id="name" class="form-control" name="sname" autocomplete="off" required><br>
                   
                       
                   <!-- DROP DOWN FOR CITY FIELD -->
                        <label for="">City</label>
                        <select name="city" id="city" class="form-control" required>
                            <option value="">Select City</option>

                            
                            <option value="DHAKA"
                            <?=$reslt['city'] == 'DHAKA'? "selected": '';?>
                            > Dhaka</option>


                            <option  <?=$reslt['city'] == 'RANGPUR'? "selected": '';?> value="RANGPUR">Rangpur</option>
                            <option  <?=$reslt['city'] == 'CHANDPUR'? "selected": '';?> value="CHANDPUR">Chandpur</option>
                        </select><br>
                    
                   
                        <label for="">Age</label>
                        <input type="number" value="<?php echo $reslt['age']?>"  id="ageNumber" class="form-control" name="sage"  required><br>

                        <label for="">GPA</label>
                        <input type="double" value="<?php echo $reslt['gpa']?>"  id="gpa" class="form-control" name="sgpa" autocomplete="off" required>&nbsp;&nbsp;<br>
                        
                        <!-- GENDER SHOWING RADIO BUTTON -->
                         <label>Gender </label>
                          <input type="radio" id="male" value="MALE" name="gender" required
                        <?php
                        if($reslt['gender']=='MALE')
                        echo "checked";
                        ?>>Male
                        <!-- <label for="male">Male</label> -->
                        <input type="radio" id="female" value="FEMALE" name="gender" required <?=$reslt['gender']=='FEMALE'?"checked":'';?> >Female
                        
                        <!--   <label for="female">Female</label> -->
                          <input type="radio" id="others" value="OTHERS" name="gender"required <?= $reslt['gender']=='OTHERS'?'checked':''; ?> >Others
                        <!--   <label for="others">Others</label><br> -->
                        
                         <!-- Button  -->
                        <div class="form-group col-lg-4" >
                        <!-- <button style="margin-left:340px"  class="btn btn-success" id="saveBtn">Submit</button> -->
                        <input type="submit" style="margin-left:300px" value="Update Details" name="update" id="submit" class="btn btn-primary">
                    </div>
               </div>
            </form>

            
        </div>
       </div>
       <div>
       <button type="button"class="btn btn-secondary" onclick="history.back();" class="back-btn">Back</button> 
</div>   
    </section>
             
                  
   <!-- <script src="connection.php"></script> -->
   <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> -->
</body>
</html>


<!-- ata php er modde hobe
    if(isset($_POST['update']))
{
    $studentName =$_POST['sname'];
    $previous = $_POST['previous'];
    $filename= $_FILES["fileToUpload"]["name"];
    $tempname= $_FILES["fileToUpload"]["tmp_name"];
    $folder="s-images/".$filename;
    //echo $folder;
    $studentCity = $_POST['city'];
    $studentAge =$_POST['sage'];
    $studentGpa = $_POST['sgpa'];
    $studentGender = $_POST['gender'];
    if(move_uploaded_file($tempname,$folder)){
        $query= "UPDATE student_details set student_image='$folder',name='$studentName',city='$studentCity',age='$studentAge',gpa='$studentGpa',gender='$studentGender'where student_id='$id'";
        $query_pass= mysqli_query($con,  $query);
        if( $query_pass)
        {
            echo "<script>alert('DATA UPDATED SUCCESSFULLY')</script>";
            ?>

             <meta http-equiv = "refresh" content = "0; url =http://localhost/php-crud/display_data.php" />

            
        }
        
        else
        {
            echo "<script>alert('DATA UPDATED FAILED')</script>";
        }
    }
    //try upload exist image
   
   
} -->

<?php
if(isset($_POST['update']))
{
    $studentName = $_POST['sname'];
    $studentCity = $_POST['city'];
    $studentAge = $_POST['sage'];
    $studentGpa = $_POST['sgpa'];
    $studentGender = $_POST['gender'];

    // Check if a new image is uploaded..akhane && theke baki code check kortese j file upload a error jodi 0 hoi
    // if(isset($_FILES["fileToUpload"]) && $_FILES["fileToUpload"]["error"] == 0) {
        if(isset($_FILES["fileToUpload"])){
        // Delete the old image
        $previousImage = $_POST['previous'];
        if (file_exists($previousImage) && is_file($previousImage)) {
            unlink($previousImage);
        }

        // Upload the new image
        $filename = $_FILES["fileToUpload"]["name"];
        $tempname = $_FILES["fileToUpload"]["tmp_name"];
        $folder = "s-images/" . $filename;

        if(move_uploaded_file($tempname, $folder)) {
            // Update the database with the new image path and other fields
            $query = "UPDATE student_details SET student_image='$folder', name='$studentName', city='$studentCity', age='$studentAge', gpa='$studentGpa', gender='$studentGender' WHERE student_id='$id'";
        } else {
            echo "<script>alert('Failed to move the uploaded image. Data not updated.')</script>";
        }
    } else {
        // No new image uploaded, update only other fields
        $query = "UPDATE student_details SET name='$studentName', city='$studentCity', age='$studentAge', gpa='$studentGpa', gender='$studentGender' WHERE student_id='$id'";
    }

    // Execute the query
    $query_pass = mysqli_query($con, $query);

    if($query_pass) {
        echo "<script>alert('DATA UPDATED SUCCESSFULLY')</script>";
        ?>
        <meta http-equiv="refresh" content="0; url=http://localhost/php-crud/display_data.php" />
        <?php
    } else {
        echo "<script>alert('DATA UPDATED FAILED')</script>";
    }
}
?>