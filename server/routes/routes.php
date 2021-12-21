<?php

require_once __dir__."/../Controllers/UserController.php";

function main_routes($data_request){
	switch ($data_request['command']) {
	 	case "create_register":
			UserController::Create_Account($data_request);
	 		break;
	 	case "login_user":
			UserController::Login_Account($data_request);
			break;
	 	default:
	 		break;
	}
}