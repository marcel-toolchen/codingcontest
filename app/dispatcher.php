<?php

class Dispatcher {

	protected $app;
	
	public function __construct($app = null) {
		$this->app = $app;
	}
	
	public function dispatch($app) {
		if($_GET['q'] == '') {
			$controller = new Controller_Index($app);
			$content = $controller->index();
		} else {
			$query = explode('/', $_GET['q']);
			
			$controller = 'Controller_' . $query[0];
			$file = ROOT . DS . 'app' . DS . strtolower(str_replace('_', DS, $controller)) . '.php';
			$action = $query[1];
			
			if(!file_exists($file)) {
				return $this->error('404');
			}
			
			unset($query[0]);
			unset($query[1]);
			
			$controller = new $controller($app);
			
			if(!method_exists($controller, $action)) {
				return $this->error('404');
			}
			
			eval('$content = $controller->' . $action . '(' . implode(', ', $query) . ');');
		}
		
		return $content;
	}
	
	public function error($error = '') {
		$controller = new Controller_Error($this->app);
		return $controller->error($error);
	}
	
}

?>