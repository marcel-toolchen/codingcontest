<?php

class App {

	protected $bootstrap = null;
	protected $dispatcher = null;
	protected $layout = null;
	protected $connector = null;
	
	public function __construct() {
		require_once 'autoloader.php';
		spl_autoload_register(array('Autoloader', 'load'));
	}
	
	public function run() {
		$this->bootstrap->run();
		
		if($this->connector !== null) {
			$this->connector->connect();
		}
		
		$content = $this->dispatcher->dispatch($this);
		$this->layout->set('base', BASE_URL);
		$this->layout->set('content', $content);
		
		print $this->layout->render();
	}
	
	/*
	 * Getters and Setters
	 */
	public function getBootstrap() {
		return $this->bootstrap;
	}

	public function getDispatcher() {
		return $this->dispatcher;
	}

	public function setBootstrap($bootstrap) {
		$this->bootstrap = $bootstrap;
	}

	public function setDispatcher($dispatcher) {
		$this->dispatcher = $dispatcher;
	}
	
	public function getLayout() {
		return $this->layout;
	}

	public function setLayout($layout) {
		$this->layout = $layout;
	}
	
	public function getConnector() {
		return $this->connector;
	}

	public function setConnector($connector) {
		$this->connector = $connector;
	}

}

?>