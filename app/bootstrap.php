<?php

class Bootstrap {

	protected $app;
	
	public function __construct($app = null) {
		$this->app = $app;
	}
	
	public function run() {
		$methods = get_class_methods($this);
		
		foreach($methods as $method) {
			if(substr($method, 0, 1) == '_') {
				$this->$method();
			}
		}
	}
	
}

?>