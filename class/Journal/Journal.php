<?php
	class Journal {
		public function __construct() {

		}

		public function getDate() {

		}

		public function index($data) {
			$api = new API($_SERVER["REQUEST_URI"]);
			if ( isset($_SESSION["user"]) ) {
				$this->getDate();
			} else {
				return 	array(
					"page" => $api->user->auth(),
					"path" => "/content/".$api->template."/", 
					"menu" => $api->getMenu(), 
					"active" => $api->link,
				);
			}
		}
	}
?>