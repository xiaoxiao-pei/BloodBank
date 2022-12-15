<?php
require('../db.php');
$DoctorId = $_GET['DoctorID'];

//delete record from donations
$query = "DELETE FROM doctor WHERE DoctorId='" . $DoctorId . "'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error($con));

header("Location: viewDoctor.php"); 
?>