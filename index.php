<?php
	session_start();
	include ("class/autoload.php");
	include ("vendor/autoload.php");
	include ("config/config.php");
	try {
		$api = new API($_SERVER["REQUEST_URI"]);
		if ( $api->module != "Not_Found" ) {
			$tmpClass = new $api->module;
			$result = $tmpClass->{$api->action}($api->params);
		} else {
			throw new Exception("Unknown Class", 1);
		}
	} catch (Exception $e) {
		var_dump( $e );
	}
	try {
		$loader = new Twig_Loader_Filesystem($templ = "content/".$api->template);
		$twig = new Twig_Environment($loader);
		echo $twig->render("index.html", array('name' => "Baga", 'path' => $templ.'/'));
	} catch (Exception $e) {

	}
?>
