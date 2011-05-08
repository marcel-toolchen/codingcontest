<?php

class Bootstrap_Standard extends Bootstrap {
	
	protected function _initConfig() {
		require_once ROOT . DS . 'config' . DS . 'config.inc';
	}
	
	protected function _initLeipzigApi() {
		Api_Leipzig::$url = 'http://178.77.99.225/api/v1/';
		Api_Leipzig::$apiKey = 's9aOIYPVh5Ml66dBQAcD';
	}
	
	protected function _initGoogleMapApi() {
		Api_GoogleMap::$url = 'http://maps.google.com/maps/geo?output=json&hl=de';
	}

}

?>