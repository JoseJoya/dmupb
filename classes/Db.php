<?php

// Create connection

//DB CONECTION
function dbConnection(){

	$con = mysql_connect("localhost", "root", "1098739898-")or die("cannot connect");
	mysql_select_db("int2013")or die("cannot select DB");
	
	
	// Check connection
	if (mysqli_connect_errno($con))
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
}

//DB DISCONNECT
function dbDisconnect($con){

	//CHECK CONNECTION
	if (mysqli_connect_errno($con))
	{
		echo "Failed to disconnect to MySQL: " . mysqli_connect_error();
	}
	//DISCONNECT TO DB
	mysqli_close($con);
}

