<?php
include "../templates/api-header.php";

$BASE_URL = "http://" . $_SERVER['SERVER_NAME'];
$json = array();
$success = false;
$rank = "";
$cart = 0;
if (isset($_POST["username"])) {
  $username = $_POST["username"];
  $status = $_POST["status"];
  $user = user()->get("username='$username'");
  $success = true;

  $leave_list = array();

  foreach (leave_request()->list("nurseId=$user->Id and status='$status'") as $row) {
    $leaveType = leave_type()->get("Id=$row->leaveTypeId");
    $leave = array();
    $leave["id"] = $row->Id;
    $leave["startDate"] = $row->startDate;
    $leave["endDate"] = $row->endDate;
    $leave["leaveType"] = $leaveType->name;
    $leave["reason"] = $row->reason;
    array_push($leave_list, $leave);
  }
}

$json["username"] = $_POST["username"];
$json["status"] = $_POST["status"];
$json["leave_list"] = $leave_list;
$json["success"] = $success;

echo json_encode($json);
?>
