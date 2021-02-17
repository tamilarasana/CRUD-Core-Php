
<?php
  include "config.php ";
  
   if (isset($_GET['id'])){
        $user_id = $_GET['id'];

       $sql = "DELETE FROM  details  WHERE id = '$user_id'";


       $result = $conn->query($sql);
       
       if ($result == TRUE){
           echo "Record  deleted Successfully";
           //echo '<script>alert("delete the data")</script>';
            
           header('Location:view.php');
       }else{
           echo "Error:" . $sql ."<br>". $conn->error;
       }
   
}
?>
