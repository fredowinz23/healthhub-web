<?php
session_start();
require_once '../config/database.php';
require_once '../config/Models.php';

$action = $_GET['action'];

switch ($action) {

	case 'account-save' :
		account_save();
		break;

	case 'department-save' :
		department_save();
		break;

	case 'department-delete' :
		department_delete();
		break;

	case 'specialty-save' :
		specialty_save();
		break;

	case 'specialty-delete' :
		specialty_delete();
		break;

	case 'symptom-save' :
		symptom_save();
		break;

	case 'symptom-delete' :
		symptom_delete();
		break;

	case 'attendance-time-in' :
		attendance_time_in();
		break;

	case 'attendance-time-out' :
		attendance_time_out();
		break;

	case 'new-patient' :
		new_patient();
		break;

	case 'new-medical-record' :
		new_medical_record();
		break;

	case 'new-monitoring' :
		new_monitoring();
		break;

	case 'check-out' :
		check_out();
		break;

	default :
}

function check_out(){

	$patientId = $_GET["patientId"];
	$mrId = $_GET["mrId"];

	$model = patient();
	$model->obj["status"] = "Discharged";
	$model->update("Id=$patientId");

	$model = medical_record();
	$model->obj["status"] = "Discharged";
	$model->update("Id=$mrId");

	header('Location: medical-records.php?patientId=' . $mrId);
}


function new_patient(){

		$model = patient();
		$model->obj["fullName"] = $_POST["fullName"];
		$model->obj["dob"] = $_POST["dob"];
		$model->obj["gender"] = $_POST["gender"];
		$model->obj["city"] = $_POST["city"];
		$model->obj["address"] = $_POST["address"];
		$model->obj["phoneNumber"] = $_POST["phoneNumber"];
		$model->obj["email"] = $_POST["email"];
		$model->obj["emergencyContactName"] = $_POST["emergencyContactName"];
		$model->obj["relationship"] = $_POST["relationship"];
		$model->obj["emergencyPhoneNumber"] = $_POST["emergencyPhoneNumber"];
		$model->obj["insuranceProvider"] = $_POST["insuranceProvider"];
		$model->obj["policyNumber"] = $_POST["policyNumber"];
		$model->obj["groupNumber"] = $_POST["groupNumber"];
		$model->obj["subscriberName"] = $_POST["subscriberName"];
		$model->obj["subscriberDob"] = $_POST["subscriberDob"];
		$model->obj["subscriberId"] = $_POST["subscriberId"];
		$model->create();

		$getLast = patient()->get("Id>0 order by Id desc limit 1");

		header('Location: medical-exam-form.php?patientId=' . $getLast->Id);

}

function new_medical_record(){

		$patientId = $_POST["patientId"];

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

		$model = patient();
		$model->obj["status"] = "Admitted";
		$model->update("Id=$patientId");

		$getLast = medical_record()->get("Id>0 order by Id desc limit 1");

		header('Location: monitoring-form.php?mrId=' . $getLast->Id);

}


function new_monitoring(){

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
		$model->obj["monitoredBy"] = $_SESSION["user_session"]["Id"];
		$model->obj["dateAdded"] = "NOW()";
		$model->create();

		header('Location: monitoring-list.php?mrId=' . $_POST["mrId"]);

}

function attendance_time_in(){

		$model = attendance();
		$model->obj["nurseId"] = $_GET["nurseId"];
		$model->obj["timeIn"] = "NOW()";
		$model->obj["date"] = "NOW()";
		$model->create();
		header('Location: attendance.php');
}

function attendance_time_out(){

		$attId = $_GET["attId"];
		$model = attendance();
		$model->obj["timeOut"] = "NOW()";
		$model->obj["status"] = "Out";
		$model->update("Id=$attId");
		header('Location: attendance.php');
}


function user_add(){

	$username = $_POST["username"];
	$checkUser = user()->count("username='$username'");

	if ($checkUser>=1) {
		header('Location: user-add.php?role='.$_POST["role"].'&error=Username Already Exists');
	}
	else{
			$model = user();
			$model->obj["username"] = $_POST["username"];
			$model->obj["firstName"] = $_POST["firstName"];
			$model->obj["role"] = $_POST["role"];
			$model->obj["phone"] = $_POST["phone"];
			$model->obj["email"] = $_POST["email"];
			$model->obj["lastName"] = $_POST["lastName"];
			$model->obj["password"] = $_POST["password"];
			$model->obj["departmentId"] = $_POST["departmentId"];
			$model->obj["dateAdded"] = "NOW()";
			$model->create();
			header('Location: accounts.php?role=' . $_POST["role"]);
	}
}

function account_save(){
	#Process to save to the database

	$model = account();
	$model->obj["username"] = $_POST["username"];
	$model->obj["firstName"] = $_POST["firstName"];
	$model->obj["lastName"] = $_POST["lastName"];
	$model->obj["role"] = $_POST["role"];

	if ($_POST["role"]=="Doctor") {
		$model->obj["drSpecialtyId"] = $_POST["drSpecialtyId"];
	}

	if ($_POST["role"]=="Head Nurse") {
		$model->obj["departmentId"] = $_POST["departmentId"];
		$model->obj["shiftStart"] = $_POST["shiftStart"];
		$model->obj["shiftEnd"] = $_POST["shiftEnd"];
	}

	if ($_POST["role"]=="Nurse") {
		$model->obj["departmentId"] = $_POST["departmentId"];
		$model->obj["nHeadNurseId"] = $_POST["nHeadNurseId"];
		$model->obj["shiftStart"] = $_POST["shiftStart"];
		$model->obj["shiftEnd"] = $_POST["shiftEnd"];
	}

	if ($_POST["form-type"] == "add") {
		$model->obj["password"] = $_POST["password"];
		$model->create();
	}

	if ($_POST["form-type"] == "edit") {
		$Id = $_POST["Id"];
		$model->update("Id=$Id");
	}

	header('Location: accounts.php?role=' . $_POST["role"]);
}

function department_save(){
	#Process to save to the database

	$model = department();
	$model->obj["name"] = $_POST["name"];

	if ($_POST["form-type"] == "add") {
		$model->create();
	}

	if ($_POST["form-type"] == "edit") {
		$Id = $_POST["Id"];
		$model->update("Id=$Id");
	}

	header('Location: department.php');
}

function department_delete(){
	#Process to save to the database

	$Id = $_GET["Id"];
	department()->delete("Id=$Id");

	header('Location: department.php');
}



function symptom_save(){
	#Process to save to the database

	$model = symptom();
	$model->obj["name"] = $_POST["name"];

	if ($_POST["form-type"] == "add") {
		$model->create();
	}

	if ($_POST["form-type"] == "edit") {
		$Id = $_POST["Id"];
		$model->update("Id=$Id");
	}

	header('Location: symptoms.php');
}

function symptom_delete(){
	#Process to save to the database

	$Id = $_GET["Id"];
	symptom()->delete("Id=$Id");

	header('Location: symptoms.php');
}

function specialty_save(){
	#Process to save to the database

	$model = specialty();
	$model->obj["name"] = $_POST["name"];

	if ($_POST["form-type"] == "add") {
		$model->create();
	}

	if ($_POST["form-type"] == "edit") {
		$Id = $_POST["Id"];
		$model->update("Id=$Id");
	}

	header('Location: specialty.php');
}

function specialty_delete(){
	#Process to save to the database

	$Id = $_GET["Id"];
	specialty()->delete("Id=$Id");

	header('Location: specialty.php');
}
