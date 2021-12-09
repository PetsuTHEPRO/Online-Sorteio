<?php

require_once __dir__."/routes/routes.php";

$Data_Json = file_get_contents('php://input');
$Data_Request = json_decode($Data_Json, true);

$response = main_routes($Data_Request);

header('Content-type: application/json');
$response = json_encode($response);
echo $response;