<?php
require('../db.php');
include("../auth.php");

include("headerAdmin.html");

?>

<body class="bodyDonor">
    <?php
    // success message
    if (!session_id()) session_start();
    $successMsg = false;
    if (!isset($_SESSION['successMsg'])) {
        $_SESSION['successMsg'] = $successMsg;
    }

    ?>
    <?php

    function test_input($data)
    {
        $data = trim($data);
        $data = htmlspecialchars($data);
        $data = addslashes($data);
        return $data;
    }

    $donationidErr = $donoridErr  = $bloodAmountErr = $donationDateErr = '';
    $showGoback = false;

    // If form submitted, insert values into the database.
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $validate = true;
        if (empty($_POST["donationid"])) {
            $validate = false;
            $donationidErr = "donationid is required";
        } else {
            $donationid = test_input($_POST["donationid"]);
            if (!preg_match("/^[0-9]{11}$/", $donationid)) {
                $validate = false;
                $donationidErr = "Donation ID must be 11 digits";
            }
        }

        if (empty($_POST["donorid"])) {
            $validate = false;
            $donoridErr = "Donor ID is required";
        } else {
            $donorid = test_input($_POST["donorid"]);
            if (!preg_match("/^[0-9]{6}$/", $donorid)) {
                $validate = false;
                $donoridErr = "Donor ID must be 6 digits";
            }
        }

        if (empty($_POST["bloodAmount"])) {
            $validate = false;
            $bloodAmountErr = "Blood amount is required";
        } else {
            $bloodAmount = test_input($_POST["bloodAmount"]);
            if (!preg_match("/^(4[0-9]{2}|500)$/", $bloodAmount)) {
                $validate = false;
                $bloodAmountErr = "Blood amount should between 400ml to 500ml";
            }
        }

        if (empty($_POST["donationDate"])) {
            $validate = false;
            $donationDateErr = "Donate date is required";
        } else {
            $donationDate = test_input($_POST["donationDate"]);
        }



        if ($validate) {
            // add a new record to donation table
            $query = "INSERT into `donations` (DonationID, DonorID, BloodAmount, DonateDate) 
                        VALUES ('$donationid', '$donorid', '$bloodAmount', '$donationDate')";

            $result = mysqli_query($con, $query);
            if ($result) {
                $_SESSION['successMsg'] = true;

                // add this blood amount to blood table
                $query = "UPDATE blood 
                SET BloodVolume = BloodVolume + $bloodAmount
                where BloodType IN (
                    SELECT BloodType
                    FROM  donor
                    WHERE DonorID = '$donorid'
                )";
                $result = mysqli_query($con, $query);
                $showGoback = true;
            }
        }
    }
    ?>
    <section class="vh-100">
        <div class="mask d-flex align-items-center h-100 ">
            <div class="container h-100 my-5">
                <div class="row d-flex justify-content-center align-items-center h-100 ">
                    <div class="col-12 col-md-9 col-lg-7 col-xl-6 ">
                        <div class="card" style="border-radius: 15px;">
                            <div class="card-body p-5">

                                <h2 class="text-uppercase text-center mb-5">Create a new Donation</h2>
                                <div class="text-center pb-3 ">
                                    <button class="addBtn px-3 py-2" onclick="location.href ='ViewDonation.php'" style="display:<?php echo $showGoback ? 'block' : 'none' ?>"> Go Back</button>
                                </div>
                                <div class="form">
                                    <form action="" method="post" name="createDonation">

                                        <div class="form-outline mb-4">

                                            <input type="text" name="donationid" class="form-control form-control-lg" placeholder="Donation ID" value="<?= (isset($donationid)) ? $donationid : ''; ?>" />
                                            <span class="error" style="color:#FF0000;"><?php echo $donationidErr; ?></span> <br />

                                        </div>

                                        <div class="form-outline mb-4">
                                            <input type="text" class="form-control form-control-lg" name="donorid" placeholder="Donor ID" value="<?= (isset($donorid)) ? $donorid : ''; ?>" />
                                            <span class="error" style="color:#FF0000;"><?php echo $donoridErr; ?></span> <br />
                                        </div>

                                        <div class="form-outline mb-4">
                                            <input type="text" class="form-control form-control-lg" name="bloodAmount" placeholder="Blood Amount" value="<?= (isset($bloodAmount)) ? $bloodAmount : ''; ?>" />
                                            <span class="error" style="color:#FF0000;"><?php echo $bloodAmountErr; ?></span> <br />
                                        </div>

                                        <div class="form-outline mb-4">
                                            <input type="date" class="form-control form-control-lg" name="donationDate" placeholder="Donation Date" value="<?= (isset($donationDate)) ? $donationDate : ''; ?>" />
                                            <span class="error" style="color:#FF0000;"><?php echo $donationDateErr; ?></span> <br />
                                        </div>



                                        <div class="d-flex justify-content-center d-inline">
                                            <input type="submit" value="Register">
                                            &nbsp&nbsp&nbsp
                                            <div>
                                                <img src="../images/logo3.jpg" style="border-radius: 5px; width: 50px; height: 50px; ">
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-center d-inline mt-3">

                                            <?php if ($_SESSION['successMsg'] && $_SERVER["REQUEST_METHOD"] == "POST") {
                                                echo "<h4>Successful created!<h4>";
                                                $_SESSION['successMsg'] = false;
                                            } elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
                                                echo "<h4>Unsuccessful adding a new donation, please try again.<h4>";
                                            }
                                            ?>

                                        </div>
                                    </form>
                                </div>
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