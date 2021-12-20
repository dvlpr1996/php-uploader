<?php

function nice_dd($data, string $type = "p")
{
	echo "<pre style='color: #9c4100; background: #fff; z-index: 999; position: relative; padding: 10px; margin: 10px; border-radius: 5px; border-left: 3px solid #c56705;'>";
	if ($type == "v") {
		var_dump($data);
	}
	if ($type == "p") {
		print_r($data);
	}
	echo "</pre>";
	die();
}

function redirect(string $path)
{
	header("Location:" .  $path . ".php");
	die();
}

function e($data): string
{
	return htmlspecialchars($data ?? '', ENT_QUOTES, 'UTF-8');
}

function download()
{
	$Path_to_upload_minify_file = "storage/minify";
	$path_file = scandir($Path_to_upload_minify_file, SCANDIR_SORT_DESCENDING);
	$path = pathinfo($path_file[0], PATHINFO_EXTENSION);
	$extension = strtolower($path);
	$mimetype = null;
	$file = $Path_to_upload_minify_file . "/" . $path_file[0];

	switch ($extension) {
		case 'jpeg':
		case 'jpg':
			$mimetype = "image/jpg";
			break;
		case 'css':
			$mimetype = "text/css";
			break;

		case 'js':
			$mimetype = "application/x-javascript";
			break;

		default:
			$mimetype = "application/force-download";
	}

	header('Pragma: public');
	header('Expires: 0');
	header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
	header('Cache-Control: private', false);
	header('Content-Type: ' . $mimetype);
	header('Content-Disposition: attachment; filename="' . basename($file) . '";');
	header('Content-Transfer-Encoding: binary');
	header('Content-Length: ' . filesize($file));

	ob_clean();
	flush();
	readfile($file);
}
