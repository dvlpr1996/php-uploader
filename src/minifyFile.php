<?php

namespace uploader;

class minifyFile
{
	public function minifier(string $file_type, string $source_path, string $des_path, string $file_name)
	{
		$class_name = "MatthiasMullie\Minify" . "\\" . $file_type;
		$fileContents = file_get_contents($source_path);
		$minifier = new 	$class_name($fileContents);
		$minifiedContents = $minifier->minify();
		$minify_path = $des_path . md5(time()) . "-minify-" . $file_name;
		file_put_contents($minify_path, $minifiedContents);
	}
}
