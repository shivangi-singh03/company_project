<!-- <?php 

	$host = "localhost";
	$username = "root";
	$password = "";
	$db_name = "project_database";
	$con=new mysqli($host, $username, $password);
	if(!$con) {
		die("Cannot connect to the database");
	}
	$sql="CREATE DATABASE IF NOT EXISTS '$db_name'";
	$con->query($sql);
	//mysqli_query($con,$sql1);
	echo $con->error;


?>  -->
<?php
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$con = mysqli_connect($servername, $username, $password);
// Check connection
if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}

// Create database
$sql = "CREATE DATABASE IF NOT EXISTS db";
if (!mysqli_query($con, $sql)) {
  echo "Database created successfully";
} else {
  echo mysqli_error($con);
}
mysqli_close($con);

$con = mysqli_connect($servername, $username, $password,'db');
// Check connection
if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}

// sql to create table
$sql = "CREATE TABLE user (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(30) NOT NULL,
username VARCHAR(30) NOT NULL,
email VARCHAR(50),
password VARCHAR(50),
status VARCHAR(100)
)";
mysqli_query($con, $sql);
 
$sql = "CREATE TABLE score (
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	username VARCHAR(30) NOT NULL,
	total VARCHAR(30) NOT NULL,
	win VARCHAR(50),
	loss VARCHAR(50),
	draw VARCHAR(50)
	)";
	
	mysqli_query($con, $sql);
	

?>
