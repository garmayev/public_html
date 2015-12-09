<?php
	class User {
		public function __construct() {

		}

		public function auth() {
			return array(
						"title"=>"Авторизация | Garmayev Group",
						"header"=>"Авторизация",
						"content"=>"<form method='POST' action='/user/auth/'><input type='text' name='login'><br /><input type='password' name='password'><input type='submit' name='auth'></form> " );
		}
	}
?>