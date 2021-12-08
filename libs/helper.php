<?php

function nice_dd($data)
{
	echo "<pre style='color: #9c4100; background: #fff; z-index: 999; position: relative; padding: 10px; margin: 10px; border-radius: 5px; border-left: 3px solid #c56705;'>";
	var_dump($data);
	echo "</pre>";
	die();
}

function redirect(string $url)
{
	header("Location: $url");
	die();
}

