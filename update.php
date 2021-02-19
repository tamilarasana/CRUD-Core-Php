
<?php
    include "config.php ";
    if (isset($_POST['update'])){      
        $user_id = $_POST['update_id'];
        $reg      =$_POST['register'];
        $name     =$_POST['name'];
        $age      =$_POST['age'];
        $year     =$_POST['year'];
        $gender   =$_POST['gender'];
        $dep      =$_POST['department'];
        $phone    =$_POST['phone']; 
        $image    =$_FILES['image']; 
        $tmp_name = $image['tmp_name'];
        $file_name = $image['name'];
        $old_image = $_POST['old_image'];
        if ($image['size'] > 1){
              if (file_exists($old_image) && !empty($old_image)){
                  unlink($old_image);
               }
                move_uploaded_file( $tmp_name, "uploads/".$file_name);

               $sql = "UPDATE  details SET std_regno = '$reg', std_name = '$name', std_age = '$age', std_year = '$year', std_gender = '$gender', std_department = '$dep', std_phone = '$phone', std_image ='$file_name'  WHERE id = '$user_id'"; 
               }else{
                    $sql = "UPDATE  details SET std_regno = '$reg', std_name = '$name', std_age = '$age', std_year = '$year', std_gender = '$gender', std_department = '$dep', std_phone = '$phone', WHERE id = '$user_id'";
               }

               if ($conn->query($sql) === TRUE) {         
                       header('Location:view.php');
               }else {
                    //  echo '<script>alert("Please update your data")</script>';
                     header('Location:view.php');
                }
     }
  
?>