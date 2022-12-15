<?php
require('../db.php');
include("../auth.php");

include("headerAdmin.html");
?>

<section class="h-100 gradient-form">
  <div class=" py-5 h-100 mx-10">
    <div class="row d-flex justify-content-center align-items-center h-100 mx-5">
      <div class="col-md-10 col-lg-8 ">
        <div class="card rounded-3 text-black">
          <div class="row  g-0">
            <!-- leftside -->
            <div class="col-12 col-xl-6">
              <div class="card-body p-md-5 mx-md-3">
                <div class="text-center">
                  <h4 class="boldTitle">
                    Welcome! <?php echo $_SESSION["username"] ?>
                  </h4>

                  <div>
                    <button id="btnSearchBlood" class="btnAdmin btn btn-lg btn-block active my-3 py-3"> Search Blood</button><br />
                    <button id="btnViewDonor" class="btnAdmin btn  btn-lg btn-block my-3 py-3"> View Donors</button><br />
                    <button id="btnViewDonation" class="btnAdmin btn btn-lg btn-block my-3 py-3"> View Donations</button><br />
                    <button id="btnViewDoctor" class="btnAdmin btn  btn-lg btn-block my-3 py-3"> View Doctors</button>
                  </div>

                </div>


              </div>
            </div>

            <!-- rightside -->
            <div class="col-12 col-xl-6 d-flex align-items-center gradient-custom-3">
              <div class="text-white px-3 py-4 p-md-5 mx-md-3">
                <h4 class="mb-4 boldTitle">
                  Give blood,<br /> Save a life!
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




<?php
include("../footer.html");
?>