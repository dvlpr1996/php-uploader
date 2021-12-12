<?php

use MatthiasMullie\Minify\CSS;
use MatthiasMullie\Minify\JS;

include_once __DIR__ . "/../bootstrap/init.php";

$accept_type = ["image/png", "image/jpeg", "text/css", "text/javascript"];
$accept_size = 2 * 1024 * 1024;
$des_path = __DIR__ . "/../storage/";
$optimize_size = 0;

try {

	if ($_SERVER['REQUEST_METHOD'] !== "POST") {
		throw new exception("invalid request");
	}

	if (!isset($_POST["upload-btn"]) || $_POST["upload-btn"] != "upload-btn") {
		throw new exception("invalid request");
	}

	if (!isset($_FILES["user-file"]) && $_FILES['user-file']['error'] === UPLOAD_ERR_OK) {
		throw new exception("invalid request");
	}

	$name = $_FILES["user-file"]["name"];
	$size = $_FILES["user-file"]["size"];
	$type = $_FILES["user-file"]["type"];
	$tmp = $_FILES["user-file"]["tmp_name"];

	if (!isset($name) || empty($name)) {
		throw new exception("file must be selected");
	}

	if (!in_array($type, $accept_type, true)) {
		throw new exception("{$type} : does not supported try agin only .png and .jpeg supported or .css for minify");
	}

	if ($size > $accept_size) {
		throw new exception("{$size} is too large file must be less than 2 MB");
	}

	if ($type === "text/css") {

		$sourcePath = $des_path . "css/";
		$file_name = file_name($name);
		$minifiedPath = $des_path . "minified/css/";
		$source = des_file($sourcePath, $file_name);

		if (move_uploaded_file((string)$tmp, $source)) {

			if (!file_exists($minifiedPath)) {
				mkdir($minifiedPath, 0777, true);
			}

			$fileContents = file_get_contents($source);
			$minifier = new CSS($fileContents);
			$minifiedContents = $minifier->minify();
			$minify_path = $minifiedPath . md5(time()) . "-" . $file_name;
			file_put_contents($minify_path, $minifiedContents);

			header("location: ../index.php");
		} else {
			throw new exception("somethings wrong try again");
		}
	}

	if ($type === "text/javascript") {

		$sourcePath = $des_path . "js/";
		$file_name = file_name($name);
		$minifiedPath = $des_path . "minified/js/";
		$source = des_file($sourcePath, $file_name);

		if (move_uploaded_file((string)$tmp, $source)) {

			if (!file_exists($minifiedPath)) {
				mkdir($minifiedPath, 0777, true);
			}

			$fileContents = file_get_contents($source);
			$minifier = new JS($fileContents);
			$minifiedContents = $minifier->minify();
			$minify_path = $minifiedPath . md5(time()) . "-" . $file_name;
			file_put_contents($minify_path, $minifiedContents);

			header("location: ../index.php");
		} else {
			throw new exception("somethings wrong try again");
		}
	}

	if ($type === "image/jpeg" || $type === "image/png") {

		$img_path = $des_path . "images/";
		$name = file_name($name);
		$source = des_file($img_path, $name);

		if (move_uploaded_file((string)$tmp, $source)) {
			header("location: ../index.php");
		} else {
			throw new exception("somethings wrong try again");
		}
	}
} catch (exception $e) {
	echo $e->getMessage();
}

// todo error and msg
// todo passing data
// todo after downloading the storage file must deleted