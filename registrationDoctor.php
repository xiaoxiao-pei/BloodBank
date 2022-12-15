<!DOCTYPE html>
<html lang="en">

<head>
    <title>Doctor's Registration</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">

</head>

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
    require('db.php');

    function test_input($data)
    {
        $data = trim($data);
        $data = htmlspecialchars($data);
        $data = addslashes($data);
        return $data;
    }

    $doctorIdErr = $passwordErr  = $retypePasswordErr = $firstnameErr =  $lastnameErr = $roleErr = '';

    // If form submitted, insert values into the database.
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $validate = true;

        if (empty($_POST["doctorId"])) {
            $validate = false;
            $doctorIdErr = "Doctor ID is required";
        } else {
            $doctorId = test_input($_POST["doctorId"]);
            if (!preg_match("/^[\d]{3,}+$/", $doctorId)) {
                $validate = false;
                $doctorIdErr = "Doctor ID must be at least 3 integers long.";
            }
        }

        if (empty($_POST["password"])) {
            $validate = false;
            $passwordErr = "password is required";
        } else {
            $password = test_input($_POST["password"]);
            if (!preg_match("/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-])[A-Za-z\d@$!%*?&]{6,}$/", $password)) {
                $validate = false;
                $passwordErr = "Password should be at least 6 chars and include exactly one special character, one uppercase letter  one lowercase letter and one digit";
            }
        }

        if (empty($_POST["retypePassword"])) {
            $validate = false;
            $retypePasswordErr = "Please retype the password";
        } else {
            $retypePassword = test_input($_POST["retypePassword"]);
            if ($retypePassword != $password) {
                $validate = false;
                $retypePasswordErr = "Password must be same.";
            }
        }

        if (empty($_POST["firstname"])) {
            $validate = false;
            $firstnameErr = "Firstname is required";
        } else {
            $firstname = test_input($_POST["firstname"]);
            if (!preg_match("/^([a-z]|[A-Z]){3,}$/", $firstname)) {
                $validate = false;
                $firstnameErr = "Firstname must be at least 3 chars and all in letters";
            }
        }

        if (empty($_POST["lastname"])) {
            $validate = false;
            $lastnameErr = "Lastname is required";
        } else {
            $lastname = test_input($_POST["lastname"]);
            if (!preg_match("/^([a-z]|[A-Z]){3,}$/", $lastname)) {
                $validate = false;
                $lastnameErr = "Lastname must be at least 3 chars and all in letters";
            }
        }

        if (empty($_POST["role"])) {
            $validate = false;
            $roleErr = "Profession required";
        } else {
            $role = test_input($_POST["role"]);
            if (!preg_match("/^([a-z]|[A-Z]){4,}$/", $role)) {
                $validate = false;
                $roleErr = "Invalid role length, must have a minimum of four characters long.";
            }
        }

        if ($validate) {
            $query = "INSERT into `doctor` (doctorid, password, firstname, lastname, role) 
                        VALUES ('$doctorId', '" . md5($password) . "', '$firstname', '$lastname', '$role')";

            $result = mysqli_query($con, $query);
            if ($result) {
                $_SESSION['successMsg'] = true;
            }
        }
    }
    ?>
    <section class="vh-100" style="display:<?php echo $hideform ? 'none' : 'block' ?>">
        <div class="mask d-flex align-items-center h-100 ">
            <div class="container h-100 my-5">
                <div class="row d-flex justify-content-center align-items-center h-100 ">
                    <div class="col-12 col-md-9 col-lg-7 col-xl-6 ">
                        <div class="card" style="border-radius: 15px;">
                            <div class="card-body p-5">

                                <h2 class="text-uppercase text-center mb-5">Create a doctor's account</h2>
                                <div class="form">
                                    <form action="" method="post" name="registration">

                                        <div class="form-outline mb-4">

                                            <input type="text" name="doctorId" id="doctorId" class="form-control form-control-lg" placeholder="Doctor Identification Number" value="<?= (isset($doctorId)) ? $doctorId : ''; ?>" />
                                            <span class="error" style="color:#FF0000;"><?php echo $doctorIdErr; ?></span> <br />

                                        </div>

                                        <div class="form-outline mb-4">
                                            <input type="password" class="form-control form-control-lg" name="password" id="password" placeholder="Password" value="<?= (isset($password)) ? $password : ''; ?>" />
                                            <span class="error" style="color:#FF0000;"><?php echo $passwordErr; ?></span> <br />
                                        </div>

                                        <div class="form-outline mb-4">
                                            <input type="password" class="form-control form-control-lg" name="retypePassword" id="retypePassword" placeholder="Retype Password" value="<?= (isset($retypePassword)) ? $retypePassword : ''; ?>" />
                                            <span class="error" style="color:#FF0000;"><?php echo $retypePasswordErr; ?></span> <br />
                                        </div>

                                        <div class="form-outline mb-4">
                                            <input type="text" class="form-control form-control-lg" name="firstname" id="firstname" placeholder="First Name" value="<?= (isset($firstname)) ? $firstname : ''; ?>" />
                                            <span class="error" style="color:#FF0000;"><?php echo $firstnameErr; ?></span> <br />

                                        </div>

                                        <div class="form-outline mb-4">
                                            <input type="text" class="form-control form-control-lg" name="lastname" id="lastname" placeholder="Last Name" value="<?= (isset($lastname)) ? $lastname : ''; ?>" />
                                            <span class="error" style="color:#FF0000;"><?php echo $lastnameErr; ?></span> <br />
                                        </div>
                                        <div class="form-outline mb-4">
                                            <input type="text" class="form-control form-control-lg" name="role" id="role" placeholder="Role" value="<?= (isset($role)) ? $role : ''; ?>" />
                                            <span class="error" style="color:#FF0000;"><?php echo $roleErr; ?></span> <br />
                                        </div>
                                        <div class="d-flex justify-content-center d-inline">
                                            <input type="submit" class="btn btn-secondary btn-block btn-lg gradient-custom-4 text-body" value="Register">
                                            &nbsp&nbsp&nbsp
                                            <div>
                                                <img src="images/logo3.jpg" style="border-radius: 5px; width: 50px; height: 50px; ">
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-center d-inline mt-3">

                                            <?php if ($_SESSION['successMsg'] && $_SERVER["REQUEST_METHOD"] == "POST") {
                                                echo "<h4>Successful Registration, thank you!<h4>";
                                                $_SESSION['successMsg'] = false;
                                            } elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
                                                echo "<h4>Unsuccessful registration, please try again.<h4>";
                                            }
                                            ?>

                                        </div>

                                        <p class="text-center text-muted mt-5 mb-0">Have already an account? <a href="index.php" class="fw-bold text-body"><u>Login here</u></a>
                                        </p>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>