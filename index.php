<?php
	
	define('APP_DIR', 'app');
	define('DS', DIRECTORY_SEPARATOR);
	define('ROOT', dirname(__FILE__));
	
	ini_set('include_path',
		ini_get('include_path') . PATH_SEPARATOR . ROOT . DS . APP_DIR . DS
	);
	
	require_once APP_DIR . DS . 'app.php';
	
	$app = new App();
	$app->setDispatcher(new Dispatcher($app));
	$app->setBootstrap(new Bootstrap_Standard($app));
	$app->setConnector(new Database_Mysql());
	$app->setLayout(new Layout(ROOT . DS . 'views' . DS . 'layout', 'default'));
	
	$app->run();
	
	function pr($val) {
		print '<pre>';
		print_r($val);
		print '</pre>';
	}