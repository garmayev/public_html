<?php
	spl_autoload_register("__autoloader", true, true);

	function __autoloader($className) {
		try {
			if (file_exists( $file = "class/".$className."/".$className.".php")) {
				require ($file);
			} else {
				throw new Exception("FILE NOT FOUND");
			}
		} catch (Exception $e) {
			return $e;
		}
	}
?>