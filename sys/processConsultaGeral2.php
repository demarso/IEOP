<?php
session_start();
header('Content-type: text/html; charset=UTF-8');
require_once("conexao.php");
if ( !empty($_GET["Nome"]) ) {
    $nome2 = $_GET["Nome"];
	$ano = $_SESSION["AnoLetivo"];
	$sql = "SELECT DISTINCT Matricula, DATE_FORMAT(Nascimento,'%d/%m/%Y') as iNascimento FROM histMatr WHERE Nome  = '$nome2'";
	$results = mysqli_query($conexao,$sql) or die (mysql_error());
	if(mysqli_num_rows($results)){
		
		while ( $row = mysqli_fetch_array($results)) {
			echo $row['iNascimento'];
		}
	}
	 else {
		echo "";
	 }
}
 else {
	echo "";
}
 
?>