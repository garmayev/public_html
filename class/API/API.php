<?php
	class API {
// Назначаем модуль и действие по умолчанию.
// Массив параметров из URI запроса.  
		public $template = null;
		public $module = 'Not_Found';
		public $action = 'main';
		public $params = array();
		protected $pdo = null;

		public function __construct( $request ) {
			$this->pdo = new PDO(DRIVER.":host=".HOST.";dbname=".BASE, USER, PASS);
			$this->routes($request);
			$this->template = $this->getTemplate();
		}

		public function getTemplate() {
			$sth = $this->pdo->prepare("SELECT * FROM `config` WHERE `active` = 1 AND `param`='template';");
			if ( $sth->execute() ) {
				$t = $sth->fetchAll(PDO::FETCH_ASSOC);
				return $t[0]["value"];
			}
		}

		protected function routes($request) {
			$sth = $this->pdo->query("SELECT * FROM `routes`;");
			if ( $sth->execute() ) {
				$routes = $sth->fetchAll(PDO::FETCH_ASSOC);
			} else {
				throw new Exception("Routing Error", 1);
			}
			try {
				foreach ($routes as $map) {
	// Для того, что бы через виртуальные адреса можно было также передавать параметры
	// через QUERY_STRING (т.е. через "знак вопроса" - ?param=value),
	// необходимо получить компонент пути - path без QUERY_STRING, т.к. в ином
	// случае виртуальный адрес попросту не совпадет ни с одним паттерном из массива $routes.
	// Данные, переданные через QUERY_STRING, также как и раньше будут содержаться в
	// суперглобальных массивах $_GET и $_REQUEST.
					$url_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
	  
					if (preg_match($map['pattern'], $url_path, $matches)) {
	// Выталкиваем первый элемент - он содержит всю строку URI запроса
	// и в массиве $params он не нужен.
						array_shift($matches);
	  					unserialize($map["aliases"]);
	// Формируем массив $params с теми названиями ключей переменных,
	// которые мы указали в $routes
						foreach ($matches as $index => $value) {
							$this->params[$map['aliases'][$index]] = $value;
						}
	  
						$this->module = $map['class'];
						$this->action = $map['method'];
					}
			}
				throw new Exception( "Что-то пошло не так, или вы нашли страницу раньше наших администраторов!", 404);
			} catch (Exception $e) {
				return $e;
			}
		}
	}
?>