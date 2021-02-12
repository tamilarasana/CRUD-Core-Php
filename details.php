<?php

if (isset($_POST['submit'])){
$reg=$_POST['register'];
$name=$_POST['name'];
$age=$_POST['age'];
$year=$_POST['year'];
$gender=$_POST['gender'];
$dep=$_POST['department'];
$phone=$_POST['phone'];
//$img=$_POST['image'];

$image=$_FILES['image']['name'];
//$image=$_FILES['image']['name']; 
$imageArr=explode('.',$image); //first index is file name and second index file type
$rand=rand(10000,99999);
$newImageName=$imageArr[0].$rand.'.'.$imageArr[1];
$uploadPath="uploads/".$newImageName;
$isUploaded=move_uploaded_file($_FILES["image"]["tmp_name"],$uploadPath);
if($isUploaded)
echo 'successfully file uploaded';
else
echo 'something went wrong';


        // Create connection
        $conn = new mysqli("localhost","root","password","task");
        // Check connection
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }

        $sql = "INSERT INTO details (std_regno, std_name, std_age, std_year, std_gender, std_department, std_phone, std_image) 
            VALUES ( '$reg', '$name', '$age', '$year', '$gender', '$dep', '$phone','$uploadPath')";


        if ($conn->query($sql) === TRUE) {
          echo "New record created successfully";
          header('Location:view.php');
        } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
        }
        ?>
<!DOCTYPE html>
<html>
    <head>
    <title>Register</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    </head>
        <body>
        <h2 style="text-align:center;">Register </h2>     
        <div class="container">
          <div class="row">
            <div class="col-md-3">
                <form class="" action="" method="post" autocomplete="off" enctype ="multipart/form-data">
                    <div class="form-group">
                        <label>Register Number</label>
                        <input type="text" name="register"  placeholder="Register Number" class="form-control">
                        
                    </div>
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" placeholder="Name" class="form-control">
                         
                    </div>
                    <div class="form-group">
                        <label>Age</label>
                        <input type="text" name="age" placeholder="Age" class="form-control">
                         
                    </div>
                    <div class="form-group">
                        <label>Year</label>
                        <input type="text" name="year" placeholder="Year" class="form-control">
                     </div>    

                   <div class="form-group">                               
                                  <label>Gender</label>
                                  <div class="row">
                                  <div class="col-sm-10">
                                    <div class="form-check">
                                      <input class="form-check-input" type="radio" name="gender" id="gender" value="Male">
                                      <label>
                                        Male
                                      </label>
                                    </div>
                                    <div class="form-check">
                                      <input class="form-check-input" type="radio" name="gender" id="gender" value="Female">
                                      <label>
                                        Female 
                                      <!-- </label>
                                    <div class="form-check">
                                      <input class="form-check-input" type="radio" name="gender" id="gender" value=" Transgender">
                                      <label>
                                        Transgender
                                      </label>
                                    </div> -->
                                </div>
                          </div>                           
                        </div>

                    <div class="form-group">
                            <label>Department</label>
                            <select type="text" name="department" class="form-control">
                               <option>--Select--</option>
                                <option value="BE">BE</option>
                                <option value="ME">ME</option> 
                                <option value="MCA">MCA</option> 
                                <option value="MBA">MBA</option>                               
                            </select>                            
                        </div>                    
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="text" name="phone" placeholder="Phone" class="form-control">
                          
                    </div>

                    <div class ="form-grop">
                    <label>Upload Image</label><br>
                     <input type="file" id="image" class="form-control" name="image">
                    <br>
                    </div>
                    
                    <div class="form-group">
                        <tr><input type="submit" name="submit" class="btn btn-success" value="submit" />
                        <td><a class="btn btn-danger" href="/">Cancel</a></td></tr>
                    </div>
                </form>
                    </div>
                    </div>
            </body>
        </html>