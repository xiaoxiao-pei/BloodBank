<?php

require('db.php');
// include("auth.php");

$DoctorId = '5001';
// $DoctorId = $_REQUEST['DoctorId'];
$query = "SELECT * FROM `doctor` WHERE DoctorId = '" . $DoctorId . "'";
$result = mysqli_query($con, $query) or die(mysqli_connect_error());
$row = mysqli_fetch_assoc($result);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Mosaic Blood Bank Doctor Portal</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/stylesDashboard.css">
    <link rel="icon" type="image/x-icon" href="/images/lightGreenHeart.jpg" style="border-radius: 5px;">

    <style>
        table.right {
            width: 25%;
            position: absolute;
            right: 0%;
        }

        table.right td {
            width: 33.33%;
            text-align: center;
            padding: 5px;
        }

        table.left {
            width: 15%;
            position: absolute;
            left: 0%;
        }

        table.left td {
            width: 50%;
            text-align: left;
            padding: 5px;
        }

        .bannerLink {
            color: white;
            text-decoration: none;
        }

        .gradient-custom-3 {
            background: linear-gradient(to right, #f36b74, #f371ae, #f07bbb, #c58ff1, #7d87f1);
        }

        body {
            background-color: #f2f3fa;
            margin: 0px;
            padding: 0px;
        }
    </style>
</head>

<body>

    <header class="p-3 bgHeader text-white">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start" style="height:75px;">
                <table class="left">
                    <tr>
                        <td>
                            <a href="#">
                                <img src="images/pixelHeartWhiteBG.png" alt="Mosaic Blood Bank" style="height: 85px;">
                            </a>
                        </td>
                        <td>
                            <button type="button" class="btn btn-outline-light">Logout</button>
                        </td>
                    </tr>
                </table>

                <table class="right">
                    <tr>
                        <td>
                            <a href="#" class="bannerLink">Dashboard</a>
                        </td>
                        <td>
                            <a href="#" class="bannerLink">Account Information</a>
                        </td>
                        <td>
                            <a href="#" class="bannerLink">Technical Assistance</a>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </header>
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
                                    $password = md5($_REQUEST['password']);
                                    $firstName = $_REQUEST['firstname'];
                                    $lastName = $_REQUEST['lastname'];
                                    $role = $_REQUEST['role'];

                                    $update = "update doctor set DoctorId='" . $DoctorId . "', Password='" . $password . "', FirstName='" . $firstName . "', LastName='" . $lastName . "', Role='" . $role . "' WHERE DoctorId='" . $DoctorId . "'";

                                    mysqli_query($con, $update) or die(mysqli_connect_error());

                                    $status = "Record Updated Successfully. </br></br><a href='viewDoc.php'>View Updated Record</a>";
                                    echo '<p style="color:#FF0000; text-align: center;">' . $status . '</p>';
                                } else {
                                ?>
                                    <h2 class="text-uppercase text-center ">Update Account</h2>
                                    <div class="form">
                                        <form action="" method="post" name="update">
                                            <input type="hidden" name="new" value="1" />

                                            <div class="form-outline mb-4">
                                                <input type="text" class="form-control form-control-lg" name="doctorId" id="doctorId" placeholder="Update Doctor ID" value="<?php echo $row['DoctorId']; ?>" />
                                            </div>

                                            <div class="form-outline mb-4">
                                                <input type="text" class="form-control form-control-lg" name="password" id="password" placeholder="Update Password" value="<?php echo $row['Password']; ?>" />
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
                                                <input type="submit" name="submitUpdate" class="btn btn-secondary btn-block btn-lg gradient-custom-4 text-body" value="Update">
                                                &nbsp&nbsp&nbsp
                                                <div>
                                                    <img src="images/logo3.jpg" style="border-radius: 5px; width: 50px; height: 50px; ">
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
    </footer>

</body>

</html>