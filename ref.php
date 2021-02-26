<?php
include "config.php ";
if (isset($_POST['submit'])){  
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
    
      $sql = "INSERT INTO student_details (std_regno, std_name, std_age, std_year, std_gender, std_department, std_phone, std_image) 
            VALUES ( '$reg', '$name', '$age', '$year', '$gender', '$dep', '$phone','$destination')";
        if ($conn->query($sql) === TRUE) {
          header('Location:view.php?success=Your Information has storred Successfuly');
          exit();
        } else {
                 header('Location:details.php?error=unknow error occurred');
          exit();
        }  
   $conn->close();
      }
 }      
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Register page</title>  
    <?php require "script.php"?>
  </head>
  <body>
        <div class="container pt-4">
            <?php
              if (isset($_SESSION['User'])){
                echo '<b>welcome:</b> <h3 style="color: blue; font-weight: bolder ">'.$_SESSION['User']. ' </h3>';
                  }else{
                    header("location:index.php");
                  }
              ?>
             <div class="card card-custom">            
                <div class="card-header">                  
                    <nav class="navbar navbar-default">
                      <div class="container-fluid" style="margin: 10px auto">
                        <div class="nav navbar-left">               
                          <a class="btn btn-warning" href="logout.php?logout">Logout</a>
                        </div>      
                         <h3 class="card-title text-center text-info">
                           Student Registration From
                          </h3>             
                          <div class="nav navbar-right">               
                           <a class="btn btn-success" href="view.php">View</a>                     
                          </div>             
                      </div>
                   </nav>
                </div>               
                  <form class="needs-validation" name="myForm" action="details.php" method="post" autocomplete="off"  enctype ="multipart/form-data"  novalidate>     
                      <div class="card-body">
                        <div class="form-group mb-8">
                          <div class="alert alert-custom alert-default" role="alert">
                            <div class="alert-icon"><i class="flaticon-warning text-primary"></i></div>
                              <!-- <div class="alert-text"><strong>Please Enter your's Details</strong></div> -->
                        </div>
                      </div>
                      <div class="form-group row">
                        <label  class="col-2 col-form-label"><strong>Register Number</strong></label>
                          <div class="col-md-6">
                            <input type ="text" name="register" id="register"  placeholder="Register Number" class="form-control" maxlength="15" minlength="6"  pattern="^[a-zA-Z0-9_.-]*$"  required/>
                            <div class="invalid-feedback">Please enter Register Number.</div>
                          </div>
                      </div>
                      <div class="form-group row">
                        <label  class="col-2 col-form-label"><strong>Student Name</strong></label>
                          <div class="col-6">
                            <input name="name" placeholder="Name" id="name" class="form-control" maxlength="15" minlength="4"  pattern="^[a-z. A-Z]*$" required/>
                            <div class="invalid-feedback">Please enter your Name.</div>
                          </div>
                      </div>
                      <div class="form-group row">
                        <label  class="col-2 col-form-label"><strong>Age</strong></label>
                          <div class="col-6">
                            <input name="age" placeholder="Age" id= "age" class="form-control" maxlength="2" minlength="2" pattern="^[0-9_.-]*$"  required/>
                              <div class="invalid-feedback">Please enter your Age.</div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-2 col-form-label"><strong>Year </strong></label>
                          <div class="col-6 col-form-label">
                            <div class="radio-inline">
                              <label class="radio radio-success">
                                <input type="radio" name="year" id="year" value="II Year" required />
                                  <span></span>
                                  I Year
                                    </label>
                                    <br>
                                      <label class="radio radio-success">
                                        <input type="radio"  name="year" id="year" value="I Year" required  />
                                        <span></span>
                                        <!-- <div class="invalid-feedback">Please Select your Year.</div> -->
                                        II year
                                      </label>
                                      <br>
                                      <label class="radio radio-success">
                                      <input type="radio" name="year" id="year" value="III Year" required />
                                    <span></span>
                                    <!-- <div class="invalid-feedback">Please Select your Year.</div> -->
                                  III Year
                                  <div class="invalid-feedback">Please Select your Year.</div>
                            </label>       
                            <br>         
                          </div>           
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-2 col-form-label"><strong>Gender</strong> </label>
                          <div class="col-6 col-form-label">
                            <div class="radio-inline">
                              <label class="radio radio-success">
                                <input type="radio"  type="radio" name="gender" id="gender" value="Male" required />
                                  <span></span>
                                  <!-- <div class="invalid-feedback">Please Select your Gender.</div> -->
                                    Male
                                  </label>
                                  <br>
                                  <label class="radio radio-success">
                                <input type="radio"name="gender" id="gender" value="Female" required />
                                <span></span>
                                  Female
                                <div class="invalid-feedback">Please Select your Gender.</div>
                        </label>                            
                        </div>           
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-2 col-form-label"><strong>Department</strong> </label>
                          <div class="col-6 col-form-label">
                          <select type="text" name="department" id= "department" class="form-control" required>
                            <option value="">--Select--</option>
                            <option value="BE">BE</option>
                            <option value="ME">ME</option> 
                            <option value="MCA">MCA</option> 
                            <option value="MBA">MBA</option>                               
                          </select> 
                          <div class="invalid-feedback">Please Select Your Department.</div>   
                        </div>
                      </div>
                      <div class="form-group row">
                        <label  class="col-2 col-form-label"><strong>Phone Number</strong></label>
                          <div class="col-6">
                            <input type="text" name="phone" placeholder="Phone" class="form-control" maxlength="15" minlength="10" pattern="^[0-9_.-]*$" required>
                          <div class="invalid-feedback">Please enter your phone number .</div>
                          </div>
                      </div>
                      <div class="form-group row">
                        <label  class="col-2 col-form-label"><strong>Upload Image</strong></label>
                          <div class="col-6">                 
                            <input type="file" id="image" class="form-control" name="image" accept=".jpg,.png" required>
                            <div class="invalid-feedback">Please Select your Image.</div>
                          <br>
                        </div>
                      </div>
                      <div class="card-footer">
                        <div class="row">
                          <div class="col-2">
                            </div>
                            <div class="col-lg-2"></div>
                              <div class="col-lg-6">
                              <tr><button type="submit" name="submit" class="btn btn-success"  >Submit</button>
                              <td><button type="reset" class="btn btn-danger" href="index.php">Reset</button></td></tr>                             
                            </div>
                          </div>
                        </div>
                      </div>
                </form>
                <script>
                    (function() {
                    'use strict'
                    // alert("heki");
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




















<?php
include "config.php ";
if (isset($_POST['submit'])){  
    $reg=$_POST['register'];
    $name=$_POST['name'];
    $age=$_POST['age'];
    $year=$_POST['year'];
    $gender=$_POST['gender'];
    $dep=$_POST['department'];
    $phone=$_POST['phone'];   
    $file=$_FILES['image']; 

    $filename=$file['name'];
    $filepath = $file['tmp_name'];
    $fileerror = $file['error'];
    $file_ext = explode('.',$filename);

    $file_ext_check   = strtolower(end($file_ext));
    
    
    $valid_file_ext = array('png','jpg','jpeg','gif');

    if($fileerror == 0){
        if(in_array($file_ext_check, $valid_file_ext )){
            $destfile = 'uploads/'.$filename;
            
            move_uploaded_file($file_name, $destfile);
      
             $sql = "INSERT INTO student_details (std_regno, std_name, std_age, std_year, std_gender, std_department, std_phone, std_image) 
              VALUES ( '$reg', '$name', '$age', '$year', '$gender', '$dep', '$phone',' $destfile')";
              
             if ($conn->query($sql) === TRUE) {
                  header('Location:view.php?success=Your Information has storred Successfuly');
                  exit();
                } else {
                   header('Location:details.php?error=unknow error occurred');
                   exit();
                  }  
                 header('location:details.php');
            }else{
          ?>
          <script>
          alert("not valid ext");
          window.location ="details.php";
          </script>
          <?php
          
        }
        }else{
        echo"No button has been clicked";

      }
      $conn->close();
 }      
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Register page</title>  
    <?php require "script.php"?>
  </head>
  <body>
        <div class="container pt-4">
            <?php
              if (isset($_SESSION['User'])){
                echo '<b>welcome:</b> <h3 style="color: blue; font-weight: bolder ">'.$_SESSION['User']. ' </h3>';
                  }else{
                    header("location:index.php");
                  }
              ?>
             <div class="card card-custom">            
                <div class="card-header">                  
                    <nav class="navbar navbar-default">
                      <div class="container-fluid" style="margin: 10px auto">
                        <div class="nav navbar-left">               
                          <a class="btn btn-warning" href="logout.php?logout">Logout</a>
                        </div>      
                         <h3 class="card-title text-center text-info">
                           Student Registration From
                          </h3>             
                          <div class="nav navbar-right">               
                           <a class="btn btn-success" href="view.php">View</a>                     
                          </div>             
                      </div>
                   </nav>
                </div>               
                  <form class="needs-validation" name="myForm" action="details.php" method="post" autocomplete="off"  enctype ="multipart/form-data"  novalidate>     
                      <div class="card-body">
                        <div class="form-group mb-8">
                          <div class="alert alert-custom alert-default" role="alert">
                            <div class="alert-icon"><i class="flaticon-warning text-primary"></i></div>
                              <!-- <div class="alert-text"><strong>Please Enter your's Details</strong></div> -->
                        </div>
                      </div>
                      <div class="form-group row">
                        <label  class="col-2 col-form-label"><strong>Register Number</strong></label>
                          <div class="col-md-6">
                            <input type ="text" name="register" id="register"  placeholder="Register Number" class="form-control" maxlength="15" minlength="6"  pattern="^[a-zA-Z0-9_.-]*$"  required/>
                            <div class="invalid-feedback">Please enter Register Number.</div>
                          </div>
                      </div>
                      <div class="form-group row">
                        <label  class="col-2 col-form-label"><strong>Student Name</strong></label>
                          <div class="col-6">
                            <input name="name" placeholder="Name" id="name" class="form-control" maxlength="15" minlength="4"  pattern="^[a-z. A-Z]*$" required/>
                            <div class="invalid-feedback">Please enter your Name.</div>
                          </div>
                      </div>
                      <div class="form-group row">
                        <label  class="col-2 col-form-label"><strong>Age</strong></label>
                          <div class="col-6">
                            <input name="age" placeholder="Age" id= "age" class="form-control" maxlength="2" minlength="2" pattern="^[0-9_.-]*$"  required/>
                              <div class="invalid-feedback">Please enter your Age.</div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-2 col-form-label"><strong>Year </strong></label>
                          <div class="col-6 col-form-label">
                            <div class="radio-inline">
                              <label class="radio radio-success">
                                <input type="radio" name="year" id="year" value="II Year" required />
                                  <span></span>
                                  I Year
                                    </label>
                                    <br>
                                      <label class="radio radio-success">
                                        <input type="radio"  name="year" id="year" value="I Year" required  />
                                        <span></span>
                                        <!-- <div class="invalid-feedback">Please Select your Year.</div> -->
                                        II year
                                      </label>
                                      <br>
                                      <label class="radio radio-success">
                                      <input type="radio" name="year" id="year" value="III Year" required />
                                    <span></span>
                                    <!-- <div class="invalid-feedback">Please Select your Year.</div> -->
                                  III Year
                                  <div class="invalid-feedback">Please Select your Year.</div>
                            </label>       
                            <br>         
                          </div>           
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-2 col-form-label"><strong>Gender</strong> </label>
                          <div class="col-6 col-form-label">
                            <div class="radio-inline">
                              <label class="radio radio-success">
                                <input type="radio"  type="radio" name="gender" id="gender" value="Male" required />
                                  <span></span>
                                  <!-- <div class="invalid-feedback">Please Select your Gender.</div> -->
                                    Male
                                  </label>
                                  <br>
                                  <label class="radio radio-success">
                                <input type="radio"name="gender" id="gender" value="Female" required />
                                <span></span>
                                  Female
                                <div class="invalid-feedback">Please Select your Gender.</div>
                        </label>                            
                        </div>           
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-2 col-form-label"><strong>Department</strong> </label>
                          <div class="col-6 col-form-label">
                          <select type="text" name="department" id= "department" class="form-control" required>
                            <option value="">--Select--</option>
                            <option value="BE">BE</option>
                            <option value="ME">ME</option> 
                            <option value="MCA">MCA</option> 
                            <option value="MBA">MBA</option>                               
                          </select> 
                          <div class="invalid-feedback">Please Select Your Department.</div>   
                        </div>
                      </div>
                      <div class="form-group row">
                        <label  class="col-2 col-form-label"><strong>Phone Number</strong></label>
                          <div class="col-6">
                            <input type="text" name="phone" placeholder="Phone" class="form-control" maxlength="15" minlength="10" pattern="^[0-9_.-]*$" required>
                          <div class="invalid-feedback">Please enter your phone number .</div>
                          </div>
                      </div>
                      <div class="form-group row">
                        <label  class="col-2 col-form-label"><strong>Upload Image</strong></label>
                          <div class="col-6">                 
                            <input type="file" id="image" class="form-control" name="image" accept=".jpg,.png" required>
                            <div class="invalid-feedback">Please Select your Image.</div>
                          <br>
                        </div>
                      </div>
                      <div class="card-footer">
                        <div class="row">
                          <div class="col-2">
                            </div>
                            <div class="col-lg-2"></div>
                              <div class="col-lg-6">
                              <tr><button type="submit" name="submit" class="btn btn-success"  >Submit</button>
                              <td><button type="reset" class="btn btn-danger" href="index.php">Reset</button></td></tr>                             
                            </div>
                          </div>
                        </div>
                      </div>
                </form>
                <script>
                    (function() {
                    'use strict'
                    // alert("heki");
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




<?php
    include "config.php ";
    if (isset($_POST['update'])){      
        $user_id = $_POST['update_id'];
        $reg      =$_POST['register'];
        $name     =$_POST['name'];
        $age      =$_POST['age'];
        $year     =$_POST['year'];
        $gender   =$_POST['gender'];
        $dep      =$_POST['department'];
        $phone    =$_POST['phone']; 
        $image    =$_FILES['image']; 
        $old_image = $file_name=  $_POST['old_image'];
        if ($image['size'] > 1){
			$tmp_name = $image['tmp_name'];
			$file_name = $image['name'];
			if (file_exists("uploads/".$old_image) && !empty("uploads/".$old_image)){
				unlink("uploads/".$old_image);
			}
			move_uploaded_file($tmp_name, "uploads/".$file_name);
     	}
		$sql = "UPDATE  student_details SET std_regno = '$reg', std_name = '$name', std_age = '$age', std_year = '$year', std_gender = '$gender', std_department = '$dep', std_phone = '$phone', std_image ='$file_name'  WHERE id = '$user_id'"; 
		if ($conn->query($sql) === TRUE) { 
			echo '<script>alert("Please update your data")</script>';        
			header('Location:view.php');
		}else {
			echo '<script>alert("Please update your data")</script>';
			header('Location:view.php');
		}
	}
?>