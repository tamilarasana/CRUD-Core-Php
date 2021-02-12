
<?php
     $conn = new mysqli("localhost","root","password","task");
        // Check connection
        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
   if (isset($_GET['id'])){
        $user_id = $_GET['id'];

       $sql = "DELETE FROM  details  WHERE id = '$user_id'";


       $result = $conn->query($sql);
       
       if ($result == TRUE){
           echo "Record  deleted Successfully";
           header('Location:view.php');
       }else{
           echo "Error:" . $sql ."<br>". $conn->error;
       }
   }
?>