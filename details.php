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
    
    $filepath = $image['tmp_name'];
    $filename = $image['name'];
    $fileerror = $image['error'];
    $file_ext = explode('.',$filename);
    $file_ext_check   = strtolower(end($file_ext));
    $valid_file_ext = array('png','jpg','jpeg','gif');
    if($fileerror == 0){
    if(in_array($file_ext_check, $valid_file_ext )){
     
     move_uploaded_file($filepath,'uploads/'.$filename);
    
      $sql = "INSERT INTO student_details (std_regno, std_name, std_age, std_year, std_gender, std_department, std_phone, std_image) 
            VALUES ( '$reg', '$name', '$age', '$year', '$gender', '$dep', '$phone','$filename')";
        if ($conn->query($sql) === TRUE) {
          $_SESSION['status_code']= "Your Information is Store Successfully";
          header('Location:details.php');
          //  header('Location:view.php');
         
        } else {
                 header('Location:details.php?error=unknow error occurred');
        } 
        header('Location:view.php');
      }else{
        $_SESSION['status']= "You are allowed with only jpg,png and jpeg";
        header('Location:details.php');
       }
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
           <?php if(isset($_SESSION['status'])){ ?>
            <div class="alert alert-danger" role="alert">
               <button type="button" class="close" data-dismiss="alert">&times;</button>
               <b class="text-center"><?= $_SESSION['status'];?></b>
               </div>
             <?php } unset($_SESSION['response']);?>
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
                            <input type="file" id="image" class="form-control" name="image" required>
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



