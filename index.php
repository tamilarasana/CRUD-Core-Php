
<?php
 include "config.php "; 
$name_error ='';
$password_error = '';

if(isset($_POST['login']))
{ 
    if(empty($_POST['username'])){
      $name_error = "<p>Please Enter Your Name</p>";      
    // header("Location:index.php?Empty=Please Enter  Username and Password ");
    }
     if(empty($_POST['password'])){
      $password_error ="<p>Please Enter Your Password</p>";
    
     } else {
           $query = "select * from login where username = '".$_POST['username']."' and password = '".$_POST['password']."'";
           $result = mysqli_query($conn,$query);
           if(mysqli_fetch_assoc($result))
           {
              $_SESSION['User']=$_POST['username'];
            header("Location:details.php");
            }else{            
             header("location:index.php?Invalid=Username or Password Incorect");
             }
          }       
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel ="stylesheet" href="style.css">
  </head>
      <?php 
        if(@$_GET['Empty']==true){
          ?> <div class="alert warning" style="width: 50%; margin: 0 auto">
          <span class="closebtn">&times;</span>  
          <strong>Warning!</strong> <?php echo $_GET['Empty']?>
        </div>
      <?php
     }
    ?>
  <?php 
  if (@$_GET['Invalid']==true) {
  ?> <div class="alert danger" style="width: 50%; margin: 0 auto">
  <span class="closebtn">&times;</span>  
  <strong>Warning!</strong> <?php echo $_GET['Invalid']?>
  </div>
  <?php
  }
  ?>

</head>
  <body>
      <div class="container col-4 py-4  my-4  ">
      <div class="card justify-content-center ">
      <div class="card-header text-center text-info">
      <h2 class="py-2">Login</h2>
      </div>
      <form class="" action = ""  method="POST" >   
            <div class="card-body">
              <div class="mb-15">
                  <div class="form-group row">
                    <label class="col-lg-3 col-form-label">User Name:</label>
                        <div class="col-lg-6">
                          <input type="text" name="username" class="form-control" placeholder="Enter name"/>
                          <!-- <span class="form-text text-muted">Please enter your name</span> -->
                          <span class ="text-danger"><?php echo $name_error;?></span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-lg-3 col-form-label">Password:</label>
                        <div class="col-lg-6">
                          <input type="password" name = "password" class="form-control" placeholder="Enter Password"/>
                          <!-- <span class="form-text text-muted">We'll never share your Password with anyone else</span> -->
                          <span class ="text-danger"><?php echo $password_error;?></span>    
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="card-footer">
                    <div class="row">
                      <div class="col-lg-4"></div>
                        <div class="col-lg-6">
                        <button type="submit" name="login"  class="btn btn-success mr-2">Login</button>
                        <button type="reset" class="btn btn-secondary">Cancel</button>
                    </div>
                </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script>
      var close = document.getElementsByClassName("closebtn");
      var i;
      for (i = 0; i < close.length; i++) {
          close[i].onclick = function(){
          var div = this.parentElement;
          div.style.opacity = "0";
          setTimeout(function(){ div.style.display = "none"; }, 600);
        }
      }
    </script>
  </body>
</html>













