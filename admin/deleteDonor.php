<?php
require('../db.php');
$DonorID = $_GET['DonorID'];

//delete record from donations
$query = "DELETE FROM donor WHERE DonorID='" . $DonorID . "'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error($con));

header("Location: viewDonor.php"); 
?>