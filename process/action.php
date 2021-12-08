<?php

include_once __DIR__."/../bootstrap/init.php";

$accept_type = ["image/png", "image/jpeg"];
$accept_size = 2 * 1024 * 1024;
$err = null;


try {

	if ($_SERVER['REQUEST_METHOD'] !== "POST") {
		throw new exception("invalid request");
	}

	if (!isset($_POST["upload-btn"]) || $_POST["upload-btn"] != "upload-btn") {
		throw new exception("invalid request");
	}

	if (!isset($_FILES["user-file"])) {
		throw new exception("invalid request");
	}

	$name = $_FILES["user-file"]["name"];
	$size = $_FILES["user-file"]["size"];
	$type = $_FILES["user-file"]["type"];
	$tmp = $_FILES["user-file"]["tmp_name"];
	$error = $_FILES["user-file"]["error"];

	if (!isset($name) || empty($name)) {
		throw new exception("file must be selected");
	}

	if (!in_array($type, $accept_type, true)) {
		throw new exception("{$type} : does not supported try agin");
	}

	if ($size > $accept_size) {
		throw new exception("{$size} is too large file must be less than 2 MB");
	}

	$name = file_name($name);
	$des_path = __DIR__ . "/../storage/";

	if (isset($name) && !empty($name)) {
		if (move_uploaded_file((string)$tmp, des_file($des_path, $name))) {
			$msg = "file uploaded successfully";
			redirect("../index");
		} else {
			throw new exception("somethings wrong try again");
		}
	}
} catch (exception $e) {
	echo $e->getMessage();
}












// after downloading the file must deleted