<?php

require_once __dir__."/../Models/Entity/UserEntity.php";
require_once __dir__."/../Models/Service/UserService.php";
require_once __dir__."/../Models/Dao/UserDao.php";

class UserController{	
	public static function Create_Account($data_user){
		$new_user = UserService::CreateUserRegister($data_user);
		if ( gettype($new_user) == 'array' ){
			foreach($new_user as $r){
				if($r){ echo $r.';'; }
			}
			return;
		}
		if ( $response = UserService::ValidateUser($new_user) ){
			foreach ($response as $value){
				echo $value.';';
			}
			return;
		};

		if ( $response = UserService::Register($new_user) ){
			echo "UserRegisterValid";
		} else {
			echo "ServerError";
		}
	}
	public static function Login_Account($data_user){
		$new_user = UserService::CreateUserLogin($data_user);
		if ( gettype($new_user) == 'array' ){
			foreach($new_user as $r){
				if($r){ echo $r.';'; }
			}
			return;
		}

		if(UserService::Login($new_user)){
			echo "UserLoginValid";
		} else {
			echo "UserLoginInvalid";
		}
	}
}