<?php
include "../templates/api-header.php";
include "interface.php";

$json = array();
$success = false;
if (isset($_POST["username"])) {
  $username = $_POST["username"];
  $status = $_POST["status"];
  $success = true;

  $patient_list = array();

  foreach (patient()->list("status='$status'") as $row) {
    $item = patient_interface($row);
    array_push($patient_list, $item);
  }
}

$json["username"] = $_POST["username"];
$json["patient_list"] = $patient_list;
$json["success"] = $success;

echo json_encode($json);
?>
