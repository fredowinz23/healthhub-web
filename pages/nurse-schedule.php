<?php
  $ROOT_DIR="../";
  include $ROOT_DIR . "templates/header.php";

  $userId = $user["Id"];
  $nurse_list = account()->list("nHeadNurseId=$userId");
?>

<table class="table">
  <thead>
    <tr>
      <th scope="col">Nurse</th>
      <th scope="col">Shift</th>
      <th scope="col">Sun</th>
      <th scope="col">Mon</th>
      <th scope="col">Tue</th>
      <th scope="col">Wed</th>
      <th scope="col">Thu</th>
      <th scope="col">Fri</th>
      <th scope="col">Sat</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $count = 0;
    foreach ($nurse_list as $row):
      $count += 1;
      $countSun = "<span style='color:red'>Off</span>";
      $countMon = "<span style='color:red'>Off</span>";
      $countTue = "<span style='color:red'>Off</span>";
      $countWed = "<span style='color:red'>Off</span>";
      $countThu = "<span style='color:red'>Off</span>";
      $countFri = "<span style='color:red'>Off</span>";
      $countSat = "<span style='color:red'>Off</span>";
      if (strpos($row->daysOfWork, 'Sun') !== false) {
        $countSun = "Duty";
      }
      if (strpos($row->daysOfWork, 'Mon') !== false) {
        $countMon = "Duty";
      }
      if (strpos($row->daysOfWork, 'Tue') !== false) {
        $countTue = "Duty";
      }
      if (strpos($row->daysOfWork, 'Wed') !== false) {
        $countWed = "Duty";
      }
      if (strpos($row->daysOfWork, 'Thu') !== false) {
        $countThu = "Duty";
      }
      if (strpos($row->daysOfWork, 'Fri') !== false) {
        $countFri = "Duty";
      }
      if (strpos($row->daysOfWork, 'Sat') !== false) {
        $countSat = "Duty";
      }
       ?>
       <tr>
         <td><b><?=$row->firstName;?> <?=$row->lastName;?></b></td>
         <td><?=$row->shift;?></td>
         <td><?=$countSun?></td>
         <td><?=$countMon?></td>
         <td><?=$countTue?></td>
         <td><?=$countWed?></td>
         <td><?=$countThu?></td>
         <td><?=$countFri?></td>
         <td><?=$countSat?></td>
       </tr>

    <?php endforeach; ?>
  </tbody>
</table>


<?php include $ROOT_DIR . "templates/footer.php"; ?>
