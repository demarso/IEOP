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
<center>
<div id="sitemain">
<div id="topo">
<? include("head.php"); ?> 
</div>
 <div id="menubox">
  <? include("menu.html"); ?> 
 </div>
<div id="main">
<center>
<table align="center" width="98%" border="1">
<tr align="center" bgcolor="#CCCCCC">
<td align="center" style="width: 15%"><font color="#333333"><b>ID</b></font></td>
<td align="center" style="width: 15%"><font color="#333333"><b>Matr&iacute;cula</b></font></td>
<td align="center" style="width: 43"><font color="#333333"><b>Nome</b></font></td>
<td align="center" style="width: 7%"><font color="#333333"><b>Ano</b></font></td>
<td align="center" style="width: 10%"><font color="#333333"><b>Mat&eacute;ria 1</b></font></td>
<td align="center" style="width: 10%"><font color="#333333"><b>Mat&eacute;ria 2</b></font></td>
</tr>
</table>
</center>
     <?php

include "conexao.php";
 $ano = date('Y');
 $matriculaR = '-';
 $id2 = '-';
 $matricula = '-';
 $nome2 = '-';
 $ano2 = '-';
 $materia1 = '-';
 $materia2 = '-';
 $turma = '-';
$sql = "SELECT * FROM notasDepend WHERE Ano = '$ano'";
 $resultado = mysqli_query($conexao,$sql) or die (mysql_error());
while ($linha = mysqli_fetch_array($resultado)) {
 	$matricula = $linha['Matricula'];
	$materia = $linha['Materia'];
 	$ano2 = $linha['Ano'];
	$turma = $linha['Turma'];
					
	$sql2 = "SELECT id, Nome FROM aluno WHERE Matricula = '$matricula'";
	$resultado2 = mysqli_query($conexao,$sql2) or die (mysql_error());
	while ($linha2 = mysqli_fetch_array($resultado2)) {
			$id2 = $linha2['id'];
			$nome2 = $linha2['Nome'];
	}
	//echo $id2." ".$nome2." ".$materia;
		
	if($matriculaR != $matricula){
	$sql2 = "INSERT INTO consDep(id,Matricula,Nome,Ano,Materia1,Materia2,Turma) VALUES ('$id2','$matricula','$nome2','$ano2','$materia','-','$turma')";
 	$result2 = mysqli_query($conexao,$sql2) or die ("Cadastro n&atilde;o realizado.");
 	}
 	else{
 	$query = mysqli_query($conexao,$sql = "UPDATE consDep SET Materia2='$materia' WHERE Matricula = '$matricula'") or die(mysql_error());
	}

    $matriculaR = $matricula;
    $id2 = '-';
	$matricula = '-';
	$nome2 = '-';
	$ano2 = '-';
	$materia1 = '-';
	$materia2 = '-';
 	$turma = '-';
}

$sql2 = "SELECT * FROM consDep WHERE Ano = '$ano' ORDER BY Nome";
$resultado2 = mysqli_query($conexao,$sql2) or die (mysql_error());
while ($linha2 = mysqli_fetch_array($resultado2)) {
	$con = $con + 1;
	$id2 = $linha2['id'];
	$matricula = $linha2['Matricula'];
	$nome2 = $linha2['Nome'];
	$ano2 = $linha2['Ano'];
	$materia1 = $linha2['Materia1'];
	$materia2 = $linha2['Materia2'];
 	$turma = $linha2['Turma'];
	
	if ($con % 2 == 0)
		 $bgcolor = "bgcolor='#FFFFFF'";
	else
		 $bgcolor = "bgcolor='#FFFFCC'"; 
?>

<center>
<table align="center" width="98%" border="1">
<tr align="center" <? echo $bgcolor; ?>>
<td align="center" style="width: 15%"><font color="#333333"><? echo $id2; ?></font></td>
<td align="center" style="width: 15%"><font color="#333333"><? echo $matricula; ?></font></td>
<td align="left" style="width: 43%"><font color="#333333"><? echo $nome2; ?></font></td>
<td align="center" style="width: 7%"><font color="#333333"><? echo $ano2; ?></font></td>
<td align="center" style="width: 10%"><font color="#333333"><? echo $materia1; ?></font></td>
<td align="center" style="width: 10%"><font color="#333333"><? echo $materia2; ?></font></td>
</tr>
</table>
</center>
<?
	$id2 = '-';
	$matricula = '-';
	$nome2 = '-';
	$ano2 = '-';
	$materia1 = '-';
	$materia2 = '-';
 	$turma = '-';  
}
//$query = mysqli_query($conexao,$sql = "DELETE FROM consDep") or die(mysql_error());
?>

  
   </div>
    
  
<div id='footer'>
<? include("footer.php"); ?>
</div>
</div>
</center>
</body>
</html>