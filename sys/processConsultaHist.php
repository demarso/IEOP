<?php
  header("Content-Type: text/html;  charset=ISO-8859-1",true);
require_once("conexao.php");
 session_start();
if ( !empty($_GET["Nome"]) ) {
    $nome2 = $_GET["Nome"];
	$sql = "SELECT Matricula FROM aluno WHERE Nome  = '$nome2'";
	$results = mysqli_query($sql) or die (mysql_error());
	if(mysqli_num_rows($results)){
		
		while ( $row = mysqli_fetch_array($results )) {
			echo $row['Matricula'];
		}
	}
	 else {
		echo "Aluno não existe";
	 }
}
 else {
	echo "";
}
 
?>