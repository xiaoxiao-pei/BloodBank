
<?php
require('../db.php');
include("../auth.php");

include("headerAdmin.html");

?>


<section class="h-100 gradient-form">
    <div class=" py-5 h-100 mx-10">
        <div class="row d-flex justify-content-center align-items-center h-100 mx-5">
            <div class="col-md-10 col-lg-8 ">
                <div class="card rounded-3 text-black">
                    <div class="row  g-0">

                        <h4 class="my-4 text-center">Donors</h4>

                        <div class="table-responsive">
                            <table class="table table-responsive mx-auto mb-4 queryTable">
                            <tr>
                                <th>Donor ID</th>
                                <th>Username</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Blood Type</th>
                                <th>Phone Number</th>
                                <th>Email</th>
                                <th>Notes</th>
                                <th></th>
                                <th></th>
                            </tr>

                            <?php
                            $sel_query = "SELECT * FROM donor";
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
                                    <td><?php echo $row["Notes"]; ?></td>
                                    <td>
                                        <a href="editDonor.php?DonorID=<?php echo $row["DonorID"]; ?>">Edit</a>
                                    </td>
                                    <td>
                                        <a href="deleteDonor.php?DonorID=<?php echo $row["DonorID"]; ?>">Delete</a>
                                    </td>
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
    </div>

</section>


<?php
include("../footer.html");
?>