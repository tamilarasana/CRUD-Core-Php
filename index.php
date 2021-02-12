<!DOCTYPE html>
<html>
<?php
     if(isset($_POST["login"])){
       $name=$_POST["username"];
       $pass=$_POST["passowrd"];
       $con=mysqli_connect("localhost","root","password");
       mysqli_select_db($con,"task");
       $result =mysqli_query($con,"select * from task.login");
       while($row = mysqli_fetch_array($result)){
            $user_name =$row['user_name'];
            $password =$row['password'];
            if($user_name == $name && $password == $pass){
              echo "SuccessFull login";
              header("location:details.php");
            }
            else{
              echo "Phono and password incorrect ";
            }
         }
     }
?>



    <head>
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

     <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
    <h2 style="text-align:center;">Login</h2>      
     </div>        
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="content">
						
                        <form class=""  method="get" >
                            <div class="form-group">
                                <label>User Name</label>
                                    <input type="type" name="username" class="form-control" />
                                 </div>
                            <div class="form-group">
                                <label>Password</label>
                                    <input type="password" name="password" class="form-control" />
                                                                               
                            </div>
                        
                            <div class="form-group">
                                <input type="submit" name="login" class="btn btn-success" value="Login" />
                                <!-- <a class="btn btn-danger" href="/">Cancel</a> -->
                            </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </body>
    
</html>