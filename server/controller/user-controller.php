<?php

require_once __dir__."/../model/service/user-service.php";

function Create_Account($data_user){
	$service_user= new User_Service();
	if($service_user->Register($data_user)){
		echo "";
	} else {
		echo "";
	}
}