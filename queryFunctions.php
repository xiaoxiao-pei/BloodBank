<?php

// get blood volume for $bloodType
function getBloodVolume($bloodType)
{
    global $con;
    $sel_query = "Select * from blood where BloodType = '$bloodType';";
    $result = mysqli_query($con, $sel_query);
    $row = mysqli_fetch_assoc($result);
    return $row['BloodVolume'];
}

// get blood donation records for $bloodType
function getBloodDonation($bloodType)
{
    global $con;
    $sel_query = "Select * from donations 
    INNER JOIN donor ON donations.DonorID = donor.DonorID
    where BloodType = '$bloodType';";
    $result = mysqli_query($con, $sel_query);
    return $result;
}

?>