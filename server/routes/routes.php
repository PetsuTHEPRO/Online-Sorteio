<?php

require_once __dir__."/../Controllers/UserController.php";

function main_routes($data_request){
	$ControllerUser = new UserController();

	switch ($data_request['cmnd']) {
	 	case "create_register":
	 		$ControllerUser->Create_Account($data_request);
	 		break;
	 	case "login_user":
			$ControllerUser->Login_Account($data_request);
			break;
	 	default:
	 		break;
	}
}