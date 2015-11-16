<?php 
	define ("driver", "mysql");
	define ("host", "127.0.0.1");
	define ("user", "root");
	define ("pass", "root");
	function update_database() {
		try {
			$pdo = new PDO(driver.":host=".host.";", user, pass);
			if (!$pdo) throw new Exception ("Could not connect to MySQL Server");
			$sth = $pdo->prepare("CREATE DATABASE IF NOT EXISTS `local.ru` DEFAULT CHARACTER SET `utf8`;");
			if ( $sth->execute() ) {
				$pdo->query("USE DATABASE `local.ru`;");
				$sth = $pdo->prepare("CREATE TABLE IF NOT EXISTS `local.ru`.`users` (
						`id` INT(10) AUTO_INCREMENT PRIMARY KEY, 
						`fio` VARCHAR(128) NOT NULL, 
						`mail` VARCHAR(128) NOT NULL, 
						`password` VARCHAR(128) NOT NULL,
						`group` INT(5) NOT NULL);");
				if ( !($sth->execute()) ) throw new Exception ("Can not create table in database!");
			} else {
				throw new Exception("Can not not create database");
			}
		} catch (Exception $e) {
			return $e;
		}
	}
?>