
<?php
 include "config.php ";
    if (isset($_GET['id'])){
        $user_id = $_GET['id'];        
        $sql =  "SELECT * FROM  details WHERE id ='$user_id'";
        $result = $conn->query($sql);
        $row = mysqli_fetch_array($result);  
        $deleteable_img  = $row['std_image'];       
        if(!empty($deleteable_img)){
            unlink($deleteable_img);
            header('Location:view.php');            
        }
        $delete_sql  = "DELETE FROM  details  WHERE id = '$user_id'";
        if(mysqli_query($conn,$delete_sql)){
            header('Location:view.php');
        } 
    }
?>

    

 
   
   
              
     
