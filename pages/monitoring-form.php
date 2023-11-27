<?php
  $ROOT_DIR="../";
  include $ROOT_DIR . "templates/header.php";

  $mrId = $_GET["mrId"];
?>

<br>

<div class="card">
  <div class="card-header">
    <h1>Monitoring Details</h1>
  </div>
  <div class="card-body">

    <form method="post" action="process.php?action=new-monitoring">
        <input type="hidden" name="mrId" value="<?=$mrId?>">
        <div class="form-section">
            <div class="form-subsection">
                <h3>Vital Signs</h3>
                <label for="temperature">Temperature:</label>
                <input class="form-control" type="Text" id="temperature" name="temperature" required>
                <br>
                <label for="bloodPressure">Blood Pressure:</label>
                <input class="form-control" type="text" id="bloodPressure" name="bloodPressure" required>
                <br>
                <label for="respiratoryRate">Respiratory Rate:</label>
                <input class="form-control" type="Text" id="respiratoryRate" name="respiratoryRate" required>
                <br>
                <label for="oxygen">Oxygen (O₂):</label>
                <input class="form-control" type="text" id="oxygen" name="oxygen" required>
                <br>
                <label for="Cardiac Rate">Cardiac Rate</label>
                <input class="form-control" type="text" id="Cardiac Rate" name="cardiacRate" required>
            </div>
            <label for="medications">Medications:</label>
            <textarea class="form-control" id="medications" name="medications" rows="4" required></textarea>
            <br>
            <label for="observations">Observations:</label>
            <textarea class="form-control" id="observations" name="observations" rows="4" required></textarea>
        </div>

        <div class="form-section">
            <h2>Recommendations</h2>
            <label for="recommendations">Recommendations:</label>
            <textarea class="form-control" id="recommendations" name="recommendations" rows="4" required></textarea>
        </div>
        <div class="form-group">
            <button class="btn btn-primary mt-3" type="submit">Submit and Proceed</button>
        </div>
    </form>
  </div>
</div>

<?php include $ROOT_DIR . "templates/footer.php"; ?>
