<?php
include "CRUD.php";
include "functions.php";

function account() {
	$crud = new CRUD;
	$crud->table = "account";
	return $crud;
}

function department() {
	$crud = new CRUD;
	$crud->table = "department";
	return $crud;
}

function specialty() {
	$crud = new CRUD;
	$crud->table = "specialty";
	return $crud;
}

function symptom() {
	$crud = new CRUD;
	$crud->table = "symptom";
	return $crud;
}

function attendance() {
	$crud = new CRUD;
	$crud->table = "attendance";
	return $crud;
}

function patient() {
	$crud = new CRUD;
	$crud->table = "patient";
	return $crud;
}

function medical_record() {
	$crud = new CRUD;
	$crud->table = "medical_record";
	return $crud;
}

function follow_up() {
	$crud = new CRUD;
	$crud->table = "follow_up";
	return $crud;
}

function task() {
	$crud = new CRUD;
	$crud->table = "task";
	return $crud;
}

?>
