<?php
include "config.php ";
$reg_error ='';
$name_error = '';
$age_error ='';
$year_error = '';
$gender_error = '';
$dep_error ='';
$phone_error = '';
$image_error ='';
if(empty($_POST['register'])){
      // $reg_error = "<p>Please Enter Your Register Number</p>";    
    }else{
      if(!preg_match("/^[a-zA-Z0-9_.-]*$/",$_POST['register'])){
      $reg_error = "<p>Please Enter Your Register Number</p>"; 
      }
    }
  if(empty($_POST['name'])){
        // $name_error ="<p>Please Enter Your Name</p>";  
        }else{
            if(!preg_match("/^[a-zA-Z]*$/",$_POST['name'])){
            $name_error = "<p>Only Letter and whitespace allowed</p>"; 
       }
   }    
  if(empty($_POST['age'])){      
      }else{
          if(!preg_match("/^[0-9_.-]*$/",$_POST['age'])){
          $age_error = "<p>Please Insert Valid Input</p>"; 
         }
  if(empty($_POST['year'])){      
    }else{
         if(!preg_match("/^[0-4_.-]*$/",$_POST['year'])){
         $year_error = "<p>Please Insert Valid Input</p>"; 
    }
  }
  if(empty($_POST['phone'])){     
      }else{
       if(!preg_match("/^[0-9_.-]*$/",$_POST['phone'])){
       $phone_error = "<p>Only number allowed, Please Insert Valid Phone number</p>"; 
       
      }
    }

    $reg=$_POST['register'];
    $name=$_POST['name'];
    $age=$_POST['age'];
    $year=$_POST['year'];
    $gender=$_POST['gender'];
    $dep=$_POST['department'];
    $phone=$_POST['phone'];   
    $image=$_FILES['image']; 
    $file_name = $image['tmp_name'];
    $destination = $image['name'];
    if(move_uploaded_file($file_name,"uploads/".$destination)){

    
      $sql = "INSERT INTO details (std_regno, std_name, std_age, std_year, std_gender, std_department, std_phone, std_image) 
            VALUES ( '$reg', '$name', '$age', '$year', '$gender', '$dep', '$phone','$destination')";
        if ($conn->query($sql) === TRUE) {
          echo "New record created successfully";
          header('Location:view.php');
        } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
        }  
   $conn->close();
      }
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
      <nav class="navbar navbar-default">
        <div class="container-fluid">
           <ul class="nav navbar-nav navbar-right">    
            <?php
              session_start();
              if (isset($_SESSION['User'])){
                echo '<b>welcome:</b> <h3 style="color: blue; font-weight: bolder ">'.$_SESSION['User']. ' </h3>';
              }else{
                header("location:index.php");
              }
            ?>
        </ul>
        <ul class="nav navbar-nav navbar-left">
           <li> <a class="btn btn-success" href="view.php">View</a></li>
        </ul>               
       </div>
    </nav> 
    <div class="container">
      <div class="row">
        <div class="col-md-3">
            <form class="needs-validation" name="myForm" action="details.php" method="post" autocomplete="off"  enctype ="multipart/form-data"  novalidate>
              <div class="form-group">
                <label>Register Number</label>
                <input type="text" name="register" id="register"  placeholder="Register Number" class="form-control" maxlength="15" minlength="6" required>
               
                <div class="invalid-feedback">Please enter Register Number.</div>
               </div>
              <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" placeholder="name"   id="name" class="form-control" maxlength="15" minlength="4" required>
                <span class ="text-danger"><?php echo $name_error;?></span>
                <div class="invalid-feedback">Please enter your Name.</div>
              </div>
              <div class="form-group">
                <label>Age</label>
                <input type="text" name="age" placeholder="Age" id= "age" class="form-control" maxlength="2" minlength="2"  required>
                <span class ="text-danger"><?php echo $age_error;?></span>
                <div class="invalid-feedback">Please enter your Age.</div>
              </div>
              <div class="form-group">
                <label>Year</label>
                <input type="text" name="year" placeholder="Year" class="form-control" maxlength="1" minlength="1"  required>
                <span class ="text-danger"><?php echo $year_error;?></span>
                <div class="invalid-feedback">Please enter year.</div>
              </div> 
              <div class="form-group">                               
                <label>Gender</label>
                 <div class="row">
                      <div class="col-sm-10">
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="gender" value="Male" required>
                            <div class="invalid-feedback">Please Select your Gender.</div>
                            <label>Male</label>
                      </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="gender" id="gender" value="Female" required>
                          <div class="invalid-feedback">Please Select your Gender.</div>
                      <label>Female 
                    </div>
                  </div>                           
              </div>
              <div class="form-group">
                  <label>Department</label>
                  <select type="text" name="department" id= "department" class="form-control" required>
                    <option value="">--Select--</option>
                    <option value="BE">BE</option>
                    <option value="ME">ME</option> 
                    <option value="MCA">MCA</option> 
                    <option value="MBA">MBA</option>                               
                  </select> 
                 <div class="invalid-feedback">Please Select Your Department.</div>                           
              </div>                    
              <div class="form-group">
                <label>Phone</label>
                  <input type="text" name="phone" placeholder="Phone" class="form-control" maxlength="15" minlength="10" pattern="^[0-9_.-]*$" required>
                  <span class ="text-danger"><?php echo $phone_error;?></span>
                  <div class="invalid-feedback">Please enter your phone number .</div>
                </div>
              <div class ="form-grop">
                <label>Upload Image</label><br>
                <input type="file" id="image" class="form-control" name="image" accept=".jpg,.png" required>
                <div class="invalid-feedback">Please Select your Image.</div>
                <br>
              </div>
              
              <div class="form-group">
                <tr><input type="submit" name="submit" class="btn btn-success" value="submit" />
                <td><a class="btn btn-danger" href="index.php">Cancel</a></td></tr>
              </div>
           </form>
          <script>
            (function() {
            'use strict';
              window.addEventListener('load', function() {               
                var forms = document.getElementsByClassName('needs-validation');  
                var validation = Array.prototype.filter.call(forms, function(form) {
                  form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                      event.preventDefault();
                      event.stopPropagation();
                      }
                    form.classList.add('was-validated');
                  }, false);
                });
              }, false);
            })();
          </script>
    </div>
    </div>
  </body>
</html>