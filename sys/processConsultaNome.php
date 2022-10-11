<?php
  header("Content-Type: text/html; charset=ISO-8859-1",true);
  require_once("conexao.php");
  session_start();
    $nomm = $_GET["Nomm"];
	$anoM = $_SESSION["AnoLetivo"];
	$sql = "SELECT Nome FROM aluno WHERE Nome  = '$nomm'";
	$results = mysqli_query($conexao,$sql) or die (mysql_error());
	  while ( $row = mysqli_fetch_array($results )) {
		if(!empty($row["Nome"]))
		   echo $row["Nome"].'        ';
		   echo "<script>alert('Este Nome ja Existe no Sistema - Rematricule!!'); location.reload(true);</script>";
	       exit; 
      }

?>