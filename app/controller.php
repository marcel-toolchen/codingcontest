<?php

class Controller {

	protected $view = null;
	protected $app = null;
	protected $connector = null;
	
	public function __construct($app = null) {
		$this->app = $app;
		$this->connector = $app->getConnector();
		$this->view = new View(ROOT . DS . 'views' . DS . str_replace('Controller_', '', get_class($this)), '');
		$this->view->set('base', BASE_URL);
	}
	
	protected function render($view) {
		$this->view->setView($view);
		return $this->view->render();
	}
	
	protected function set($name, $value) {
		$this->view->set($name, $value);
	}
	
	protected function getLayout() {
		return $this->app->getLayout();
	}
	
}

?>