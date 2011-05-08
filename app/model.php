<?php

abstract class Model {

	protected $connector = null;
	
	public function __construct($connector) {
		$this->connector = $connector;
	} 
	
	public function getConnector() {
		return $this->connector;
	}
	
	public function setConnector($connector) {
		$this->connector = $connector;
	}
	
}

?>