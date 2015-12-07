<?php
	class Journal {
		public function __construct() {

		}

		public function index($data) {
			$api = new API($_SERVER["REQUEST_URI"]);
			return array(
					"page" =>array(
						"title"=>"Garmayev Group",
						"header"=>"Журнал",
						"content"=>"Система учета посещаемости занятий студентами"),
					"path" => "/content/".$api->template."/", 
					"menu" => $api->getMenu(), 
					);
		}
	}
?>