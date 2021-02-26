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
    
      $sql = "INSERT INTO std_details  VALUES (NULL,'$reg', '$name', '$age', '$year', '$gender', '$dep', '$phone','$destination')";
      if ($conn->query($sql) === TRUE) {
        echo " data stored in a database successfully.";       
            

            } else{ 
                  echo "ERROR: Hush! Sorry $sql. " 
            . mysqli_error($conn); 
              } 
      
    
              $conn->close(); 
            }
    
 }      
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <title>Details page</title>  
  <?php require "script.php"?>
</head>
    <body>
        <div class="container pt-4">
            <div class="card card-custom">            
                <div class="card-header">                  
                    <nav class="navbar navbar-default">
                  <div class="container-fluid" style="margin: 10px auto">
                    <div class="nav navbar-left">               
                      <a class="btn btn-warning" href="logout.php?logout">Logout</a>
                    </div>      
                    <h3 class="card-title text-center text-info">
                     Register
                    </h3>             
                    <div class="nav navbar-right">               
                      <a class="btn btn-success" href="view.php">View</a>
                     
                    </div>             
                  </div>
                </nav>
                </div>                
                    <!--begin::Form-->                    
                    <form class="needs-validation"  action="registerpage.php" method="post" autocomplete="off"  enctype ="multipart/form-data"  >     
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
                          <input type ="text" name="register" id="register"  placeholder="Register Number" class="form-control"  required/>
                        </div>                       
                    </div>
                    <div class="form-group row">
                      <label  class="col-2 col-form-label"><strong>Student Name</strong></label>
                        <div class="col-6">
                          <input type = "text" name="name" placeholder="Name"   id="name" class="form-control"  required/>
                      </div>
                     
                    </div>
                    <div class="form-group row">
                      <label  class="col-2 col-form-label"><strong>Age</strong></label>
                        <div class="col-6">
                          <input type="text" name="age" placeholder="Age" id= "age"  min="18" max="99"  class="form-control"   required/>
                      </div>
                     
                    </div>
                    <div class="form-group row">
                      <label class="col-2 col-form-label"><strong>Year </strong></label>
                        <div class="col-6 col-form-label">
                          <div class="radio-inline">
                            <label class="radio radio-success">
                              <input type="radio" name="year" id="year" value="II Year"/>
                                <span></span>
                                <div class="invalid-feedback">Please Select your Year.</div>
                                  I Year
                                  </label>
                                  <br>
                                    <label class="radio radio-success">
                                      <input type="radio"  name="year" id="year" value="I Year"  />
                                       <span></span>
                                     
                                      II year
                                    </label>
                                    <br>
                                    <label class="radio radio-success">
                                    <input type="radio" name="year" id="year" value="III Year" />
                                  <span></span>
                                
                                III Year
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
                              <input type="radio"   name="gender" id="gender" value="Male" />
                                <span></span>
                                <div class="invalid-feedback">Please Select your Gender.</div>
                                   Male
                                </label>
                                 <br>
                                <label class="radio radio-success">
                              <input type="radio"name="gender" id="gender" value="Female"  />
                          <span></span>
                          <div class="invalid-feedback">Please Select your Gender.</div>
                        Female
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
                          <input type="text" name="phone" placeholder="Phone Nuimber" class="form-control"  required>
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
                            <tr><input type="submit" name="submit" class="btn btn-success" value="submit" />
                            <td><a class="btn btn-danger" href="index.php">Cancel</a></td></tr>
                             
                          </div>
                        </div>
                      </div>
                    </div>
                </form>
                <script>
                function validateDOB(bday) {
                    var dateString = bday.value;
                    var parts = dateString.split("/"); // not testing if the format is correct here
                    var now = new Date();
                    var birthday = new Date(now.getFullYear(),parts[1]-1,parts[0]);
                    var age = now.getFullYear()-parts[2];
                    if (now<birthday) age--;
                    if (age<18) {
                      alert("You must be over 18 to register");
                      return false
                    }
                    // other validation
                    return true;
                    }
                </script>
              
            </div>  
        </div>
    </body>
</html>
