<?php

function path_creator($path)
{
	if (!file_exists($path)) {
		mkdir($path, 0777, true);
	}
}

function file_name($name)
{
	$name = (string)$name;
	$name = trim($name);
	$name = strip_tags($name);
	$name = stripslashes($name);
	$name = strtolower($name);
	$name = str_replace(" ", "-", $name);
	return e($name);
}

function des_file($path, $name)
{
	path_creator($path);
	$name = md5(time()) . "-" . $name;
	return $path . $name;
}

function convert_bytes(int $bytes, string $to, int $decimalPlaces = 1)
{
	$formulas = [
		'K' => number_format($bytes / 1024, $decimalPlaces),
		'M' => number_format($bytes / 1048576, $decimalPlaces),
		'G' => number_format($bytes / 1073741824, $decimalPlaces)
	];
	return isset($formulas[$to]) ? $formulas[$to] : 0;
}

function set_type(string $data)
{
	return str_replace("x-", "", basename($data));
}

function delete_file()
{
	$files = glob("storage/*/*");
	foreach ($files as $file) {
		if (is_file($file))
			unlink($file);
	}
	redirect("http://localhost/dev/uploader/index");
}