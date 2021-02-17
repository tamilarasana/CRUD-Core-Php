<?php
         include "config.php "; 
            if(isset($_POST["login"])) {
            $user=$_POST["username"];
            $pass=$_POST["password"];

            $sql  = mysqli_query($conn, "SELECT * FROM  login WHERE  username= '".$user."' and password='".$pass."' ") or die(mysqli_error($conn));

            $rw = mysqli_fetch_array($sql);
            if($rw['login'] > 0){
                echo"success";
            }else{
                echo"wrong";
            }

        }

?>











<?php
    if(isset($_POST["login"])) {
         $user=$_POST["username"];
         $pass=$_POST["password"];
             $conn=mysqli_connect("localhost","root","password");
                mysqli_select_db($conn,"task");
            $result =mysqli_query($conn,"select * from task.login where username ='$user' and  password = '$pass'")
                 or  die("failed to query". mysql_error());         
         $row = mysqli_fetch_array($result);
              if($row['username'] == $user &&  $row['password']== $pass ){          
              echo "SuccessFull login"; 
              header("location:details.php");           
            }
            else{
              echo "Username and password incorrect ";
              header("location:index.php");
            }
         }
?>
<?php
    if(isset($_POST["login"])) {
         $user=$_POST["username"];
         $pass=$_POST["password"];
             $conn=mysqli_connect("localhost","root","password");
                mysqli_select_db($conn,"task");
            $result =mysqli_query($conn,"select * from task.login where username ='$user' and  password = '$pass'")
                 or  die("failed to query". mysql_error());         
         $row = mysqli_fetch_array($result);
              if($row['username'] == $user &&  $row['password']== $pass ){          
              echo "SuccessFull login"; 
              header("location:details.php");           
            }
            else{
              // header("location:index.php");
              echo '<script>alert("USername or Password Incorrect")</script>';
            }
         }
?>