<?php

require_once __dir__."/controller/user-controller.php";

$controller_user = new User_Controller();
$controller_user->Create_Account('vjr', '@.com', '123');

