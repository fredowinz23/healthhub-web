<?php
include "../templates/api-header.php";
include "interface.php";

$json = array();
$success = false;
if (isset($_POST["patientId"])) {
  $patientId = $_POST["patientId"];
  $success = true;

  $md_list = array();
  foreach (medical_record()->list("patientId=$patientId") as $row) {
    $item = md_interface($row);
    array_push($md_list, $item);
  }

}

$json["patientId"] = $_POST["patientId"];
$json["md_list"] = $md_list;
$json["success"] = $success;

echo json_encode($json);
?>
