<?php
require_once __dir__."/../entity/user.php";
require_once __dir__."/../../database/database.php";

class User_DAO{
	public static function insert_query($values){
		$sql = "INSERT INTO user (user_ig, name, date, email, pass) VALUES ($values)";
		non_query($sql);
	}
	public static function select_query($condicion){
		$sql = "SELECT * FROM `user` WHERE $condicion";
		$result = response_query($sql);
		if( !$result ) return false;

		$i = 0;
		while($row = $result->fetch_assoc()) {
			$users[$i] = new User($row['id'], $row['user_ig'], $row['name'], $row['date'], $row['email'], $row['pass']);
			$i++;
	    }
	}	
}