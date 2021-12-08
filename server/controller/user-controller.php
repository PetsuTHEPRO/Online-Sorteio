<?php

require_once __dir__."/../model/service/user-service.php";

class User_Controller{
	function Create_Account($name, $email, $pass){
		$service_user= new User_Service();
		$service_user->Register_User($name, $email, $pass);
	}	
}