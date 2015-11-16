<?php	$pdo = new PDO("mysql:host=127.0.0.1;", "root", "root");
		$sth = $pdo->prepare("CREATE DATABASE `local.ru`;");
		if ( $sth->execute() ) {
			echo "exec";
		} else {
			echo "non exec";
		}
?>