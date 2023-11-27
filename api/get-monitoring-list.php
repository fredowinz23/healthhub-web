<?php
include "../templates/api-header.php";
include "interface.php";

$json = array();
$success = false;
if (isset($_POST["mrId"])) {
  $mrId = $_POST["mrId"];
  $success = true;

  $monitoring_list = array();
  foreach (follow_up()->list("mrId=$mrId") as $row) {
    $item = monitoring_interface($row);
    array_push($monitoring_list, $item);
  }

}

$json["mrId"] = $_POST["mrId"];
$json["monitoring_list"] = $monitoring_list;
$json["success"] = $success;

echo json_encode($json);
?>
