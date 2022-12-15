<?php
require('../db.php');
include("../auth.php");

$DonorID = $_GET['DonorID'];
$query = "SELECT * FROM `donor` WHERE DonorID = '" . $DonorID . "'";
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

                                $DonorID = $_REQUEST['donorId'];
                                $username = $_REQUEST['username'];
                                $firstName = $_REQUEST['firstName'];
                                $lastName = $_REQUEST['lastName'];
                                $bloodType = $_REQUEST['bloodType'];
                                $phoneNumber = $_REQUEST['phoneNumber'];
                                $email = $_REQUEST['email'];
                                $address = $_REQUEST['address'];
                                $postcode = $_REQUEST['postcode'];
                                $notes = $_REQUEST['notes'];

                                $update = "update donor set Username='" . $username . "', Password='" . $password . "', FirstName='" . $firstName . "', LastName='" . $lastName . "', BloodType='" . $bloodType . "', PhoneNumber='" . $phoneNumber . "', Email='" . $email . "', address='" . $address . "', postcode='" . $postcode . "', Notes='" . $notes . "' WHERE DonorID='" . $DonorID . "'";

                                mysqli_query($con, $update) or die(mysqli_connect_error());

                                $status = "Record Updated Successfully. </br></br><a href='viewDonor.php'>View Updated Record</a>";
                                echo '<p style="color:#FF0000; text-align: center;">' . $status . '</p>';
                            } else {
                            ?>
                                <h2 class="text-uppercase text-center ">Update Donor</h2>
                                <div class="form">
                                    <form action="" method="post" name="update">
                                        <input type="hidden" name="new" value="1" />

                                        <input name="donorId" type="hidden" value="<?php echo $row['DonorID']; ?>" />

                                        <div class="form-outline mb-4">
                                            <input type="username" class="form-control form-control-lg" name="username" id="username" placeholder="Update Username" value="<?php echo $row['Username']; ?>" />
                                        </div>

                                        <div class="form-outline mb-4">
                                            <input type="text" class="form-control form-control-lg" name="firstName" id="firstName" placeholder="First Name" value="<?php echo $row['FirstName']; ?>" />
                                        </div>

                                        <div class="form-outline mb-4">
                                            <input type="text" class="form-control form-control-lg" name="lastName" id="lastName" placeholder="Last Name" value="<?php echo $row['LastName']; ?>" />
                                        </div>

                                        <div class="form-outline mb-4">
                                            <input type="text" class="form-control form-control-lg" name="bloodType" id="bloodType" placeholder="Blood Type" value="<?php echo $row['BloodType']; ?>" />
                                        </div>
                                        <div class="form-outline mb-4">
                                            <input type="text" class="form-control form-control-lg" name="phoneNumber" id="phoneNumber" placeholder="Phone Number" value="<?php echo $row['PhoneNumber']; ?>" />
                                        </div>
                                        <div class="form-outline mb-4">
                                            <input type="text" class="form-control form-control-lg" name="email" id="email" placeholder="Email" value="<?php echo $row['Email']; ?>" />
                                        </div>
                                        <div class="form-outline mb-4">
                                            <input type="text" class="form-control form-control-lg" name="address" id="address" placeholder="Address" value="<?php echo $row['address']; ?>" />
                                        </div>
                                        <div class="form-outline mb-4">
                                            <input type="text" class="form-control form-control-lg" name="postcode" id="postcode" placeholder="Postal Code" value="<?php echo $row['postcode']; ?>" />
                                        </div>
                                        <div class="form-outline mb-4">
                                            <input type="text" class="form-control form-control-lg" name="notes" id="notes" placeholder="Notes" value="<?php echo $row['Notes']; ?>" />
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