<?php
require_once __dir__."/../entity/user.php";
require_once __dir__."/../dao/user-dao.php";

class User_Service{
	var dao_user = new User_DAO();

	public static function Register_User($data_user){
		$new_user = new User(123, $data_user['user'], $data_user['name'], $data_user['datebirth'], $data_user['email'], $data_user['password']);
		$dao_user->non_query($new_user);
	}
}


