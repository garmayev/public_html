<?php
	session_start();
	include ("class/autoload.php");
	include ("vendor/autoload.php");
	include ("config/config.php");
	try {
		$api = new API($_SERVER["REQUEST_URI"]);
		if ( ($api->module != "Error") && (file_exists("class/".$api->module."/")) ) {
			$tmpClass = new $api->module;
			$result = $tmpClass->{$api->action}($api->params);
		} else {
			throw new Exception("Unknown Class", 1);
		}
	} catch (Exception $e) {
		$result = array(
					"page" =>array(
						"title"=>"Garmayev Group",
						"header"=>"Ошибка!",
						"content"=>$e->getMessage() ),
					"path" => "/content/".$api->template."/", 
					"menu" => $api->getMenu(), 
			);
//		var_dump( $e->getMessage() );
	} finally {
		$loader = new Twig_Loader_Filesystem("content/".$api->template."/");
		$twig = new Twig_Environment($loader);
		echo $twig->render($api->action.".html", $result);
	}
?>
