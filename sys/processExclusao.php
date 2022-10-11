<?php
 
require_once("conexao.php");
 session_start();
if ( !empty($_GET["Matr"]) ) {
    $matricula2 = $_GET["Matr"];
	$sql = "SELECT Nome FROM aluno WHERE Matricula = '$matricula2'";
	$results = mysqli_query($conexao,$sql) or die (mysql_error());
	if(mysqli_num_rows($results)){
		echo "<option value=''>Selecione</option>";
		while ( $row = mysqli_fetch_array($results )) {
			echo "<option value='".$row[0]."'>".$row[0]."</option>";
		}
	}
	 else {
		echo "<option value=''>Sem aluno</option>";
	 }
}
 else {
	echo "<option value=''>- Selecione -</option>";
}
 
?>