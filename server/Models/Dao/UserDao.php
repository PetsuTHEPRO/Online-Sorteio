<?php
require_once __dir__."/../Entity/UserEntity.php";
require_once __dir__."/../../Database/Database.php";

class UserDAO{
	public static function insert_query($values){
		$sql = "INSERT INTO user (user_ig, name, date, email, pass) VALUES ($values)";
		if ( non_query($sql) ) return true;
		else return false;
	}
	public static function select_query($values, $condicion){
		$sql = "SELECT $values FROM user WHERE $condicion";
		$result = response_query($sql);
		if( !$result ) return false;

		$i = 0;
		while($row = $result->fetch_assoc()) {
			$response[$i] = $row;
			$i++;
	    }
		return $response;
	}	
}