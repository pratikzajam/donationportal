<?php 
include 'partials/database_connect.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {

	
	$name = $_POST['name'];
	$amount = $_POST['amount'];
	

	$sql = "INSERT INTO `donation` ( `name`, `amount`) VALUES ('$name','$amount')";

	

	$result = mysqli_query($con, $sql);

}

?>