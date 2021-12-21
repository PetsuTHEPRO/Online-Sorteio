<?php
require_once __dir__."/../Entity/UserEntity.php";
require_once __dir__."/../Dao/UserDao.php";

class UserService{
	public static function Register($user){
		if( UserDAO::insert_query($user->dbdata()) ){ return true; }
		else { return false; }
	}
	public static function Login($user){
		$condicion = "email = '".$user->_email."' and pass = '".$user->_password."'";

		if($user_response = UserDAO::select_query($condicion)){ 
			$user_login = $user_response[0];
			if($user_login == '') return false;
			return true;
		}
		else { return false; }
	}
	public static function ValidateUser($user, $type){
		$response = [];

		if( ! filter_var($user->_email , FILTER_VALIDATE_EMAIL) ){ array_push($response, 'EmailFormatInvalid'); }
		if( ! preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$/', $user->_password) ) { array_push($response, 'PassFormatInvalid'); }
		if( $type == 'register'){
			$date = explode ('-', $user->_date);
			if( ! preg_match('/^(?=.*[A-Za-z])[A-Za-z]{3,20}$/', $user->_name) ) { array_push($response, 'NameFormatInvalid'); }
			if( ! preg_match('/^[0-9A-Za-z._]{3,20}$/', $user->_user) ) { array_push($response, 'UserFormatInvalid'); }
			if( $user->_date != '' ){
				if( ! checkdate( $date[1] , $date[2] , $date[0] )                   
					|| $date[0] < 1900                                  
					|| mktime( 0, 0, 0, $date[1], $date[2], $date[0] ) > time() ) {
					array_push($response, 'DateInvalid');
				}
			}else{
				array_push($response, 'DateNull');
			}

			$validate_user = "user_ig = '$user->_user'";
			$validate_email = "email = '$user->_email'";

			if($user_response = UserDAO::select_query($validate_user)){ 
				if(  $user_response[0] ) array_push($response, 'UserRegisterInvalid');
			}
			if($user_response = UserDAO::select_query($validate_email)){ 
				if(  $user_response[0] ) array_push($response, 'EmailRegisterInvalid');
			}
		}
		return $response;
	}
}


