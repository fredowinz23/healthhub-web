<?php
include "../templates/api-header.php";

$json = array();

$success = true;

$username = $_POST["username"];
$account = account()->get("username='$username'");

$model = follow_up();
$model->obj["mrId"] = $_POST["mrId"];
$model->obj["temperature"] = $_POST["temperature"];
$model->obj["bloodPressure"] = $_POST["bloodPressure"];
$model->obj["respiratoryRate"] = $_POST["respiratoryRate"];
$model->obj["medications"] = $_POST["medications"];
$model->obj["oxygen"] = $_POST["oxygen"];
$model->obj["cardiacRate"] = $_POST["cardiacRate"];
$model->obj["medications"] = $_POST["medications"];
$model->obj["observations"] = $_POST["observations"];
$model->obj["recommendations"] = $_POST["recommendations"];
$model->obj["monitoredBy"] = $account->Id;
$model->obj["dateAdded"] = "NOW()";
$model->obj["timeAdded"] = $_POST["timeAdded"];
$model->create();


$json["success"] = $success;


header('Content-Type: application/json; charset=utf-8');
echo json_encode($json);
?>
