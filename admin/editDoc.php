<?php
require('../db.php');
include("../auth.php");

$DoctorId = $_GET['DoctorID'];
$query = "SELECT * FROM `doctor` WHERE DoctorId = '" . $DoctorId . "'";
$result = mysqli_query($con, $query) or die(mysqli_connect_error());
$row = mysqli_fetch_assoc($result);


include("headerAdmin.html");
?>

<section>
    <div class="mask d-flex align-items-center">
        <div class="container  my-5">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                    <div class="card" style="border-radius: 15px;">
                        <div class="card-body p-5">
                            <?php
                            $status = "";
                            if (isset($_POST['new']) && $_POST['new'] == 1) {

                                $DoctorId = $_REQUEST['doctorId'];
                                $firstName = $_REQUEST['firstname'];
                                $lastName = $_REQUEST['lastname'];
                                $role = $_REQUEST['role'];

                                $update = "update doctor set DoctorId='" . $DoctorId . "', FirstName='" . $firstName . "', LastName='" . $lastName . "', Role='" . $role . "' WHERE DoctorId='" . $DoctorId . "'";

                                $result = mysqli_query($con, $update) or die(mysqli_connect_error());

                                $status = "Record Updated Successfully. </br></br><a href='viewDoctor.php'>Go back to view doctor info</a>";
                                echo '<p style="color:#FF0000; text-align: center;">' . $status . '</p>';
                            } else {
                            ?>
                                <h2 class="text-uppercase text-center ">Update Doctor</h2>
                                <div class="form">
                                    <form action="" method="post" name="update">
                                        <input type="hidden" name="new" value="1" />

                                        <div class="form-outline mb-4">
                                            <input type="text" class="form-control form-control-lg" name="doctorId" id="doctorId" placeholder="Update Doctor ID" value="<?php echo $row['DoctorId']; ?>" />
                                        </div>

                                        <div class="form-outline mb-4">
                                            <input type="text" class="form-control form-control-lg" name="firstname" id="firstname" placeholder="First Name" value="<?php echo $row['FirstName']; ?>" />
                                        </div>

                                        <div class="form-outline mb-4">
                                            <input type="text" class="form-control form-control-lg" name="lastname" id="lastname" placeholder="Last Name" value="<?php echo $row['LastName']; ?>" />
                                        </div>

                                        <div class="form-outline mb-4">
                                            <input type="text" class="form-control form-control-lg" name="role" id="role" placeholder="Role" value="<?php echo $row['Role']; ?>" />
                                        </div>
                                        <div class="d-flex justify-content-center d-inline">
                                            <input type="submit" name="submitUpdate" class="px-3" value="Update">
                                            &nbsp&nbsp&nbsp
                                            <div>
                                                <img src="../images/logo3.jpg" style="border-radius: 5px; width: 50px; height: 50px; ">
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            <?php } ?>
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