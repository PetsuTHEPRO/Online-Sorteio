<?php

require_once __dir__."/../controller/user-controller.php";

function main_routes($data_request){
	switch ($data_request['cmnd']) {
	 	case "create_register":
	 		Create_Account($data_request);
	 		//echo "{ main_routes | create_register } : Send Request !";
	 		break;
	 	
	 	default:
	 		//echo "{ main_routes | create_register } : Invalid Request !";
	 		break;
	}
}