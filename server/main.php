<?php

require_once __dir__."/Routes/Routes.php";

$Data_Json = file_get_contents('php://input');
$Data_Request = json_decode($Data_Json, true);

main_routes($Data_Request);

//header('Content-type: application/json');

