<?php
include "../templates/api-header.php";

$json = array();

$success = true;

$model = medical_record();
$model->obj["patientId"] = $_POST["patientId"];
$model->obj["doctorId"] = $_POST["doctorId"];
$model->obj["reasonForAdmission"] = $_POST["reasonForAdmission"];
$model->obj["allergies"] = $_POST["allergies"];
$model->obj["medications"] = $_POST["medications"];
$model->obj["bloodType"] = $_POST["bloodType"];
$model->obj["symptomId"] = $_POST["symptomId"];
$model->obj["doctorsOrders"] = $_POST["doctorsOrders"];
$model->obj["dateAdded"] = "NOW()";
$model->create();


$json["success"] = $success;


header('Content-Type: application/json; charset=utf-8');
echo json_encode($json);
?>
