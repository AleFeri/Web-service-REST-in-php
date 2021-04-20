<?php
	header("Access-Control-Allow-Origin: *");
	header("Access-Control-Allow-Headers: access");
	header("Access-Control-Allow-Methods: GET");
	header("Access-Control-Allow-Credentials: true");
	header('Content-Type: application/json');

	include_once '../includes/db.inc.php';
	include_once '../objects/studente.php';

	$database = new Database();
	$db = $database->getConnection();
	$obj = new Studente($db);

	$obj->id = isset($_GET['id']) ? $_GET['id'] : die();

	$obj->readOne();

	if($obj->name!=null) {
		$arr = array(
			"id" => $obj->id,
			"name" => $obj->name,
			"surname" => $obj->surname,
			"sidi_code" => $obj->sidi_code,
			"tax_code" => $obj->tax_code
		);
		http_response_code(200);
		echo json_encode($arr);
	} else {
		http_response_code(404);
		echo json_encode(array("message" => "Lo studente ".$_GET['id']." non esiste."));
	}
?>