<?php
require_once __dir__."/../entity/user.php";
require_once __dir__."/../dao/user-dao.php";

class User_Service{
	public static function Register_User($name, $email, $pass){
		$new_user = new User(123, $name, $email, $pass);
		$new_user->toString();
	}
}


