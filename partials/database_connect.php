<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "donationportal";

//create a connection
$con = mysqli_connect($servername, $username, $password, $database);

if (!$con) {
	die("sorry we failed to connect" . mysqli_connect_error());

}

?>