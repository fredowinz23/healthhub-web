<?php
include "../templates/api-header.php";

$json = array();
$success = false;
$response = "";
if (isset($_POST["fullName"])) {
  $success = true;

  $model = patient();
  $model->obj["fullName"] = $_POST["fullName"];
  $model->obj["dob"] = $_POST["dob"];
  $model->obj["gender"] = $_POST["gender"];
  $model->obj["address"] = $_POST["address"];
  $model->obj["city"] = $_POST["city"];
  $model->obj["phoneNumber"] = $_POST["phoneNumber"];
  $model->obj["email"] = $_POST["email"];
  $model->obj["emergencyContactName"] = $_POST["emergencyContactName"];
  $model->obj["relationship"] = $_POST["relationship"];
  $model->obj["emergencyPhoneNumber"] = $_POST["emergencyPhoneNumber"];
  $model->create();


$json["success"] = $success;


header('Content-Type: application/json; charset=utf-8');
echo json_encode($json);
?>
