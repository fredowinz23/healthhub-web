<?php
include "../templates/api-header.php";

$json = array();
$success = false;
$response = "";
if (isset($_POST["username"])) {
  $username = $_POST["username"];
  $user = user()->get("username='$username'");
  $success = true;

  $model = leave_request();
  $model->obj["nurseId"] = $user->Id;
  $model->obj["startDate"] = $_POST["startDate"];
  $model->obj["endDate"] = $_POST["endDate"];
  $model->obj["leaveTypeId"] = $_POST["leaveTypeId"];
  $model->obj["reason"] = $_POST["reason"];
  $model->obj["departmentId"] = $user->departmentId;
  $model->obj["status"] = "Pending";
  $model->obj["dateAdded"] = "NOW()";
  $model->create();
}

$json["username"] = $_POST["username"];
$json["success"] = $success;


header('Content-Type: application/json; charset=utf-8');
echo json_encode($json);
?>
