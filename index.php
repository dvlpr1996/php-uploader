<?php

include_once "bootstrap/init.php";

if (isset($_GET['action']) && $_GET['action'] == "cancel") {
	delete_file();
}

if (isset($_GET['action']) && $_GET['action'] == "download") {
	
}

include_once "tpl/home-page.php";