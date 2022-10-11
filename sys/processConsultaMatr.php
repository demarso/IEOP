<?php
  header("Content-Type: text/html; charset=ISO-8859-1",true);
  require_once("conexao.php");
  session_start();
    $matr = $_GET["Matr"];
	$anoM = $_SESSION["AnoLetivo"];
	$sql = "SELECT Matricula, Nome FROM aluno WHERE Matricula  = '$matr'";
	$results = mysqli_query($conexao,$sql) or die (mysql_error());
	  while ( $row = mysqli_fetch_array($results )) {
		if(!empty($row["Matricula"]))
		   echo $row["Nome"].'        ';
		   echo "<script>alert('Aluno ja Matriculado!!'); location.reload(true);</script>";
	       exit; 
      }

?>