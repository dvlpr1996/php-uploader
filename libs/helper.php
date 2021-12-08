<?php

function nice_dd($data)
{
	echo "<pre style='color: #9c4100; background: #fff; z-index: 999; position: relative; padding: 10px; margin: 10px; border-radius: 5px; border-left: 3px solid #c56705;'>";
	print_r($data);
	echo "</pre>";
	die();
}

function redirect(string $path)
{
	return header("Location:" . $path . ".php");
	die();
}

function file_name($name)
{
	$name = (string)$name;
	$name = strtolower($name);
	$name = str_replace(" ", "-", $name);
	return md5(time()) . "-" . $name;
}

function des_file($path, $name)
{
	$name = md5(time()) . "-" . $name;
	return $path . $name;
}
