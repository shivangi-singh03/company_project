<?php 

	session_start();
	session_destroy();
    $status='Deactive';
	header("location:index.php");
	exit;

?>