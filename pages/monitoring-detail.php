<?php
  $ROOT_DIR="../";
  include $ROOT_DIR . "templates/header.php";

  $Id = $_GET["Id"];
  $fu = follow_up()->get("Id=$Id");
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
              <div class="row">

                  <div class="col-4">
                <label for="Cardiac Rate">Time Added</label>
                <input class="form-control" type="time" name="timeAdded" value="<?=$fu->timeAdded?>" disabled>
                </div>
                <div class="col-4">
                  <label for="temperature">Temperature:</label>
                  <input class="form-control" type="number" id="temperature" name="temperature"  value="<?=$fu->temperature?>" disabled>
                </div>
                <div class="col-4">
                <label for="bloodPressure">Blood Pressure:</label>
                <input class="form-control" type="text" id="bloodPressure" name="bloodPressure"  value="<?=$fu->bloodPressure?>" disabled>
                </div>
                <div class="col-4">
              <label for="respiratoryRate">Respiratory Rate:</label>
              <input class="form-control" type="number" id="respiratoryRate" name="respiratoryRate"  value="<?=$fu->respiratoryRate?>" disabled>
              <br>
                </div>
                <div class="col-4">
              <label for="oxygen">Oxygen (O₂):</label>
              <input class="form-control" type="number" id="oxygen" name="oxygen"  value="<?=$fu->oxygen?>" disabled>
              <br>
                </div>
                <div class="col-4">
              <label for="Cardiac Rate">Cardiac Rate</label>
              <input class="form-control" type="number" id="Cardiac Rate" name="cardiacRate"  value="<?=$fu->cardiacRate?>" disabled>
              </div>
                </div>

              </div>
            <label for="medications">Medications:</label>
            <textarea class="form-control" id="medications" name="medications" rows="4" disabled><?=$fu->medications?></textarea>
            <br>
            <label for="observations">Progress Notes:</label>
            <textarea class="form-control" id="observations" name="observations" rows="4" disabled><?=$fu->observations?></textarea>
        </div>

        <div class="form-section">
            <h2>Recommendations</h2>
            <label for="recommendations">Recommendations:</label>
            <textarea class="form-control" id="recommendations" name="recommendations" rows="4" disabled><?=$fu->recommendations?></textarea>
        </div>
        <div class="form-group">
            <a href="monitoring-list.php?mrId=<?=$fu->mrId?>" class="btn btn-warning mt-3">Back</a>
        </div>
    </form>
  </div>
</div>

<?php include $ROOT_DIR . "templates/footer.php"; ?>
