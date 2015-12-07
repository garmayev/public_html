<?php
	class Main {
		public function __construct() {

		}

		public function getThumbnails() {
			return array(
				array(
						"id"=>1,
						"title"=>"Заголовок!",
						"images"=>"images/various/glasses-86x86.jpg",
						"small"=>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque id pharetra augue. Nullam eget metus bibendum, eleifend felis eget, sagittis.",
						"date"=>"2 Декабря 2015",
						"author"=>"Garmayev",
				),
				array(
						"id"=>2,
						"title"=>"Заголовок 2!",
						"images"=>"images/various/sushi1-86x86.jpg",
						"small"=>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque id pharetra augue. Nullam eget metus bibendum, eleifend felis eget, sagittis.",
						"date"=>"2 Декабря 2015",
						"author"=>"Garmayev",
				),
			);
		}

		public function getSlider() {
			return array(
				array(
					"id"=>1,
					"img"=>"images/various/0016-425x170.jpg",
					"text"=>"web design",
					"title"=>"Kassyopea Theme",
				),
				array(
					"id"=>2,
					"img"=>"images/various/0024-425x170.jpg",
					"text"=>"web design",
					"title"=>"Kassyopea Theme",
				),
				array(
					"id"=>3,
					"img"=>"images/various/0041-425x170.jpg",
					"text"=>"web design",
					"title"=>"Kassyopea Theme",
				),
				array(
					"id"=>4,
					"img"=>"images/various/0061-425x170.jpg",
					"text"=>"web design",
					"title"=>"Kassyopea Theme",
				),
				array(
					"id"=>5,
					"img"=>"images/various/Fotolia_28180973_Subscription_XL-425x170.jpg",
					"text"=>"web design",
					"title"=>"Kassyopea Theme",
				),
				array(
					"id"=>6,
					"img"=>"images/various/0016-425x170.jpg",
					"text"=>"web design",
					"title"=>"Kassyopea Theme",
				),
				array(
					"id"=>7,
					"img"=>"images/various/00241-425x170.jpg",
					"text"=>"web design",
					"title"=>"Kassyopea Theme",
				),
			);
		}

		public function index($data) {
			$api = new API($_SERVER["REQUEST_URI"]);
			return array(
					"page" =>array(
						"title"=>"Garmayev Group",
						"header"=>"Добро пожаловать",
						"content"=>"Представляю вам свой проект"),
					"path" => "/content/".$api->template."/", 
					"menu" => $api->getMenu(), 
					"thumbnails" => $this->getThumbnails(),
					"slider" => $this->getSlider(),
					"active" => $api->link,
					);
		}
	}
?>