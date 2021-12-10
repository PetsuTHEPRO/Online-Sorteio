<?php
require_once __dir__."/../entity/user.php";
require_once __dir__."/../dao/user-dao.php";

class User_Service{

	public static function Register($data_user){
		$new_user = new User(000, $data_user['user'], $data_user['name'], $data_user['datebirth'], $data_user['email'], $data_user['password']);
		$dao_user = new User_DAO();
		if($dao_user->insert_query($new_user->dbdata())){ return true; }
		else { return false };
	}

	public static function Login(){

	}

}


