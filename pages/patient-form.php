<?php
  $ROOT_DIR="../";
  include $ROOT_DIR . "templates/header.php";
?>

<br>

<div class="card">
  <div class="card-header">
    <h1>Patient Information Form</h1>
  </div>
  <div class="card-body">


  <form id="patientInfoForm" method="post" action="process.php?action=new-patient">
      <div class="form-group">
          <label for="fullName">Full Name:</label>
          <input class="form-control" type="text" id="fullName" name="fullName" required>
      </div>

      <div class="form-group">
          <label for="dob">Date of Birth:</label>
          <input class="form-control" type="date" id="dob" name="dob" required>
      </div>

      <div class="form-group">
          <label>Gender:</label>
          <select class="form-control" name="gender" required>
            <option value="">--Select--</option>
            <option>Male</option>
            <option>Female</option>
          </select>
      </div>

      <h2>Contact Information:</h2>
      <div class="form-group">
          <label for="address">Address:</label>
          <input class="form-control" type="text" id="address" name="address" required>
      </div>

      <div class="form-group">
          <label for="city">City:</label>
          <input class="form-control" type="text" id="city" name="city" required>
      </div>
      <div class="form-group">
          <label for="phoneNumber">Phone Number:</label>
          <input class="form-control" type="tel" id="phoneNumber" name="phoneNumber" required>
      </div>

      <div class="form-group">
          <label for="email">Email Address:</label>
          <input class="form-control" type="text" id="email" name="email" required>
      </div>

      <h2>Emergency Contact:</h2>
      <div class="form-group">
          <label for="emergencyContactName">Name:</label>
          <input class="form-control" type="text" id="emergencyContactName" name="emergencyContactName" required>
      </div>

      <div class="form-group">
          <label for="relationship">Relationship:</label>
          <input class="form-control" type="text" id="relationship" name="relationship" required>
      </div>

      <div class="form-group">
          <label for="emergencyPhoneNumber">Phone Number:</label>
          <input class="form-control" type="text" id="emergencyPhoneNumber" name="emergencyPhoneNumber" required>
      </div>

      <h2>Insurance Information (if applicable):</h2>
      <div class="form-group">
          <label for="insuranceProvider">Insurance Provider:</label>
          <input class="form-control" type="text" id="insuranceProvider" name="insuranceProvider">
      </div>

      <div class="form-group">
          <label for="policyNumber">Policy Number:</label>
          <input class="form-control" type="text" id="policyNumber" name="policyNumber">
      </div>

      <div class="form-group">
          <label for="groupNumber">Group Number:</label>
          <input class="form-control" type="text" id="groupNumber" name="groupNumber">
      </div>

      <div class="form-group">
          <label for="subscriberName">Subscriber Name:</label>
          <input class="form-control" type="text" id="subscriberName" name="subscriberName">
      </div>

      <div class="form-group">
          <label for="subscriberDob">Subscriber Date of Birth:</label>
          <input class="form-control" type="date" id="subscriberDob" name="subscriberDob">
      </div>

      <div class="form-group">
          <label for="subscriberId">Subscriber ID:</label>
          <input class="form-control" type="text" id="subscriberId" name="subscriberId">
      </div>


      <div class="form-group">
          <button class="btn btn-primary mt-3" type="submit">Submit and Proceed</button>
      </div>
  </form>


  </div>
</div>

<?php include $ROOT_DIR . "templates/footer.php"; ?>
