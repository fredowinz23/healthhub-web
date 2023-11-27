<?php
include "../templates/api-header.php";
include "interface.php";

$json = array();

$doctor_list = array();
foreach (account()->list("role='Doctor'") as $row) {
  $item = user_interface($row);
  array_push($doctor_list, $item);
}

$symptom_list = array();
foreach (symptom()->list() as $row) {
  $item = symptom_interface($row);
  array_push($symptom_list, $item);
}

$json["doctor_list"] = $doctor_list;
$json["symptom_list"] = $symptom_list;
$json["success"] = $success;

echo json_encode($json);
?>
