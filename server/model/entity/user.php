<?php

class User{
	var $_id;
	var $_user;
	var $_name;
	var $_date;
	var $_email;
	var $_password;

	function __construct($id, $user, $name, $date, $email, $password){
		$this->_id = $id;
		$this->_user = $user;
		$this->_name = $name;
		$this->_date = $date;
		$this->_email = $email;
		$this->_password = $password;
	}
}