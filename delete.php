
<?php
 include "config.php ";
    if (isset($_GET['id'])){
        $user_id = $_GET['id'];        
        $sql =  "SELECT * FROM  student_details WHERE id ='$user_id'";
        $result = $conn->query($sql);
        $row = mysqli_fetch_array($result);  
        $deleteable_img  = $row['std_image'];       
        if(!empty($deleteable_img)){
            unlink("uploads/".$deleteable_img);
             header('Location:view.php');            
        }
        $delete_sql  = "DELETE FROM  student_details  WHERE id = '$user_id'";
        if(mysqli_query($conn,$delete_sql)){
            $_SESSION['status_delete']= "Your Data is Deleted  Successfully";
            header('Location:view.php');
        } 
    }
?>

    

 
   
   
