<?php
session_start();
require("include/arruma_link.php");
if (! isset($_SESSION['id'])){
header("Location: index.php?erro=1");
exit;
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
<title></title>
<link href="style.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="include/micoxAjax.js"></script>
<style type="text/css">
<!--
.style1 {
	font-size: 36px
}
-->
</style>
</head>

<body background="Fundo.png">
<?
// Conexão com o banco de dados
include("conexao.php");

	
	$sql = "SELECT * FROM aluno";
	$resultado = mysql_query($sql) or die (mysql_error());
	while ($linha = mysql_fetch_array($resultado))
	{
	$matricula = $linha['Matricula'];
	$turma = $linha['Turma'];	
	$segmento = $linha['Segmento'];
	$ano = date("Y");
 
 	if ($segmento == 1 or $segmento == 2){	 
		 $sql3 = "SELECT Materia FROM materia WHERE Segmento = '$segmento' OR Segmento = '3' ORDER BY id";
 
		 $resultado3 = mysql_query($sql3) or die (mysql_error());
 
 		while ($linha3 = mysql_fetch_array($resultado3))
		{
			$materia = $linha3['Materia'];
 
 $sql2 = "INSERT INTO notas(Matricula,Ano,Materia) VALUES('$matricula','$ano','$materia')";
 
 $result2 = mysql_query($sql2,$conexao) or die ("Cadastro Materias para Notas não realizado.");
}}}
			echo "<font face=verdana size=1>O cadastro foi realizado com sucesso.</font>";
echo "\n";
		
	
		
   mysql_close($conexao);
  /*echo "<script type = 'text/javascript'> location.href = 'Aluno.php'</script>";*/
  echo "<script type = 'text/javascript' >  window.open('FichaMatricula.php?Matr=$matricula', '_blank');</script>";			
?>

</body>
</html>
