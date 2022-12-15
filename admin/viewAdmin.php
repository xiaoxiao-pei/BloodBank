<?php
require('../db.php');
include("../auth.php");

$username = $_SESSION['username'];
$query = "SELECT * FROM `admin` WHERE Username = '" . $username . "'";
$result = mysqli_query($con, $query) or die(mysqli_connect_error());
$row = mysqli_fetch_assoc($result);


include("headerAdmin.html");

?>


<section class="h-100 gradient-form">
    <div class=" py-5 h-100 mx-10">
        <div class="row d-flex justify-content-center align-items-center h-100 mx-5">
            <div class="col-md-10 col-lg-8 ">
                <div class="card rounded-3 text-black">
                    <div class="row  g-0">

                        <h4 class="my-4 text-center">Welcome <?php echo $username?></h4>

                        <table class="table table-responsive mx-auto mb-4 queryTable">
                            <tr>
                                <th>Username</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Tel</th>
                                <th>Email</th>
                                <th></th>
                                <th></th>
                            </tr>
                            <tr>
                                <td><?php echo $row["Username"]; ?></td>
                                <td><?php echo $row["FirstName"]; ?></td>
                                <td><?php echo $row["LastName"]; ?></td>
                                <td><?php echo $row["PhoneNumber"]; ?></td>
                                <td><?php echo $row["Email"]; ?></td>
                                <td>
                                    <a href="editAdmin.php?Username=<?php echo $row["Username"]; ?>">Edit</a>
                                </td>
                            </tr>

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