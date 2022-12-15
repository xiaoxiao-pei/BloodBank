<?php

require('db.php');
// include("auth.php");

$username = 'donor1';
// $username = $_REQUEST['Username'];
$query = "SELECT * FROM `donor` WHERE Username = '" . $username . "'";
$result = mysqli_query($con, $query) or die(mysqli_connect_error());
$row = mysqli_fetch_assoc($result);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>View Records</title>
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
                                <h2 class="text-uppercase text-center ">Account Details</h2>
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <hr style="height: 3px;">
                                    </thead>
                                    <tbody class="text-center">
                                        <tr>
                                            <th>Doctor ID</th>
                                            <td><?php echo $row['DonorID']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>First Name</th>
                                            <td><?php echo $row['Username']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Last Name</th>
                                            <td><?php echo $row['FirstName']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Speciality</th>
                                            <td><?php echo $row['LastName']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Doctor ID</th>
                                            <td><?php echo $row['BloodType']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>First Name</th>
                                            <td><?php echo $row['PhoneNumber']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Last Name</th>
                                            <td><?php echo $row['Email']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Speciality</th>
                                            <td><?php echo $row['address']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>First Name</th>
                                            <td><?php echo $row['postcode']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Last Name</th>
                                            <td><?php echo $row['Notes']; ?></td>
                                        </tr>

                                    </tbody>
                                    
                                </table>
                                <div class="text-center"><a href="editDonorInfo.php">Edit</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <footer>
    </footer>

</body>

</html>