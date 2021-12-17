<?php

namespace uploader;

class uploadValidator
{

	private $accept_type = [
		"img" => [
			"image/png",
			"image/jpeg"
		],

		"css" => [
			"text/css"
		],

		"js" => [
			"text/javascript",
			"application/x-javascript",
			"application/javascript"
		]
	];

	private $accept_size = 2 * 1024 * 1024;

	public function check_user_input_exists(array $userinput)
	{
		if (!isset($userinput) && $userinput['error'] === UPLOAD_ERR_OK) {
			throw new \exception("invalid request");
		}
		return true;
	}

	public function check_file_exists($filename)
	{
		if (!isset($filename) || empty($filename)) {
			throw new \exception("file must be selected");
		}
		return true;
	}

	public function check_type_allowed($type)
	{
		if (!in_array($type, $this->accept_type, true)) {
			throw new \exception(
				"this {$type} file does not supported try agin only .png and .jpeg supported or .css .js file for minify"
			);
		}
	}

	public function check_size_allowed($size)
	{
		if ($size > $this->accept_size) {
			throw new \exception(
				convert_bytes($size, "M") . "is too large file must be less than"
					. convert_bytes($this->accept_size, "M")
			);
		}
	}

	public function check_type_to_upload(string $file_type, string $allow_type)
	{
		if (in_array($file_type, $this->accept_type[$allow_type], true)) {
			return true;
		}
	}
}