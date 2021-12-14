<?php

require_once __dir__."/../Models/Entity/UserEntity.php";
require_once __dir__."/../Models/Service/UserService.php";

class UserController{

	public static function Create_Account($data_user){
		$ServiceUser = new UserService();
		if($response = $ServiceUser->Register($data_user)){
			if ( gettype($response) == 'string' ) echo $response ;
			else echo "UserRegisterValid";
		} else {
			echo "ServerError";
		}
	}

	public static function Login_Account($data_user){
		$ServiceUser = new UserService();
		if($ServiceUser->Login($data_user)){
			echo "UserLoginValid";
		} else {
			echo "UserLoginInvalid";
		}
	}
}