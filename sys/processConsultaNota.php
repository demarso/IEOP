<?php
  header("Content-Type: text/html;  charset=ISO-8859-1",true);
require_once("conexao.php");
 session_start();
if ( !empty($_GET["Matr"]) ) {
    $matricula2 = $_GET["Matr"];
	$sql = "SELECT Nome, Segmento FROM aluno WHERE Matricula  = '$matricula2'";
	$results = mysqli_query($conexao,$sql) or die (mysql_error());
	if(mysqli_num_rows($results)){
		
		while ( $row = mysqli_fetch_array($results )) {
			if ( $row[1] == 0)
			   echo "** ALUNO NÃO FAZ PROVAS **";
			else
			echo $row[0];
		}
	}
	 else {
		echo "Sem aluno";
	 }
}
 else {
	echo "";
}
 
?>