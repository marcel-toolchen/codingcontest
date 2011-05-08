<?php

class Api_GoogleMap {

	public static $url = '';
	
	public static function getCoordinates($address) {
		$address = rawurlencode($address);
		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_URL, Api_GoogleMap::$url . '&q=' . $address);
		$result = curl_exec($ch);
		curl_close($ch);
		
		$result = json_decode($result);
		$coordinates = array('lat' => 0, 'lon' => 0);
		
		if(isset($result->Placemark[0]->Point->coordinates)) {
			$coordinates['lon'] = $result->Placemark[0]->Point->coordinates[0];
			$coordinates['lat'] = $result->Placemark[0]->Point->coordinates[1];
		}
		
		return $coordinates;
	}
	
}

?>