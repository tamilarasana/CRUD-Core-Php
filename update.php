
<?php
  include "config.php ";
// print_r($_POST); die;
if (isset($_POST['update'])){  
  
    $user_id = $_POST['update_id'];
    $reg      =$_POST['register'];
    $name     =$_POST['name'];
    $age      =$_POST['age'];
    $year     =$_POST['year'];
    $gender   =$_POST['gender'];
    $dep      =$_POST['department'];
    $phone    =$_POST['phone'];

    // var_dump($_FILES['image']); die;

    $image    =$_FILES['image']['name'];
    // var_dump($image); die;

    $imageArr=explode('.',$image); //first index is file name and second index file type
    $rand=rand(10000,99999);
    $newImageName=$imageArr[0].$rand.'.'.$imageArr[1];
    $uploadPath="uploads/".$newImageName;
    $isUploaded=move_uploaded_file($_FILES["image"]["tmp_name"],$uploadPath);
    if($isUploaded) 
      echo 'successfully file uploaded';
    else
    echo 'something went wrong';   

    $sql = "UPDATE  details SET std_regno = '$reg', std_name = '$name', std_age = '$age', std_year = '$year', std_gender = '$gender', std_department = '$dep', std_phone = '$phone', std_image ='$uploadPath'
          WHERE id = '$user_id'";
        // print_r($sql);die;

    if ($conn->query($sql) === TRUE) {
          // echo '<script>alert("Updata Successfully")</script>';
          header('Location:view.php');
        } else {
          echo '<script>alert("Please update your data")</script>';
        }

    $conn->close();
}
?>