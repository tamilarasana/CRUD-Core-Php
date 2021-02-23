
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
        $old_image = $file_name=  $_POST['old_image'];
        if ($image['size'] > 1){
			$tmp_name = $image['tmp_name'];
			$file_name = $image['name'];
			if (file_exists("uploads/".$old_image) && !empty("uploads/".$old_image)){
				unlink("uploads/".$old_image);
			}
			move_uploaded_file($tmp_name, "uploads/".$file_name);
     	}
		$sql = "UPDATE  details SET std_regno = '$reg', std_name = '$name', std_age = '$age', std_year = '$year', std_gender = '$gender', std_department = '$dep', std_phone = '$phone', std_image ='$file_name'  WHERE id = '$user_id'"; 
		if ($conn->query($sql) === TRUE) { 
			echo '<script>alert("Please update your data")</script>';        
			header('Location:view.php');
		}else {
			echo '<script>alert("Please update your data")</script>';
			header('Location:view.php');
		}
	}
?>