<?php
	$method = $_SERVER["REQUEST_METHOD"];

	switch($method) {
	case 'GET':
		include_once "./read.php";
		break;

	case 'POST':
		include_once "./create.php";
		break;

	case 'DELETE':
		include_once "./delete.php";
		break;

	case 'PUT':
		include_once "./update.php";
		break;

	default:
		break;
	}
?>