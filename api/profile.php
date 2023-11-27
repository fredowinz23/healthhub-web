<?php
include "../templates/api-header.php";

$json = array();
$success = false;
$present = 0;
$late = 0;
$absent = 0;

if (isset($_POST["username"])) {
  $username = $_POST["username"];
  $user = user()->get("username='$username'");
  $success = true;
  $response = array();
  $response["id"] = $user->Id;
  $response["username"] = $user->username;
  $response["email"] = $user->email;
  $response["firstName"] = $user->firstName;
  $response["lastName"] = $user->lastName;
  $response["phone"] = $user->phone;

  $department = department()->get("Id=$user->departmentId");

  $response["department"] = $department->name;
  $json["profile"] = $response;

  $present = attendance()->count("nurseId=$user->Id and status='Present'");
  $late = attendance()->count("nurseId=$user->Id and status='Late'");
  $absent = attendance()->count("nurseId=$user->Id and status='Absent'");
}

$json["username"] = $_POST["username"];
$json["present"] = $present;
$json["late"] = $late;
$json["absent"] = $absent;
$json["success"] = $success;


echo json_encode($json);
?>
