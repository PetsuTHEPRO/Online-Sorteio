<?php
require_once __dir__."/../Entity/UserEntity.php";
require_once __dir__."/../Dao/UserDao.php";

class UserService{
	public static function Register($data_user){
		$new_user = new User(000, $data_user['user'], $data_user['name'], $data_user['datebirth'], $data_user['email'], $data_user['password']);
		$dao_user = new UserDAO();

		$validate_user = "user_ig = '$new_user->_user'";
		$validate_email = "email = '$new_user->_email'";

		$Invalid = '';
		if($user_response = $dao_user->select_query($validate_user)){ 
			$user_login = $user_response[0];
			if($user_login != '') $Invalid = $Invalid.'UserRegisterInvalid;';
		}
		if($user_response = $dao_user->select_query($validate_email)){ 
			$user_login = $user_response[0];
			if($user_login != '') $Invalid = $Invalid.'EmailRegisterInvalid';
		}
		if( $Invalid != '' ) return $Invalid;

		if($dao_user->insert_query($new_user->dbdata())){ return true; }
		else { return false; }
	}

	public static function Login($data_user){
		$dao_user = new UserDAO();
		$condicion = "email = '".$data_user['email']."' and pass = '".$data_user['password']."'";
		if($user_response = $dao_user->select_query($condicion)){ 
			$user_login = $user_response[0];
			if($user_login == '') return false;
			return true;
		}
		else { return false; }
	}
}


