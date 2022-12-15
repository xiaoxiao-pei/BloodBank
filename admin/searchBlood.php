<?php
require('../db.php');
include("../auth.php");
include('../queryFunctions.php');

include("headerAdmin.html");

$bloodtype = '';
$showtable = false;
$noresult = false;
if (isset($_GET['bloodtype'])) {
  $bloodtype = $_GET['bloodtype'];
  $result = getBloodDonation($bloodtype);
  if (mysqli_num_rows($result)>0 ) {
    $showtable = true;
  }else{
    $noresult = true;
  }
}
?>

<section class="h-100 gradient-form">
  <div class=" py-5 h-100 mx-10">
    <div class="row d-flex justify-content-center align-items-center h-100 mx-5">
      <div class="col-md-10 col-lg-8 ">
        <div class="card rounded-3 text-black">
          <div class="row  g-0">
              <h4 class="my-3 text-center">Blood In Stock</h4>
              <table id="TableBloodStock" class="table table-responsive mx-auto mb-4">
                <!-- table title -->
                <tr>
                  <th>Blood Type</th>
                  <th>A-</th>
                  <th>A+</th>
                  <th>B-</th>
                  <th>B+</th>
                  <th>O-</th>
                  <th>O+</th>
                  <th>AB-</th>
                  <th>AB+</th>
                </tr>

                <!-- blood volume -->
                <tr>

                  <td>Blood Volume(ml)</td>
                  <td><?php echo getBloodVolume('A-') ?></td>
                  <td><?php echo getBloodVolume('A+') ?></td>
                  <td><?php echo getBloodVolume('B-') ?></td>
                  <td><?php echo getBloodVolume('B+') ?></td>
                  <td><?php echo getBloodVolume('O-') ?></td>
                  <td><?php echo getBloodVolume('O+') ?></td>
                  <td><?php echo getBloodVolume('AB-') ?></td>
                  <td><?php echo getBloodVolume('AB+') ?></td>
                </tr>
              </table>
              <hr />

              <form method="get">
                <div class="form-outline w-100 my-4 text-center">
                  <label class="form-label" for="bloodtype">View all donations for : &nbsp</label>
                  <select name="bloodtype" id="bloodtype" required>
                    <option value=" "> </option>
                    <option value="A-" <?php echo ($bloodtype=='A-')? 'selected':''?>>A-</option>
                    <option value="A+" <?php echo ($bloodtype=='A+')? 'selected':''?>>A+</option>
                    <option value="B-" <?php echo ($bloodtype=='B-')? 'selected':''?>>B-</option>
                    <option value="B+" <?php echo ($bloodtype=='B+')? 'selected':''?>>B+</option>
                    <option value="O-" <?php echo ($bloodtype=='O-')? 'selected':''?>>O-</option>
                    <option value="O+" <?php echo ($bloodtype=='O+')? 'selected':''?>>O+</option>
                    <option value="AB-" <?php echo ($bloodtype=='AB-')? 'selected':''?>>AB-</option>
                    <option value="AB+" <?php echo ($bloodtype=='AB+')? 'selected':''?>>AB+</option>
                  </select>
                  &nbsp &nbsp
                  <input type="submit" value="View" class="py-1 px-3">
                </div>
              </form>

              <?php
              if($noresult){
                echo "<h5 class = 'text-center pb-4'>No donations for blood type $bloodtype! </h5>";
              }
              ?>

              <table class="table table-responsive mx-auto mb-4 queryTable" style="display:<?php echo $showtable ? 'block' : 'none' ?>">
                <tr>
                  <th>DonationID</th>
                  <th>Donor Name</th>
                  <th>Blood Type</th>
                  <th>Blood Amount</th>
                  <th>Donate Date</th>
                </tr>

                <?php
                if (isset($_GET['bloodtype'])) {
                  $result = getBloodDonation($_GET['bloodtype']);
                  while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                      <td ><?php echo $row["DonationID"]; ?></td>
                      <td ><?php echo $row["FirstName"] . ' ' . $row["LastName"]; ?></td>
                      <td ><?php echo $row["BloodType"]; ?></td>
                      <td ><?php echo $row["BloodAmount"]; ?></td>
                      <td ><?php echo $row["DonateDate"]; ?></td>
                    </tr>
                <?php
                  }
                }
                ?>
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