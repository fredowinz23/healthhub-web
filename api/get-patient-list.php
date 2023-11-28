<?php
include "../templates/api-header.php";
include "interface.php";

$json = array();
$success = false;
if (isset($_POST["username"])) {
  $username = $_POST["username"];
  $account = account()->get("username='$username'");
  $status = $_POST["status"];
  $success = true;

  $md_list = array();

  foreach (medical_record()->list("status='$status' and nurseId=$account->Id") as $row) {
    $item = md_interface($row);
    array_push($md_list, $item);
  }
}

$json["username"] = $_POST["username"];
$json["md_list"] = $md_list;
$json["success"] = $success;

echo json_encode($json);
?>
