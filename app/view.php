<?php

class View {

	protected $view = '';
	protected $path = '';
	protected $args = array();
	
	public function __construct($path, $view) {
		$this->path = strtolower($path);
		$this->view = strtolower($view);
	}
	
	public function set($name, $value) {
		$this->args[$name] = $value;
	}
	
	public function __get($name) {
		return $this->args[$name];
	}
	
	public function render() {
		if($this->view === null) {
			return;
		}
		
		ob_start();
		include($this->path . DS . $this->view . '.tpl');
		$content = ob_get_contents();
		ob_end_clean();
		
		return $content;
	}
	
	public function getView() {
		return $this->view;
	}

	public function getPath() {
		return $this->path;
	}

	public function setView($view) {
		$this->view = $view;
	}

	public function setPath($path) {
		$this->path = $path;
	}
	
	public function getBase() {
		return $this->base;
	}

	public function setBase($base) {
		$this->base = $base;
	}
	
}

?>