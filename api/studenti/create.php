<?php
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=UTF-8");
	header("Access-Control-Allow-Methods: POST");
	header("Access-Control-Max-Age: 3600");
	header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

	include_once '../includes/db.inc.php';
	include_once '../objects/studente.php';

	$database = new Database();
	$db = $database->getConnection();
	$obj = new Studente($db);

	$data = json_decode(file_get_contents("php://input"));

	if(
		!empty($data->name) &&
		!empty($data->surname) &&
		!empty($data->sidi_code) &&
		!empty($data->tax_code)
	) {
		$obj->name = $data->name;
		$obj->surname = $data->surname;
		$obj->sidi_code = $data->sidi_code;
		$obj->email = $data->email;
		$obj->tax_code = $data->tax_code;

		if($obj->create()) {
			http_response_code(201);
			echo json_encode(array("message" => "Amministratore insert successfully."));
		} else {
			http_response_code(503);
			echo json_encode(array("message" => "Unable to insert amministratore."));
		}
	} else {
		http_response_code(400);
		echo json_encode(array("message" => "Unable to insert amministratore. Data is incomplete."));
	}
?>