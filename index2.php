
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
<html>
  <head>
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
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
      <h2 style="text-align:center;">Login</h2>
        <div class="container">
          <div class="row">
            <div class="col"></div>
              <div class="col col-md-3">
                 <div class="content">						
                    <form class="" action = ""  method="POST" >                          
                        <div class="form-group">
                            <label>User Name</label>
                            <input type="type" name="username" class="form-control" >
                            <span class ="text-danger"><?php echo $name_error;?></span>
                          </div>
                          <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" >    
                            <span class ="text-danger"><?php echo $password_error;?></span>                                                                           
                          </div>                        
                          <div class="form-group">
                            <input type="submit" name="login" class="btn btn-success" value="login">
                            <a class="btn btn-danger" href="index.php">Cancel</a>
                          </div>
                      </form>
                   </div>
               </div>
              <div class="col"></div>
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