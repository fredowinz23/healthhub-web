<?php
  $ROOT_DIR="../";
  include $ROOT_DIR . "templates/header.php";

$patientId = $_GET["patientId"];

$doctor_list = account()->list("role='Doctor'");

$symptom_list = symptom()->list();
$department_list = department()->list();

?>

<br>

<div class="card">
  <div class="card-header">
    <h1>Patient Information Form</h1>
  </div>
  <div class="card-body">

    <form method="post" action="process.php?action=new-medical-record">

        <input type="hidden" name="patientId" value="<?=$patientId?>">

        <div class="row">
          <div class="col">


                <div class="form-group">
                    <th class="left-label">Doctor</th>
                    <select class="form-control" name="doctorId" required>
                      <option value="">--Select Doctor--</option>
                      <?php foreach ($doctor_list as $row):
                        $specialty = specialty()->get("Id=$row->drSpecialtyId");
                         ?>
                        <option value="<?=$row->Id?>">Dr. <?=$row->firstName;?> <?=$row->firstName;?> - <?=$specialty->name;?></option>
                      <?php endforeach; ?>
                    </select>

                </div>
          </div>

            <div class="col">


                  <div class="form-group">
                      <th class="left-label">Department</th>
                      <select class="form-control" name="departmentId" required>
                        <option value="">--Select Department--</option>
                        <?php foreach ($department_list as $row):
                           ?>
                          <option value="<?=$row->Id?>"><?=$row->name;?></option>
                        <?php endforeach; ?>
                      </select>

                  </div>
            </div>

            <div class="col">


              <div class="form-group">
                  <label for="medications">Room:</label>
                  <input type="text" name="room" class="form-control" required>
              </div>


            </div>

        </div>

            <div class="form-group">
                <label for="reasonForAdmission">Reason for Admission:</label>
                <textarea class="form-control" id="reasonForAdmission" name="reasonForAdmission" rows="4"></textarea>
            </div>

            <div class="form-group">
                <label for="allergies">Allergies:</label>
                <textarea class="form-control" id="allergies" name="allergies" rows="4"></textarea>
            </div>

            <div class="form-group">
                <label for="medications">Medications:</label>
                <textarea class="form-control" id="medications" name="medications" rows="4"></textarea>
            </div>

        <div class="form-section">
            <h2>Blood Type</h2>
            <label for="bloodType">Blood Type:</label>
            <select class="form-control" id="bloodType" name="bloodType" required>
                <option value="">Select Blood Type</option>
                <option value="Blood Type A+">Blood Type A+</option>
                <option value="Blood Type O+">Blood Type O+</option>
                <option value="Blood Type B+">Blood Type B+</option>
                <option value="Blood Type AB+">Blood Type AB+</option>
                <option value="Blood Type A-">Blood Type A-</option>
                <option value="Blood Type O-">Blood Type O-</option>
                <option value="Blood Type B-">Blood Type B-</option>
                <option value="Blood Type AB-">Blood Type AB-</option>
            </select>
        </div>

        <div class="form-section">
            <h2>General Assessment</h2>
            <!-- Add fields for general assessment here -->
        </div>

        <div class="form-section">
            <h2>Presenting Symptoms/Complaints</h2>

            <select class="form-control" name="symptomId" required>
              <option value="">--Select Symptoms--</option>
              <?php foreach ($symptom_list as $row):
                 ?>
                <option value="<?=$row->Id?>"><?=$row->name;?></option>
              <?php endforeach; ?>
            </select>
        </div>

        <div class="form-section">
            <label for="Doctors orders">Doctors Orders</label>
            <textarea class="form-control" id="Doctors Orders" name="doctorsOrders" rows="4" required></textarea>

            <br>
        </div>
        <button class="btn btn-primary" type="submit">Submit</button>
    </form>

  </div>
</div>

<?php include $ROOT_DIR . "templates/footer.php"; ?>
