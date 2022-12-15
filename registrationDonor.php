<!DOCTYPE html>
<html lang="en">

<head>
    <title>Donor's Registration</title>
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

    $usernameErr = $passwordErr  = $retypePasswordErr = $firstnameErr =  $lastnameErr = $bloodtypeErr = $emailErr = $phonenumberErr  = $addressErr = $postalCodeErr = '';

    // If form submitted, insert values into the database.
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $validate = true;
        if (empty($_POST["username"])) {
            $validate = false;
            $usernameErr = "username is required";
        } else {
            $username = test_input($_POST["username"]);
            if (!preg_match("/^[A-Za-z\d@$!%*?&]{3,}$/", $username)) {
                $validate = false;
                $usernameErr = "Username must be at least 6 characters";
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
                $retypePasswordErr = "Password must be same";
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

        if (empty($_POST["bloodtype"])) {
            $validate = false;
            $bloodtypeErr = "Bloodtype is required";
        } else {
            $bloodtype = test_input($_POST["bloodtype"]);
        }

        if (empty($_POST["phonenumber"])) {
            $validate = false;
            $phonenumberErr = "Phone number is required";
        } else {
            $phonenumber = test_input($_POST["phonenumber"]);
            if (!preg_match("/^[0-9]{1,15}$/", $phonenumber)) {
                $validate = false;
                $phoneErr = "Phone number entry should start with a '+' followed by up to 15 digits";
            }
        }


        if (empty($_POST["email"])) {
            $validate = false;
            $emailErr = "Email is required";
        } else {
            $email = test_input($_POST["email"]);
            if (!preg_match("/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/", $email)) {
                $validate = false;
                $emailErr = "The email entry must follow a valid email format ('@' and '.' chars)";
            }
        }



        if (empty($_POST["address"])) {
            $validate = false;
            $addressErr = "Address is required";
        } else {
            $address = test_input($_POST["address"]);
            if (!preg_match("/^\d+\s?[\w]+$/", $address)) {
                $validate = false;
                $addressErr = "Must start with street number followed by street name.";
            }
        }

        if (empty($_POST["postalCode"])) {
            $validate = false;
            $postalCodeErr = "Postal code is required";
        } else {
            $postalCode = test_input($_POST["postalCode"]);
            if (!preg_match("/^[A-Z]{1}[0-9]{1}[A-Z]{1}(\s){1}[0-9]{1}[A-Z]{1}[0-9]{1}$/", $postalCode)) {
                $validate = false;
                $postalCodeErr = "Must enter a valid Canadian postal code.";
            }
        }

        if (!empty($_POST["notes"])) {
            $notes = test_input($_POST["notes"]);
        } else {
            $notes = '';
        }


        if ($validate) {
            $query = "INSERT into `donor` (username, password, firstname, lastname, bloodtype, phonenumber, email, address, postalcode, notes) 
                        VALUES ('$username', '" . md5($password) . "', '$firstname', '$lastname', '$bloodtype', '$phonenumber', '$email', '$address', '$postalCode', '$notes')";

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

                                <h2 class="text-uppercase text-center mb-5">Create a donor's account</h2>
                                <div class="form">
                                    <form action="" method="post" name="registration">

                                        <div class="form-outline mb-4">

                                            <input type="text" name="username" id="username" class="form-control form-control-lg" placeholder="Username" value="<?= (isset($username)) ? $username : ''; ?>" />
                                            <span class="error" style="color:#FF0000;"><?php echo $usernameErr; ?></span> <br />

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
                                            <label class="form-label" for="bloodtype">Blood Type: &nbsp &nbsp &nbsp</label>
                                            <select name="bloodtype" id="bloodtype" required>
                                                <option value="A">A</option>
                                                <option value="Aplus">A+</option>
                                                <option value="B">B</option>
                                                <option value="Bplus">B+</option>
                                                <option value="O">O</option>
                                                <option value="Oplus">O+</option>
                                                <option value="AB">AB</option>
                                                <option value="ABplus">AB+</option>
                                            </select>
                                        </div>

                                        <div class="form-outline mb-4">
                                            <input type="text" class="form-control form-control-lg" name="phonenumber" id="phonenumber" placeholder="Phone Number" value="<?= (isset($phonenumber)) ? $phonenumber : ''; ?>" />
                                            <span class="error" style="color:#FF0000;"><?php echo $phonenumberErr; ?></span> <br />
                                        </div>

                                        <div class="form-outline mb-4">
                                            <input type="text" class="form-control form-control-lg" name="email" id="email" placeholder="Email" value="<?= (isset($email)) ? $email : ''; ?>" />
                                            <span class="error" style="color:#FF0000;"><?php echo $emailErr; ?></span> <br />
                                        </div>
                                        <div class="form-outline mb-4">
                                            <input type="text" class="form-control form-control-lg" name="address" id="address" placeholder="Address" value="<?= (isset($address)) ? $address : ''; ?>" />
                                            <span class="error" style="color:#FF0000;"><?php echo $addressErr; ?></span> <br />
                                        </div>
                                        <div class="form-outline mb-4">
                                            <input type="text" class="form-control form-control-lg" name="postalCode" id="postalCode" placeholder="Postal Code" value="<?= (isset($postalCode)) ? $postalCode : ''; ?>" />
                                            <span class="error" style="color:#FF0000;"><?php echo $postalCodeErr; ?></span> <br />
                                        </div>

                                        <div class="form-outline mb-4">
                                            <textarea class="form-control form-control-lg" name="notes" cols="30" rows="5" placeholder="Notes"></textarea>
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