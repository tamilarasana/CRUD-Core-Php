<?php


$conn = new mysqli("localhost","root","password","task");
   // Check connection
   if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}



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
              <div class="container">
                <div class="row">
                  <div class="col-md-3">
                    <form class="" action="update.php" method="post" autocomplete="off">
                      <div class="form-group">
                              <label>Register Number</label>
                              <input type="text" name="register"  placeholder="Register Number" class="form-control"  value = "<?php echo $reg; ?>">
                              <input type="hidden" name="update_id"  placeholder="Register Number" class="form-control"  value = "<?php echo $id; ?>">

                                                                            
                          </div>
                          <div class="form-group">
                              <label>Name</label>
                              <input type="text" name="name" placeholder="Name" class="form-control"  value = "<?php echo $name; ?>">                          
                          </div>
                          <div class="form-group">
                              <label>Age</label>
                              <input type="text" name="age" placeholder="Age" class="form-control"  value = "<?php echo $age; ?>">                          
                          </div>
                          <div class="form-group">
                              <label>Year</label>
                              <input type="text" name="year" placeholder="Year" class="form-control"  value = "<?php echo $year; ?>">
                          </div>    
                        <div class="form-group">                               
                            <label>Gender</label>
                                <div class="row">
                                    <div class="col-sm-10">
                                        <div class="form-check">
                                          <input class="form-check-input" type="radio" name="gender" id="gender" value="Male"<?php if($gender == 'Male'){ echo "checked";} ?>>
                                            <label>Male</label>
                                          </div>
                                          <div class="form-check">
                                            <input class="form-check-input" type="radio" name="gender" id="gender" value="Female" <?php if($gender == 'Female'){ echo "checked";}?> >
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
                                  <select type="text" name="department" class="form-control">
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
                              <input type="text" name="phone" placeholder="Phone" class="form-control" value = "<?php echo $phone; ?>">                            
                          </div>
                          <div class ="form-grop">
                          <label>Upload Image</label><br>
                          <input type="file" id="image" class="form-control" class="form-control" name="image" value = "<?php echo $img; ?>">
                          <br>
                          </div>                      
                          <div class="form-group">
                          <tr><input type="submit" name="update" class="btn btn-success" value="Update">
                              </tr>
                              <td><a class="btn btn-danger" href="view.php">Cancel</a></td></tr>
                          </div>
                      </form>
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
