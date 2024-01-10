<?php
  $ROOT_DIR="../";
  include $ROOT_DIR . "templates/header.php";

  $department_list = department()->list();
?>

<br>

<center>
<h2>Healthhub: <br>  integrated system for patient charting and nurses scheduling for hospital system</h2>
</center>

<br><br><br>
<div class="row">
  <?php foreach ($department_list as $row):
    $totalRecord = medical_record()->count("departmentId=$row->Id");
    ?>
    <div class="col-4">
      <div class="card" style="background:#5ca9f7">
        <div class="card-body text-center">
          <h1><?=$totalRecord?></h1>
          <h3><?=$row->name?></h3>
        </div>
      </div>

    </div>
  <?php endforeach; ?>
</div>


<?php include $ROOT_DIR . "templates/footer.php"; ?>
