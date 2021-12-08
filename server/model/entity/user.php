<?php

class User{
	var $_id;
	var $_name;
	var $_email;
	var $_password;

	function __construct($id, $name, $email, $password){
		$this->_id = $id;
		$this->_name = $name;
		$this->_email = $email;
		$this->_password = $password;
	}
	function toString(){
		echo "$this->_id, $this->_email, $this->_name, $this->_password";
	}
}