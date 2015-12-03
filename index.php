<?php
	session_start();
	include ("class/autoload.php");
	include ("config/config.php");
	try {
		$api = new API($_SERVER["REQUEST_URI"]);
		$tmpClass = new $api->module;
		$result = $tmpClass->{$api->action}($api->params);
		var_dump($result);
	} catch (Exception $e) {
		var_dump($e);
	}
?>
