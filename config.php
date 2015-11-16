<?php	$pdo = new PDO("mysql:host=127.0.0.1;", "root", "root");
		$sth = $pdo->prepare("CREATE DATABASE IF NOT EXISTS `local.ru` DEFAULT CHARACTER SET `utf8`;");
		if ( $sth->execute() ) {
			$pdo->query("USE DATABASE `local.ru`;");
			echo "DATABASE CREATED<br />";
			$sth = $pdo->prepare("CREATE TABLE IF NOT EXISTS `local.ru`.`users` (
					`id` INT(10) AUTO_INCREMENT PRIMARY KEY, 
					`fio` VARCHAR(128) NOT NULL, 
					`mail` VARCHAR(128) NOT NULL, 
					`password` VARCHAR(128) NOT NULL,
					`group` INT(5) NOT NULL);");
			echo ($sth->execute()) ? "TABLE CREATED" : "TABLE NON CREATED";
		} else {
			echo "DATABASE NON CREATED";
		}
?>