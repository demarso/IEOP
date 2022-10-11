<?php
  header("Content-Type: text/html;  charset=ISO-8859-1",true);
require_once("conexao.php");
 session_start();
if ( !empty($_GET["Turma"]) ) {
    $turma2 = $_GET["Turma"];
	$ano = $_SESSION["AnoLetivo"];
	$sql = "SELECT Segmento FROM turmas WHERE Ano = '$turma2'";
	$results = mysqli_query($conexao,$sql) or die (mysql_error());
	if(mysqli_num_rows($results)){
		
		while ( $row = mysqli_fetch_array($results )) {
			echo $row['Segmento'];
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