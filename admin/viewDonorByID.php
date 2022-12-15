
<?php
require('../db.php');
include("../auth.php");

include("headerAdmin.html");

$donorID = $_GET['donorID'];

?>


<section class="h-100 gradient-form ">
    <div class=" py-5 h-100 mx-10 ">
        <div class="row d-flex justify-content-center align-items-center h-100 mx-5">
            <div class="col-md-10 col-lg-8 ">
                <div class="card rounded-3 text-black">
                    <div class="row  g-0">


                        <h4 class="my-3 text-center">Donor Informaiton</h4>
                        <div class="text-center pb-3 ">
                            <button class="addBtn px-3 py-2" onclick="location.href ='ViewDonation.php'"> Go Back</button>
                        </div>


                        <table class="table table-responsive mx-auto mb-4 queryTable pb-20">
                            <tr>
                                <th>DonorID</th>
                                <th>Username</th>
                                <th>FirstName</th>
                                <th>LastName</th>
                                <th>BloodType</th>
                                <th>PhoneNumber</th>
                                <th>Email</th>
                                <!-- <th>Address</th>
                                <th>PostCode</th> -->
                                <th>Notes</th>
                            </tr>

                            <?php
                            $sel_query = "SELECT * FROM donor where DonorID = '$donorID'";
                            $result = mysqli_query($con, $sel_query);
                            while ($row = mysqli_fetch_assoc($result)) { ?>
                                <tr>
                                    <td><?php echo $row["DonorID"]; ?></td>
                                    <td><?php echo $row["Username"]; ?></td>
                                    <td><?php echo $row["FirstName"]; ?></td>
                                    <td><?php echo $row["LastName"]; ?></td>
                                    <td><?php echo $row["BloodType"]; ?></td>
                                    <td><?php echo $row["PhoneNumber"]; ?></td>
                                    <td><?php echo $row["Email"]; ?></td>
                                    <!-- <td><?php echo $row["address"]; ?></td>
                                    <td><?php echo $row["postcode"]; ?></td> -->
                                    <td><?php echo $row["Notes"]; ?></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

</section>


<?php
include("../footer.html");
?>