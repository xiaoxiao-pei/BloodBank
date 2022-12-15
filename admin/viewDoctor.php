
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

                        <h4 class="my-4 text-center">Doctors</h4>

                        <table class="table table-responsive mx-auto mb-4 queryTable">
                            <tr>
                                <th>Doctor ID</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Role</th>
                                <th></th>
                                <th></th>
                            </tr>

                            <?php
                            $sel_query = "SELECT * FROM doctor";
                            $result = mysqli_query($con, $sel_query);
                            while ($row = mysqli_fetch_assoc($result)) { ?>
                                <tr>
                                    <td><?php echo $row["DoctorId"]; ?></td>
                                    <td><?php echo $row["FirstName"]; ?></td>
                                    <td><?php echo $row["LastName"]; ?></td>
                                    <td><?php echo $row["Role"]; ?></td>
                                    <td>
                                        <a href="editDoc.php?DoctorID=<?php echo $row["DoctorId"]; ?>">Edit</a>
                                    </td>
                                    <td>
                                        <a href="deleteDoc.php?DoctorID=<?php echo $row["DoctorId"]; ?>">Delete</a>
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