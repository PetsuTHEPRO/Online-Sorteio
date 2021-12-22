<?php
require_once __dir__."/../Entity/UserEntity.php";
require_once __dir__."/../Dao/UserDao.php";

class UserService{
	public static function CreateUserRegister($data_user){
		$new_user = new User();
		$response = [];

		array_push($response, $new_user->setName($data_user['name']));
		array_push($response, $new_user->setUserIG($data_user['user']));
		array_push($response, $new_user->setDatebirth($data_user['datebirth']));
		array_push($response, $new_user->setEmail($data_user['email']));
		array_push($response, $new_user->setPassword($data_user['password']));

		foreach($response as $r){
			if($r){ return $response; }
		}

		return $new_user;
	}
	public static function CreateUserLogin($data_user){
		$new_user = new User();
		$response = [];

		array_push($response, $new_user->setEmail($data_user['email']));
		array_push($response, $new_user->setPassword($data_user['password']));

		foreach($response as $r){
			if($r){ return $response; }
		}

		return $new_user;
	}
	public static function Register($user){
		if( UserDAO::insert_query($user->dbdata()) ){ return true; }
		else { return false; }
	}
	public static function Login($user){
		$condicion = "email = '".$user->getEmail()."' and pass = '".$user->getPassword()."'";

		if($user_response = UserDAO::select_query('email, pass', $condicion)){ 
			$user_login = $user_response[0];
			if($user_login == '') return false;
			return true;
		}
		else { return false; }
	}
	public static function ValidateUser($user){
		$response = [];

		$validate_user = "user_ig = '".$user->getUserIG()."'";
		$validate_email = "email = '".$user->getEmail()."'";

		if($user_response = UserDAO::select_query('id', $validate_user)){ 
			if( $user_response[0] ) array_push($response, 'UserRegisterInvalid');
		}
		if($user_response = UserDAO::select_query('id', $validate_email)){ 
			if( $user_response[0] ) array_push($response, 'EmailRegisterInvalid');
		}
		
		return $response;
	}
}


