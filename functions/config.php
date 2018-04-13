<?php
define('date', date('d-m-Y'));
class Config {
	public function connection(){
		$host = 'localhost:3301';

		
		$db_user = 'root';
		$db_pass = '';
		$db_name = 'db_lab';
		
		
		$db = new mysqli($host, $db_user, $db_pass, $db_name);
		if($db->connect_error) {
				die('Could Not Connect: ' . $db->connect_error);
		}
		return $db;
	}
}
?>