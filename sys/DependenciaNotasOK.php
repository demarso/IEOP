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

   <div id="palco2"><br /><br />
   <?
   include("conexao.php");
   $nome2 = $_POST["Nome"];
   $nasc2 = $_POST["Nascimento"];
   $matricula2 = $_POST['Matricula'];
	$ano2 = $_SESSION["AnoLetivo"];
	$materia = $_POST['Materia'];
	$bim1 = $_POST['Bim1'];
	$bim2 = $_POST['Bim2'];
	$bim3 = $_POST['Bim3'];
	$bim4 = $_POST['Bim4'];
	$faltas1 = $_POST['Faltas1'];
	$faltas2 = $_POST['Faltas2'];
	$faltas3 = $_POST['Faltas3'];
	$faltas4 = $_POST['Faltas4'];
   
  
   	  
	   $query = mysqli_query($conexao,$sql = "UPDATE notasDepend SET Bim1='$bim1',Faltas1='$faltas1',Bim2='$bim2',Faltas2='$faltas2,Bim3='$bim3',Faltas3='$faltas3',Bim4='$bim4',Faltas4='$faltas4' WHERE Matricula = '$matricula' && Materia = '$materia' && Ano = '$ano2'") or die(mysql_error());
	   
 
 echo "<font face=verdana size=1>O lançamento das notas foi realizado com sucesso.</font>";
 echo "<br />";
 
  echo "<script type = 'text/javascript'> location.href = 'DependenciaNotas.php'</script>";
	?>
   </div> 
   </div>
     
  
<div id='footer'>
<? include("footer.php"); ?>
</div>
</div>
</center>
</body>
</html>
