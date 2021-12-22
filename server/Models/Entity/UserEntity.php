<?php

class User{
	private $_id;
	private $_userIG;
	private $_name;
	private $_datebirth;
	private $_email;
	private $_password;

	public function dbdata(){
		return (string) "'$this->_userIG', '$this->_name', '$this->_datebirth', '$this->_email', '$this->_password'";
	}
	public function setId($id){
		$this->_id = $id;
	}
	public function setUserIG($userIG){
		if( ! preg_match('/^[0-9A-Za-z._]{3,20}$/', $userIG) ) {
			return 'UserFormatInvalid';
		}
		$this->_userIG = $userIG;
	}
	public function getUserIG(){
		return $this->_userIG;
	}
	public function setName($name){
		if( ! preg_match('/^(?=.*[A-Za-z])[A-Za-z]{3,20}$/', $name) ) { 
			return 'NameFormatInvalid';
		}
		$this->_name = $name;
	}
	public function setDatebirth($datebirth){
		if( $datebirth != '' ){
			$datebirthAux = explode ('-', $datebirth);
			if( ! checkdate( $datebirthAux[1] , $datebirthAux[2] , $datebirthAux[0] )                   
				|| $datebirthAux[0] < 1900                                  
				|| mktime( 0, 0, 0, $datebirthAux[1], $datebirthAux[2], $datebirthAux[0] ) > time() ) {
				return 'DatebirthInvalid';
			}
		}else{
			return 'DatebirthNull';
		}
		$this->_datebirth = $datebirth;
	}
	public function setEmail($email){
		if( ! filter_var($email , FILTER_VALIDATE_EMAIL) ){
			return 'EmailFormatInvalid';
		}
		$this->_email = $email;
	}
	public function getEmail(){
		return $this->_email;
	}
	public function setPassword($password){
		if( ! preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$/', $password) ) { 
			return 'PassFormatInvalid'; 
		}
		$this->_password = $password;
	}
	public function getPassword(){
		return $this->_password;
	}
}