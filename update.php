
<?php
//print_r($_POST);
if (isset($_POST['update'])){
  
 $user_id = $_POST['update_id'];
  

// $servername = "localhost";
// $username = "root";
// $password = "password";
// $dbname = "task";


$reg=$_POST['register'];
$name=$_POST['name'];
$age=$_POST['age'];
$year=$_POST['year'];
$gender=$_POST['gender'];
$dep=$_POST['department'];
$phone=$_POST['phone'];
$img=$_POST['image'];

// Create connection
$conn = new mysqli("localhost","root","password","task");
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "UPDATE  details SET std_regno = '$reg', std_name = '$name', std_age = '$age', std_year = '$year', std_gender = '$gender', std_department = '$dep', std_phone = '$phone', std_image = '$img' 
    WHERE id = '$user_id'";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
  header('Location:view.php');
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
}
?>