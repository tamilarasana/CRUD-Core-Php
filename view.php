<?php
    include "config.php ";
  	if(isset($_GET['page'])){
		$page = $_GET['page'];
		}else{
			$page = 1;
		}
		$num_per_page = 05;
		$start_from = ($page-1)*05;
    $sql = "SELECT * FROM  student_details  limit $start_from, $num_per_page";
    $result = $conn->query($sql);    
?>
<!DOCTYPE html>
<html>
    <head>
    <title>Student details</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> 
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
              				
    </head>
    <?php if(isset($_SESSION['status_delete'])){ ?>
            <div class="alert alert-danger" role="alert">
               <button type="button" class="close" data-dismiss="alert">&times;</button>
               <b class="text-center"><?= $_SESSION['status_delete'];?></b>
               </div>
             <?php } unset($_SESSION['status_delete']);?>  
        <body>      
        <?php if(isset($_SESSION['status_code'])){ ?>
            <div class="alert alert-success" role="alert">
               <button type="button" class="close" data-dismiss="alert">&times;</button>
               <b class="text-center"><?= $_SESSION['status_code'];?></b>
               </div>
             <?php } unset($_SESSION['status_code']);?>     
        <h2 style="text-align:center;">Student Details </h2>    
            <form class="" action="" method="get" autocomplete="off">  
               <?php if(isset($_GET['success'])){?>
                  <p class="text-success"><?php echo$_GET['success'];?></p>
                  <?php }?> 
                <nav class="navbar navbar-default">
                  <div class="container-fluid" style="margin: 10px auto">
                    <div class="nav navbar-left">               
                      <a class="btn btn-success" href="details.php">Create</a>
                    </div>
                    <div class="nav navbar-right">               
                      <a class="btn btn-warning" href="logout.php?logout">Logout</a>
                    </div>             
                  </div>
                </nav>
                  <div class="col-md-12 ">
                  <table class="table table-striped table-hover">
                        <thead class="bg-primary">
                          <tr>
                          <th>Register Number</th>
                          <th>Student Name</th>
                          <th>Age</th>
                          <th>Year</th>
                          <th>Gender</th>
                          <th>Department</th>
                          <th>Phone Number</th>
                          <th>Image</th>
                          <th>Action</th>
                          </tr>
                        </thead>
                      <tbody>
                          <?php 
                          if($result ->num_rows > 0){
                          while($row = $result->fetch_assoc()){
                          ?>
                        <tr>
                            <td><?php echo $row['std_regno']; ?></td>
                            <td><?php echo $row['std_name']; ?></td>
                            <td><?php echo $row['std_age']; ?></td>
                            <td><?php echo $row['std_year']; ?></td>
                            <td><?php echo $row['std_gender']; ?></td>
                            <td><?php echo $row['std_department']; ?></td>
                            <td><?php echo $row['std_phone']; ?></td>
                            <td><img src = "uploads/<?php echo $row['std_image']; ?>" width ="70" > </td>                                        
                            <div class="form-group">
                            <td>                                                
                              <a class="btn btn-success" onClick="editMe(<?php  echo  $row['id'];?>)"> Edit</a>
                              <a class="btn btn-danger" onClick="deleteMe(<?php  echo  $row['id'];?>)"> Delete</a>                                       
                            </td>
                          </tr>                                                                                   
                        <?php
                          }                                                                    
                          }
                          ?>                   
                        </tr>                     
                      </tbody>
                    </table>
                      <?php
                        $pr_query = "SELECT * FROM student_details";
                        $result = $conn->query($pr_query);
                        $totalrecord =mysqli_num_rows($result);
                        $totalpages = ceil( $totalrecord/$num_per_page);
                      ?>
                      <ul class="pagination pagination-lg">
                        <?php for($i=1; $i<=$totalpages;$i++) echo "<li><a href='view.php?page=".$i."'>$i</a></li>" ?>
                      </ul> 					
                      </div>
                      </div>
                </form>
                  <script>
                        function  deleteMe(delid) {
                          if(confirm("Do you want Delete!")){
                            window.location.href='delete.php?id='+delid+'';
                            return true;
                          }
                        }

                        function  editMe(editid) {
                          if(confirm("Do you want Edit Your Data !")){
                            window.location.href='edit.php?id='+editid+'';
                            return true;
                          }
                        }
                    </script>       
            </div>    
                    
      </body>
      
</html>