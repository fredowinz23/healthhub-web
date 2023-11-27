<?php
include "../templates/api-header.php";

$BASE_URL = "http://" . $_SERVER['SERVER_NAME'];
$json = array();
$success = false;
$rank = "";
$cart = 0;
if (isset($_POST["username"])) {
  $username = $_POST["username"];
  $user = user()->get("username='$username'");
  $success = true;

  $leave_list = array();

  foreach (leave_type()->list() as $row) {
    $leave = array();
    $leave["id"] = $row->Id;
    $leave["name"] = $row->name;
    $leave["description"] = $row->description;
    array_push($leave_list, $leave);
  }
}

$json["username"] = $_POST["username"];
$json["leave_list"] = $leave_list;
$json["success"] = $success;

echo json_encode($json);
?>
