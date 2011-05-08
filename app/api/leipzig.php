<?php

class Api_Leipzig {

	public static $url = '';
	public static $apiKey = '';
	
	public static function execute($command, $params = array()) {
		$parameters = '';
		
		foreach($params as $param => $value) {
			$parameters .= '&' . $param . '=' . $value;
		}
		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_URL, Api_Leipzig::$url . $command . '?api_key=' . Api_Leipzig::$apiKey . $parameters);
		$result = curl_exec($ch);
		curl_close($ch);
		
		return $result;
	}
	
//	public static function getCompany($id) {
//		$result = Api_Leipzig::execute('mediahandbook/companies/' . $id);
//		$result = json_decode($result);
//		
//		return new Model_Company($result);
//	}
//	
//	public static function getBranch($id) {
//		$result = Api_Leipzig::execute('mediahandbook/branches/' . $id);
//		$result = json_decode($result);
//		
//		return new Model_Branch($result);
//	}
	
	public static function getBranches($limit = 0, $offset = 0) {
		$result = Api_Leipzig::execute('mediahandbook/branches', array('limit' => $limit, 'offset' => $offset));
		$result = json_decode($result);
		$result = $result->data;
		
		return $result;
	}
	
	public static function getCompanies($limit = 0, $offset = 0) {
		$result = Api_Leipzig::execute('mediahandbook/companies', array('limit' => $limit, 'offset' => $offset));
		$result = json_decode($result);
		$result = $result->data;
		
		return $result;
	}
	
	public static function countCompanies() {
		$result = Api_Leipzig::execute('mediahandbook/companies/count');
		$result = json_decode($result);
		
		return $result->count;
	}
	
	public static function countBranches() {
		$result = Api_Leipzig::execute('mediahandbook/branches/count');
		$result = json_decode($result);
		
		return $result->count;
	}
	
}

?>