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
		$this->_user = trim($user);
		$this->_name = trim($name);
		$this->_date = trim($date);
		$this->_email = trim($email);
		$this->_password = trim($password);
	}
	function dbdata(){
		return (string) "'$this->_user', '$this->_name', '$this->_date', '$this->_email', '$this->_password'";
	}
}