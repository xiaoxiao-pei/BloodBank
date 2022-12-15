<?php
require('../db.php');
$donationID=$_REQUEST['DonationID'];

//get donorID and blood amount
$query = "SELECT * FROM donations WHERE DonationID='" . $donationID . "'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error($con));
$row = mysqli_fetch_assoc($result);
$donorid = $row['DonorID'];
$deleteAmount = $row['BloodAmount'];


//delete record from donations
$query = "DELETE FROM donations WHERE DonationID='" . $donationID . "'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error($con));

//reduce blood amount from blood table
$query = "UPDATE blood 
        SET BloodVolume = BloodVolume - $deleteAmount
        where BloodType IN (
            SELECT BloodType
            FROM  donor
            WHERE DonorID = '$donorid'
        )";
$result = mysqli_query($con, $query);


header("Location: viewDonation.php"); 
?>