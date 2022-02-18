<?php
//session_start();

$server="localhost";
$username="root";
$password="";
$database="pro";
//$errors=array();
$conn=mysqli_connect($server, $username, $password, $database);
if($conn)
{
   echo "Success";
 }
 else{
    die("Error". mysqli_connect_error());
}

?>