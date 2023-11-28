<?php

function patient_interface($row){
  $item = array();
  $item["id"] = $row->Id;
  $item["fullName"] = $row->fullName;
  $item["dob"] = $row->dob;
  $item["gender"] = $row->gender;
  $item["address"] = $row->address;
  $item["city"] = $row->city;
  $item["phoneNumber"] = $row->phoneNumber;
  $item["email"] = $row->email;
  return $item;
}

function user_interface($row){
  $item = array();
  $item["id"] = $row->Id;
  $item["firstName"] = $row->firstName;
  $item["lastName"] = $row->lastName;
  return $item;
}

function symptom_interface($row){
  $item = array();
  $item["id"] = $row->Id;
  $item["name"] = $row->name;
  return $item;
}

function md_interface($object){
  $patient = patient()->get("Id=$object->patientId");
  $patientObj = patient_interface($patient);

  $doctor = account()->get("Id=$object->doctorId");
  $doctorObj = user_interface($doctor);

  $symptom = symptom()->get("Id=$object->symptomId");
  $symptomObj = symptom_interface($symptom);

  $response = array();
  $response["id"] = $object->Id;
  $response["patient"] = $patientObj;
  $response["doctor"] = $doctorObj;
  $response["reasonForAdmission"] = $object->reasonForAdmission;
  $response["allergies"] = $object->allergies;
  $response["medications"] = $object->medications;
  $response["bloodType"] = $object->bloodType;
  $response["symptom"] = $symptomObj;
  $response["doctorsOrders"] = $object->doctorsOrders;
  $response["dateAdded"] = $object->dateAdded;
  $response["status"] = $object->status;

  return $response;
}


function monitoring_interface($object){

  $mr = medical_record()->get("Id=$object->mrId");
  $mrObj = md_interface($mr);

  $user = account()->get("Id=$object->monitoredBy");
  $userObj = user_interface($user);

  $response = array();
  $response["id"] = $object->Id;
  $response["medicalRecord"] = $mrObj;
  $response["temperature"] = $object->temperature;
  $response["bloodPressure"] = $object->bloodPressure;
  $response["respiratoryRate"] = $object->respiratoryRate;
  $response["oxygen"] = $object->oxygen;
  $response["cardiacRate"] = $object->cardiacRate;
  $response["medications"] = $object->medications;
  $response["observations"] = $object->observations;
  $response["recommendations"] = $object->recommendations;
  $response["dateAdded"] = $object->dateAdded;
  $response["timeAdded"] = $object->timeAdded;
  $response["monitoredBy"] = $userObj;

  return $response;
}

?>
