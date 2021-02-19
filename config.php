<?php
    $conn = new mysqli("localhost","root","password","task");   
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
?>