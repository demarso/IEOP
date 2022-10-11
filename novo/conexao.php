<?php
    $conn = mysqli_connect('localhost','ieopcom','Ieop@2018','ieopcom_ieop');
	mysqli_query($conn,"SET NAMES 'utf8'");
	mysqli_query($conn,'SET character_set_connection=utf8');
	mysqli_query($conn,'SET character_set_client=utf8');
	mysqli_query($conn,'SET character_set_results=utf8');
	mysqli_set_charset($conn,"utf8");
	if (!$conn) {
	   die('N&atilde;o conseguiu conectar: ' . mysql_error());
	}
?>