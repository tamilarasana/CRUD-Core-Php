
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Details page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>  
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
                      <a class="btn btn-success" href="details.php">Create</a>
                     
                    </div>             
                  </div>
                </nav>
                </div>           
                    <!--begin::Form-->
                   <form  class="needs-validation" action="update.php" method="post" autocomplete="off" enctype="multipart/form-data">
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
                          <input type ="text" name="register" id="register"  placeholder="Register Number" class="form-control" maxlength="15" minlength="6"  pattern="^[a-zA-Z0-9_.-]*$" >
                        </div>
                        <div class="invalid-feedback">Please enter Register Number.</div>
                        <input type="hidden" name="update_id"  placeholder="Register Number" class="form-control"  value = "<?php echo $id; ?>">  
                    </div>
                    <div class="form-group row">
                      <label  class="col-2 col-form-label"><strong>Name</strong></label>
                        <div class="col-6">
                          <input name="name" placeholder="Name"   id="name" class="form-control" maxlength="15" minlength="4"  pattern="^[a-zA-Z]*$" >
                      </div>
                      <div class="invalid-feedback">Please enter your Name.</div>
                    </div>
                    <div class="form-group row">
                      <label  class="col-2 col-form-label"><strong>Age</strong></label>
                        <div class="col-6">
                          <input name="age" placeholder="Age" id= "age" class="form-control" maxlength="2" minlength="2" pattern="^[0-9_.-]*$"  > 
                      </div>
                      <div class="invalid-feedback">Please enter your Age.</div>
                    </div>
                    <div class="form-group row">
                      <label class="col-2 col-form-label"><strong>Year </strong></label>
                        <div class="col-6 col-form-label">
                          <div class="radio-inline">
                            <label class="radio radio-success">
                              <input type="radio" name="year" id="year" value="I Year" >
                                <span></span>
                                <div class="invalid-feedback">Please Select your Year.</div>
                                  I Year
                                  </label>
                                  <br>
                                    <label class="radio radio-success">
                                      <input type="radio"  name="year" id="year" value="I Year" >
                                      <span></span>
                                      <div class="invalid-feedback">Please Select your Year.</div>
                                      II year
                                    </label>
                                    <br>
                                    <label class="radio radio-success">
                                    <input type="radio" name="year" id="year" value="III Year" >
                                  <span></span>
                                  <div class="invalid-feedback">Please Select your Year.</div>
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
                              <input type="radio"  type="radio" name="gender" id="gender" value="Male"  >
                                <span></span>
                                <div class="invalid-feedback">Please Select your Gender.</div>
                                   Male
                                </label>
                                <br>
                                <label class="radio radio-success">
                              <input type="radio"name="gender" id="gender" value="Female"   >
                          <span></span>
                          <div class="invalid-feedback">Please Select your Gender.</div>
                        Female
                      </label>                            
                      </div>           
                      </div>
                    </div>
                    <div class="form-group row">
                    <?php 
                    $drop_down_array = ['BE' => 'BE', 'ME' => 'ME', 'MCA' => 'MCA', 'MBA' => 'MBA'];
                  ?>
                      <label class="col-2 col-form-label"><strong>Department</strong> </label>
                        <div class="col-6 col-form-label">
                        <select type="text" name="department" id= "department" class="form-control" >
                          <option value="">--Select--</option>
                          <?php 
                        foreach ($drop_down_array as $key => $value) {
                        if ($dept == $key) {
                        echo "<option value=".$key." selected='selected'>".$value."</option>";
                        } else {
                        echo "<option value=".$key.">".$value."</option>";
                        }
                        }
                        ?>                            
                        </select> 
                        <div class="invalid-feedback">Please Select Your Department.</div>   
                      </div>
                    </div>
                    <div class="form-group row">
                      <label  class="col-2 col-form-label"><strong>Phone Number</strong></label>
                        <div class="col-6">
                        <input type="text" name="phone" placeholder="Phone" class="form-control" maxlength="15" minlength="10" pattern="^[0-9_.-]*$" >  
                         <div class="invalid-feedback">Please enter your phone number .</div>
                        </div>
                    </div>
                    <div class="form-group row">
                      <label  class="col-2 col-form-label"><strong>Upload Image</strong></label>
                        <div class="col-6">                 
                           <input type="file" id="image" class="form-control" name="image" accept=".jpg,.png" >
                           <br>
                             <img src="uploads/<?php echo $img ;?>" width ="200px" height = "100px" >
                             <br>
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
                            <tr><input type="submit" name="submit" class="btn btn-success" value="Update" />
                            <td><a class="btn btn-danger" href="index.php">Cancel</a></td></tr>
                             
                          </div>
                        </div>
                      </div>
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
<?php

