<!DOCTYPE html>
<html lang="en">

<head>
  <title>Mosaic Blood Bank</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/styles.css">
  <link rel="icon" type="image/x-icon" href="/images/pixelHeart2.png">
</head>

<body>
  <?php
  require('db.php');
  session_start();
  // If form submitted, insert values into the database.
  if (isset($_POST['username'])) {
    // removes backslashes
    $username = stripslashes($_REQUEST['username']);
    //escapes special characters in a string
    $username = mysqli_real_escape_string($con, $username);
    $password = stripslashes($_REQUEST['password']);
    $password = mysqli_real_escape_string($con, $password);
    //Checking is user existing in the database or not
    echo $username . $password;
    $query = "SELECT * FROM `admin` WHERE Username='$username' and Password='" . md5($password) . "'";
    $result = mysqli_query($con, $query) or die(mysqli_error($con));
    $rows = mysqli_num_rows($result);


    if ($rows == 1) {
      //login as admin
      $_SESSION['username'] = $username;
      header("Location: admin/dashboardAdmin.php");
    } else {

      $query = "SELECT * FROM `donor` WHERE Username='$username' and Password='" . md5($password) . "'";
      $result = mysqli_query($con, $query);
      $rows = mysqli_num_rows($result);

      if ($rows == 1) {
        //login as donor
        $_SESSION['username'] = $username;
        header("Location: dashboardDonor.php");
      } else {

        $query = "SELECT * FROM `doctor` WHERE Username='$username' and Password='" . md5($password) . "'";
        $result = mysqli_query($con, $query);
        $rows = mysqli_num_rows($result);

        if ($rows == '1') {
          //login as doctor
          $_SESSION['username'] = $username;
          header("Location: dashboardDoctor.php");
        } else {
          echo "<div class='form'><h3>Username/password is incorrect.</h3><br/>Click here to <a href='login.php'>Login</a></div>";
        }
      }
    }
  }
  ?>

  <section class="h-100 gradient-form">
    <div class="container py-5">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-xl-12">
          <div class="card rounded-3 text-black" >
            <div class="row g-0">
              <div class="col-lg-6">
                <div class="card-body p-md-5 mx-md-4" >
                  <div class="text-center">
                    <img src="images/pixelHeart.png" style="width: 80%;" alt="logo">
                    <h4 class="boldTitle">
                      Welcome to Mosaic Blood Bank
                    </h4>
                  </div>

                  <form action="" method="post" name="login">
                    <p style="padding:5px; font-size: 130%; font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
                    letter-spacing: 1px; text-shadow:1px 1px rgba(0, 0, 0, 0.133)">
                      Please log in to your account
                    </p>

                    <div class="form-outline mb-4">
                      <label class="form-label" for="form2Example11" style="font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif; font-size: 115%;
                      letter-spacing: 1px; text-shadow:1px 1px rgba(0, 0, 0, 0.133)">
                        Username
                      </label>
                      <input type="text" id="form2Example11" name="username" class="form-control" placeholder="username" />
                    </div>

                    <br>

                    <div class="form-outline mb-4">
                      <label class="form-label" for="form2Example22" style="font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif; font-size: 115%;
                      letter-spacing: 1px; text-shadow:1px 1px rgba(0, 0, 0, 0.133)">
                        Password
                      </label>
                      <input type="password" name="password" id="form2Example22" class="form-control" placeholder="password" />
                    </div>

                    <br>

                    <div class="text-center pt-1 mb-5 pb-1">
                      <input class="btn btn-primary btn-block fa-lg bt btn-primary mb-3 gradient-custom-3" style="width:100%; font-family:Verdana, Geneva, Tahoma, sans-serif; letter-spacing:50%; font-size: 125%;
                      border: none; text-shadow:1px 1px rgba(0, 0, 0, 0.133)" type="submit" type="submit" value="Login">
                      <button type="button">
                        <b>Log in</b>
                      </button>

                      <a style="font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
                      text-decoration: none; color:#4c5af0; font-size: 110%; letter-spacing: 1px; text-shadow:1px 1px rgba(0, 0, 0, 0.133)" href="#!">
                        Forgot password?
                      </a>
                    </div>

                    <div class="d-flex align-items-center justify-content-center pb-4">
                      <p class="mb-0 me-2">
                        Are you a doctor?
                      </p>

                      <a href="registrationDoctor.php">
                        <img alt="doc image" src="images/doc1.png" width="50" height="50">
                      </a>
                    </div>

                    <div class="d-flex align-items-center justify-content-center pb-4">
                      <p class="mb-0 me-2">
                        Are you a donor?
                      </p>
                      <a href="registrationDonor.php">
                        <img alt="blood icon" src="images/blood1.png" width="50" height="50">
                      </a>
                    </div>
                  </form>
                </div>
              </div>
              <div class="col-lg-6 d-flex align-items-center gradient-custom-3">
                <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                  <h4 class="mb-4 boldTitle">
                    Give blood, save a life
                  </h4>
                  <p class="small mb-0 boldTitle" style="font-size: 125%;">
                    The Mosaic Blood Bank is committed to making blood transfusions more accessible for all. Your donation could save a life!
                  </p>
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