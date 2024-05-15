<?php 
	$connection = new mysqli('localhost', 'root','','dbwanderlog');
	
	if (!$connection){
		die (mysqli_error($mysqli));
	}	
?>