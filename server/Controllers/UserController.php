<?php

require_once __dir__."/../Models/Entity/UserEntity.php";
require_once __dir__."/../Models/Service/UserService.php";
require_once __dir__."/../Models/Dao/UserDao.php";

class UserController{	
	public static function Create_Account($data_user){
		$new_user = new User(0000, 
			$data_user['user'],
			$data_user['name'], 
			$data_user['datebirth'], 
			$data_user['email'], 
			$data_user['password']
		);
		if ( $response = UserService::ValidateUser($new_user, 'register') ){
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
		$new_user = new User(0000, 
			'xxx',
			'xxx', 
			'2000-01-01', 
			$data_user['email'], 
			$data_user['password']
		);
		if ( $response = UserService::ValidateUser($new_user, 'login') ){
			foreach ($response as $value){
				echo $value.';';
			}
			return;
		};

		if(UserService::Login($new_user)){
			echo "UserLoginValid";
		} else {
			echo "UserLoginInvalid";
		}
	}
}