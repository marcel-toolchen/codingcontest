<?php

/**
 * 
 * Einfacher Autoloader, ersetzt Unterstriche (_) mit dem Ordnerseperator
 * im Klassennamen
 * @author Marcel
 *
 */
class Autoloader {

	/**
	 * 
	 * Laedt die Klasse
	 * @param string $className
	 */
	public static function load($className) {
		require_once strtolower(str_replace('_', DS, $className)) . '.php';
	}
	
}

?>