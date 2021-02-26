<?php
  include "config.php ";
  if (isset($_GET['id'])){
   $user_id = $_GET['id'];
        $sql = "SELECT * FROM student_details WHERE id = '$user_id'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0){
          while ($row = $result->fetch_assoc()){
              $reg    =  $row['std_regno'];
              $name   =  $row['std_name'];
              $age    =  $row['std_age'];
              $year   =  $row['std_year'];
              $gender =  $row['std_gender'];
              $dept   =  $row['std_department'];
              $phone  =  $row['std_phone'];
              $img    =  $row['std_image'];
              $id  = $row['id'];
     }
?> 
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
        <?php
              if (isset($_SESSION['User'])){
                echo '<b>welcome:</b> <h3 style="color: blue; font-weight: bolder ">'.$_SESSION['User'].'</h3>';
              }else{
                header("location:index.php");
              }
            ?>     
            <div class="card card-custom">            
                <div class="card-header">                  
                    <nav class="navbar navbar-inverse">
                  <div class="container-fluid" style="margin: 10px auto">
                    <div class="nav navbar-left">               
                      <a class="btn btn-warning" href="logout.php?logout">Logout</a>
                    </div>      
                    <h3 class="card-title text-center text-info">
                     Update Page
                    </h3>             
                    <div class="nav navbar-right">               
                      <a class="btn btn-success" href="details.php">Create</a>                     
                    </div>             
                  </div>
                </nav>
                </div>           
                    <!--begin::Form-->
                   <form  class="needs-validation" action="update.php" method="post" autocomplete="off" enctype="multipart/form-data" novalidate>
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
                          <input type ="text" name="register" id="register"  placeholder="Register Number" class="form-control" maxlength="15" minlength="6"  pattern="^[a-zA-Z0-9_.-]*$" required  value="<?php echo $reg; ?>">
                             <div class="invalid-feedback">Please enter Register Number.</div>
                        </div>
                        <input type="hidden" name="update_id"  placeholder="Register Number" class="form-control"  value = "<?php echo $id;?>">  
                    </div>
                    <div class="form-group row">
                      <label  class="col-2 col-form-label"><strong>Student Name</strong></label>
                        <div class="col-6">
                          <input name="name" placeholder="Name"  id="name" class="form-control" maxlength="15" minlength="4"  pattern="^[a-z . A-Z]*$" required value="<?php echo $name; ?>"> 
                           <div class="invalid-feedback">Please enter your Name.</div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label  class="col-2 col-form-label"><strong>Age</strong></label>
                        <div class="col-6">
                          <input name="age" placeholder="Age" id= "age" class="form-control" maxlength="2" minlength="2" pattern="^[0-9_.-]*$"  required value="<?php echo $age; ?>"> 
                           <div class="invalid-feedback">Please enter your Age.</div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-2 col-form-label"><strong>Year</strong></label>
                        <div class="col-6 col-form-label">
                          <div class="radio-inline">
                            <label class="radio radio-success">
                              <input type="radio" name="year" id="year" required value="I Year" <?php if($year == 'I Year'){ echo "checked";} ?>>
                                <span></span>
                                <!-- <div class="invalid-feedback">Please Select your Year.</div> -->
                                  I Year
                                  </label>
                                  <br>
                                    <label class="radio radio-success">
                                      <input type="radio"  name="year" id="year" required value="II Year"<?php if($year == 'II Year'){ echo "checked";} ?>>
                                      <span></span>
                                      <!-- <div class="invalid-feedback">Please Select your Year.</div> -->
                                      II year
                                    </label>
                                    <br>
                                    <label class="radio radio-success">
                                     <input type="radio" name="year" id="year" required value="III Year" <?php if($year == 'III Year'){ echo "checked";} ?>>
                                     <span></span>
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
                              <input type="radio"  type="radio" name="gender" id="gender" required value="Male"<?php if($gender == 'Male'){ echo "checked";} ?>>
                                <span></span>
                                <!-- <div class="invalid-feedback">Please Select your Gender.</div> -->
                                   Male
                                </label>
                                <br>
                                <label class="radio radio-success">
                              <input type="radio"name="gender" id="gender"  required value="Female" <?php if($gender == 'Female'){ echo "checked";}?>>
                              <span></span>
                             Female
                           <div class="invalid-feedback">Please Select your Gender.</div>
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
                        <input type="text" name="phone" placeholder="Phone" class="form-control" maxlength="15" minlength="10" pattern="^[0-9_.-]*$" required value="<?php echo $phone; ?>">   
                         <div class="invalid-feedback">Please enter your phone number.</div>
                        </div>
                    </div>
                    <div class="form-group row">
                      <label  class="col-2 col-form-label"><strong>Upload Image</strong></label>
                        <div class="col-6">                 
                           <input type="file" id="image" class="form-control" name="image" accept=".jpg,.png,.jpeg" value = "<?php echo $img; ?>">
                           <br>
                             <img src="uploads/<?php echo $img ;?>" width ="200px" height="100px" >
                             <input type="hidden" value="<?php echo $img ;?>" name="old_image" />
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
                            <tr><input type="submit" name="update" class="btn btn-success" value="Update">
                            <td><a class="btn btn-danger" href="view.php">Cancel</a></td></tr>                             
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
}else{
//  header('Location:view.php');  
 header('Location:404page.php');
}
  }
?>
