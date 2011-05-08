<?php

class Database_Mysql extends Connector {

	public function connect() {
		mysql_connect(DB_HOST, DB_USER, DB_PASS);
		mysql_select_db(DB_BASE);
		mysql_set_charset('utf8');
	}
	
	public function query($query) {
		return mysql_query($query);
	}
	
	public function fetch($query) {
		$result = $this->query($query);
		$rows = array();
		
		while($row = mysql_fetch_object($result)) {
			$rows[] = $row;
		}
		
		return $rows;
	}
	
}

?>