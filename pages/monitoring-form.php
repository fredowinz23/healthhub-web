<?php
  $ROOT_DIR="../";
  include $ROOT_DIR . "templates/header.php";

  $mrId = $_GET["mrId"];
  $taskId = $_GET["taskId"];
  $task = task()->get("Id=$taskId");
?>

<br>

<div class="card">
  <div class="card-header">
    <h1>Monitoring Details</h1>
  </div>
  <div class="card-body">

    <div class="alert alert-danger" role="alert">
      <h4>
        <b>Task:</b>
        <?=$task->context;?>
      </h4>
    </div>

    <form method="post" action="process.php?action=new-monitoring">
        <input type="hidden" name="mrId" value="<?=$mrId?>">
        <input type="hidden" name="taskId" value="<?=$taskId?>">
        <div class="form-section">
            <div class="form-subsection">
            <h3>Vital Signs</h3>
              <div class="row">

                  <div class="col-4">
                <label for="Cardiac Rate">Time Monitored</label>
                <input class="form-control" type="time" name="timeAdded" required>
                </div>
                <div class="col-4">
                  <label for="temperature">Temperature: (°c)</label>
                  <input class="form-control" type="number" id="temperature" name="temperature" required>
                </div>
                <div class="col-4">
                <label for="bloodPressure">Blood Pressure: (mmHg)</label>
                <input class="form-control" type="text" id="bloodPressure" name="bloodPressure" required>
                </div>
                <div class="col-4">
              <label for="respiratoryRate">Respiratory Rate:</label>
              <input class="form-control" type="number" id="respiratoryRate" name="respiratoryRate" required>
              <br>
                </div>
                <div class="col-4">
              <label for="oxygen">Oxygen (O₂):</label>
              <input class="form-control" type="number" id="oxygen" name="oxygen" required>
              <br>
                </div>
                <div class="col-4">
              <label for="Cardiac Rate">Pulse Rate</label>
              <input class="form-control" type="number" id="Cardiac Rate" name="cardiacRate" required>
              </div>
                </div>

              </div>
            <label for="medications">Medications:</label>
            <textarea class="form-control" id="medications" name="medications" rows="4" required></textarea>
            <br>
            <label for="observations">Progress Notes:</label>
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
