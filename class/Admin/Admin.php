<?php
	class Admin {
		public $user = null;
		protected $pdo;

		public function __construct() {
			$this->pdo = new PDO(DRIVER.":host=".HOST.";dbname=".BASE, USER, PASS);
		}

		public function Auth($params) {

		}

		public function index($data) {
			return array("title"=>"Администраторская");
		}
	}
?>