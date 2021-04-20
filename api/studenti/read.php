<?php
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=UTF-8");

	if(!empty($_GET['id'])) {
		include "./read_one.php";
		exit();
	}

	include_once '../includes/db.inc.php';
	include_once '../objects/studente.php';

	$database = new Database();
	$db = $database->getConnection();
	$obj = new Studente($db);

	$stmt = $obj->read();
	$num = $stmt->rowCount();

	if($num>0) {
		$arr=array();
		$arr["records"]=array();

		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			extract($row);

			$item=array(
				"id" => $id,
				"name" => $name,
				"surname" => $surname,
				"sidi_code" => $sidi_code,
				"tax_code" => $tax_code
			);

			array_push($arr["records"], $item);
		}

		http_response_code(200);
		echo json_encode($arr);
	} else {
		http_response_code(404);
		echo json_encode(
			array("message" => "Non ci sono studenti.")
		);
	}
?>