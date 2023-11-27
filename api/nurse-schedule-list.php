<?php
include "../templates/api-header.php";

$json = array();
$success = false;
$schedule_list = array();
if (isset($_POST["username"])) {
  $success = true;
  $username = $_POST["username"];
  $user = user()->get("username='$username'");

  $schedule_list = array();

  foreach (schedule()->list("nurseId=$user->Id") as $sched) {
    $response = array();
    $response["id"] = $sched->Id;
    $response["nurseId"] = $sched->nurseId;
    $response["date"] = $sched->startDate;
    $response["shift"] = $sched->shift;
    $response["status"] = "On Duty";
    array_push($schedule_list, $response);
  }

}

$json["username"] = $_POST["username"];
$json["schedule_list"] = $schedule_list;
$json["success"] = $success;


header('Content-Type: application/json; charset=utf-8');
echo json_encode($json);
?>
