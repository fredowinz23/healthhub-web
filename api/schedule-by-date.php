<?php
include "../templates/api-header.php";

$json = array();
$success = false;
$response = "";
$status = "OFF";
if (isset($_POST["date"])) {
  $success = true;
  $date = $_POST["date"];
  $username = $_POST["username"];
  $user = user()->get("username='$username'");
  $checkScheduleExist = schedule()->count("startDate='$date' and nurseId=$user->Id");
  if ($checkScheduleExist > 0) {
    $sched = schedule()->get("startDate='$date' and nurseId=$user->Id");
    $response = array();
    $response["id"] = $sched->Id;
    $response["nurseId"] = $sched->nurseId;
    $response["date"] = $sched->startDate;
    $response["shift"] = $sched->shift;
    $json["schedule"] = $response;
    $status = "On Duty";
  }
}

$json["username"] = $_POST["username"];
$json["date"] = $_POST["date"];
$json["success"] = $success;
$json["status"] = $status;


header('Content-Type: application/json; charset=utf-8');
echo json_encode($json);
?>
