<?php
require('../db.php');
include("../auth.php");

$Username = $_GET['Username'];
$query = "SELECT * FROM `admin` WHERE Username = '" . $Username . "'";
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

                                $username = $_REQUEST['username'];
                                $password = $_REQUEST['password'];
                                $firstName = $_REQUEST['firstname'];
                                $lastName = $_REQUEST['lastname'];
                                $phoneNumber = $_REQUEST['phoneNumber'];
                                $email = $_REQUEST['email'];

                                $update = "UPDATE admin 
                                SET Username='" . $username . "', 
                                Password='" . md5($password) . "', 
                                FirstName='" . $firstName . "', 
                                LastName='" . $lastName . "', 
                                PhoneNumber='" . $phoneNumber . "',
                                Email = '".$email."'

                                WHERE Username='" . $Username . "'";

                                $result = mysqli_query($con, $update) or die(mysqli_connect_error());

                                $status = "Updated Successfully. </br></br><a href='viewAdmin.php'>Go back to view admin info</a>";
                                echo '<p style="color:#FF0000; text-align: center;">' . $status . '</p>';
                            } else {
                            ?>
                                <h2 class="text-uppercase text-center ">Update Admin</h2>
                                <div class="form">
                                    <form action="" method="post" name="update">
                                        <input type="hidden" name="new" value="1" />

                                        <div class="form-outline mb-4">
                                            <label for="username">Username</label>
                                            <input type="text" class="form-control form-control-lg" name="username" id="username" value="<?php echo $row['Username']; ?>" />
                                        </div>

                                        <div class="form-outline mb-4">
                                            <label for="password">Password</label>
                                            <input type="password" class="form-control form-control-lg" name="password" id="password" placeholder="Password"  />
                                        </div>

                                        <div class="form-outline mb-4">
                                            <input type="password" class="form-control form-control-lg" name="retypePassword" id="retypePassword" placeholder="Retype Password" />
                                        </div>

                                        <div class="form-outline mb-4">
                                            <label for="firstname">Firstname</label>
                                            <input type="text" class="form-control form-control-lg" name="firstname" id="firstname" placeholder="First Name" value="<?php echo $row['FirstName']; ?>" />
                                        </div>

                                        <div class="form-outline mb-4">
                                            <label for="lastName">LastName</label>
                                            <input type="text" class="form-control form-control-lg" name="lastname" id="lastname" placeholder="Last Name" value="<?php echo $row['LastName']; ?>" />
                                        </div>

                                        <div class="form-outline mb-4">
                                            <label for="phoneNumber">Phone Number</label>
                                            <input type="text" class="form-control form-control-lg" name="phoneNumber" id="phoneNumber"  value="<?php echo $row['PhoneNumber']; ?>" />
                                        </div>

                                        <div class="form-outline mb-4">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control form-control-lg" name="email" id="email"  value="<?php echo $row['Email']; ?>" />
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