<?php

function non_query($sql){
	if($conn = open_connection_database()){
		if ($conn->query($sql) === TRUE) {
			close_connection_database($conn);
			return true;
		}else {
			echo "Error: " . $sql . " | " . $conn->error;
		}
	}
}
function response_query($sql){
	if($conn = open_connection_database()){
		if ($result = $conn->query($sql)) {
			if ($result->num_rows > 0) {
				close_connection_database($conn);
			  	return $result;
			} else {
				close_connection_database($conn);
			  	return false;
			}
		}else {
			echo "Error: " . $sql . " | " . $conn->error;
		}
	}
}

function open_connection_database(){
	$server = "localhost";
	$username = "usuariodb";
    $password = "7Li06d3*t09gqwzC";
    $dbname = "dbonlinesorteio";
	$conn = mysqli_connect($server, $username, $password, $dbname);
	if ($conn->connect_error) {
		echo "Connection failed: " . $conn->connect_error ;
	}
	return $conn;
}
function close_connection_database($conn){
	$conn->close();
}