<?php
include "config.php ";
if(isset($_GET['id'])){
 $user_id = $_GET['id'];

       $sql = "SELECT * FROM details WHERE id = '$user_id'";

       $result = $conn->query($sql);
       if($result->num_rows > 0){

        while($row = $result->fetch_assoc()){

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
      <html>
          <head>
            <title>Edit</title>
              <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
          </head>
            <body>
              <h2 style="text-align:center;">Edit Your Details </h2> 
              <?php
                      session_start();
                      if(isset($_SESSION['User'])){
                     echo 'welcome:' .$_SESSION['User'];
                      }  
                      else {
                          headr("Location:index.php");
                      }                 
                                       
                     ?>
                </ul>             
              <div class="container">
                <div class="row">
                  <div class="col-md-3">
                    <form  class="needs-validation" action="update.php" method="post" autocomplete="off" enctype="multipart/form-data">
                      <div class="form-group">
                              <label>Register Number</label>
                              <input type="text" name="register"  placeholder="Register Number" class="form-control" maxlength="15" minlength="6" pattern="^[a-zA-Z0-9_.-]*$" required value = "<?php echo $reg; ?>">
                              <div class="invalid-feedback">Please enter minimum 6 Number.</div>
                              <input type="hidden" name="update_id"  placeholder="Register Number" class="form-control"  value = "<?php echo $id; ?>">                                                                            
                      </div>

                      <div class="form-group">
                              <label>Name</label>
                              <input type="text" name="name" placeholder="Name" class="form-control"  maxlength="15" minlength="4" pattern="^[a-zA-Z0-9_.-]*$" required value = "<?php echo $name; ?>">       
                       <div class="invalid-feedback">Please enter your Name.</div>                   
                        </div>

                        <div class="form-group">
                              <label>Age</label>
                              <input type="text" name="age" placeholder="Age" class="form-control" maxlength="2" minlength="2" pattern="^[a-zA-Z0-9_.-]*$" required value = "<?php echo $age; ?>">  
                          <div class="invalid-feedback">Please enter your Age.</div>                        
                          </div>

                          <div class="form-group">
                              <label>Year</label>
                              <input type="text" name="year" placeholder="Year" class="form-control" maxlength="1" minlength="1" pattern="^[a-zA-Z0-9_.-]*$" required value = "<?php echo $year; ?>">
                          <div class="invalid-feedback">Please enter your year.</div>
                        </div>     

                        <div class="form-group">                               
                            <label>Gender</label>
                                <div class="row">
                                    <div class="col-sm-10">
                                        <div class="form-check">
                                          <input class="form-check-input" type="radio" name="gender" id="gender" required value="Male"<?php if($gender == 'Male'){ echo "checked";} ?>>
                                          <div class="invalid-feedback">Please Select your Gender.</div>
                                            <label>Male</label>
                                          </div>
                                          <div class="form-check">
                                            <input class="form-check-input" type="radio" name="gender" id="gender" required value="Female" <?php if($gender == 'Female'){ echo "checked";}?> >
                                            <div class="invalid-feedback">Please Select your Gender.</div>
                                            <label>Female</label>
                                          </div>
                                      </div>
                                    </div>                            
                               </div>  

                          <div class="form-group">
                                    <?php 
                                        $drop_down_array = ['BE' => 'BE', 'ME' => 'ME', 'MCA' => 'MCA', 'MBA' => 'MBA'];
                                    ?>
                                  <label>Department</label>
                                  <select type="text" name="department" class="form-control" required>
								  	                    <option>--Select--</option>
                                            <?php 
										                            foreach($drop_down_array as $key => $value) {
										                          	  if ($dept == $key) {
											                            	echo "<option value=".$key." selected='selected'>".$value."</option>";
										                            	} else {
											                          	echo "<option value=".$key.">".$value."</option>";
										                            	}
										                            }
                                          	?>
                                  </select>                              
                            </div>  

                           <div class="form-group">
                              <label>Phone</label>
                                <input type="text" name="phone" placeholder="Phone" class="form-control" maxlength="10" minlength="10" pattern="^[0-9_.-]*$" required value = "<?php echo $phone; ?>">  
                              <div class="invalid-feedback">Please enter your valid phone number .</div>                          
                          </div>
                          <div class ="form-grop">
                             <label>Upload Image</label><br>
                                <input type="file" id="image" class="form-control" class="form-control" name="image">
                             <br>
                           </div>  
                           
                          <div class="form-group">
                              <tr><input type="submit" name="update" class="btn btn-success" value="Update">
                              </tr>
                              <td><a class="btn btn-danger" href="view.php">Cancel</a></td></tr>
                          </div>
                      </form>
                      <script>
        // Self-executing function
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
          header('Location:view.php');
    }
  }
?>
