<?php
require_once __dir__."/../entity/user.php";
require_once __dir__."/../../database/database.php";

class User_DAO{
	public static function insert_query($user){
		$sql = "INSERT INTO user (user_ig, name, date, email, pass) VALUES ($user)";
		non_query($sql);
	}
}