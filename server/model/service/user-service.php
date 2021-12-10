<?php
require_once __dir__."/../entity/user.php";
require_once __dir__."/../dao/user-dao.php";

class User_Service{

	public static function Register($data_user){
		$new_user = new User(000, $data_user['user'], $data_user['name'], $data_user['datebirth'], $data_user['email'], $data_user['password']);
		$dao_user = new User_DAO();
		if($dao_user->insert_query($new_user->dbdata())){ return true; }
		else { return false; }
	}

	public static function Login($data_user){
		$dao_user = new User_DAO();
		$codicion = "email = '".$data_user['email']."' and pass = '".$data_user['password']."'";
		if($user_response = $dao_user->select_query($codicion)){ 
			return true; 
		}
		else { return false; }
	}

}


