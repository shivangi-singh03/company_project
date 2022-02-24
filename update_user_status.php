<?php
session_start();
include('connect.php');
$uid=$_SESSION['UID'];
$time=time()+10;
$res=mysqli_query($con,"update user set status=$time where id=$id");
?>