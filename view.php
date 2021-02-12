
<?php
     $conn = new mysqli("localhost","root","password","task");
        // Check connection
        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT * FROM details";

    $result = $conn->query($sql);

?>


<!DOCTYPE html>
<html>
    <head>
        <title>details</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    </head>
        <body>
           
            <h2 style="text-align:center;">Details </h2>
            <nav class="navbar navbar-inverse">
                <div class="container-fluid">
                <ul class="nav navbar-nav navbar-right">
                <li> <a class="btn btn-danger" href="details.php">Back</a></li>
                </ul>
               
                </div>
            </nav>
             <form class="" action="" method="get" autocomplete="off">                 
        
               </form>
                        <div class="container">
                        <table class="table table-responsive">
                        <thead>
                        <tr>
                            <th>Register Number</th>
                            <th>Name</th>
                            <th>Age</th>
                            <th>Year</th>
                            <th>Gender</th>
                            <th>Department</th>
                            <th>Phone Number</th>
                            <th>Image</th>
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
                                        <td><img src = "<?php echo $row['std_image']; ?>" width ="70" > </td>                                        
                                        <div class="form-group">
                                        <td>
                                       
                                        <a class="btn btn-success"href = "edit.php?id=<?php  echo  $row['id'];?>"> Edit</a>
                                        <a class="btn btn-danger" href = "delete.php?id=<?php  echo  $row['id'];?>"> Delete</a>                                       
                                        </td>
                                      </tr>                    
                                    <?php
                                      }                                                                    
                                }
                            ?>             
                                                 
                            </tr>                     
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>