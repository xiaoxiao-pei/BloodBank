
<?php
require('../db.php');
include("../auth.php");
// include('../queryFunctions.php');

include("headerAdmin.html");

?>


<section class="h-100 gradient-form">
    <div class=" py-5 h-100 mx-10">
        <div class="row d-flex justify-content-center align-items-center h-100 mx-5">
            <div class="col-md-10 col-lg-8 ">
                <div class="card rounded-3 text-black">
                    <div class="row  g-0">

                        <h4 class="my-3 text-center">Donations</h4>
                        <div class="text-center pb-3 ">
                            <button class="addBtn px-3 py-2" onclick="location.href = 'addDonation.php'"> Add New</button>
                        </div>



                        <table class="table table-responsive mx-auto mb-4 queryTable">
                            <tr>
                                <th>DonationID</th>
                                <th>DonorID</th>
                                <th>Blood Amount</th>
                                <th>Donate Date</th>
                                <th></th>
                                <th></th>
                            </tr>

                            <?php
                            $sel_query = "SELECT * FROM donations";
                            $result = mysqli_query($con, $sel_query);
                            while ($row = mysqli_fetch_assoc($result)) { ?>
                                <tr>
                                    <td><?php echo $row["DonationID"]; ?></td>
                                    <td>
                                       <a href="viewDonorByID.php?donorID=<?php echo $row["DonorID"]; ?>"><?php echo $row["DonorID"]; ?></a>
                                    </td>
                                    <td><?php echo $row["BloodAmount"]; ?></td>
                                    <td><?php echo $row["DonateDate"]; ?></td>
                                    <td>
                                        <a href="editDonation.php?DonationID=<?php echo $row["DonationID"]; ?>">Edit</a>
                                    </td>
                                    <td>
                                        <a href="deleteDonation.php?DonationID=<?php echo $row["DonationID"]; ?>">Delete</a>
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

</section>


<?php
include("../footer.html");
?>