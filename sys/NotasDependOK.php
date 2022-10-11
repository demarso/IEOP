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
   $conta = $_SESSION['conta'];
   $matricula = $_SESSION['matricula'];
   $bimestre2 = $_SESSION["bim"];
  $ano = $_SESSION["AnoLetivo"];
  
   // echo "Bimestre= ".$bimestre; echo "<br />"; 
   
for ($n=0;$n<$conta;$n++){
	 
	   $materia2 = $_POST['Materias'];
	  if ($bimestre2 == 1){
	   $notas1 = $_POST['Notas'];
	   $faltas1 = $_POST['Faltas'];
	  
	   $query = mysqli_query($conexao,$sql = "UPDATE notasDepend SET Bim1='$notas1[$n]',Faltas1='$faltas1[$n]' WHERE Matricula = '$matricula' && Materia = '$materia2[$n]' && Ano = '$ano'") or die(mysql_error());
	   }
	  if ($bimestre2 == 2){
	   $notas2 = $_POST['Notas'];
	   $faltas2 = $_POST['Faltas'];
	   $query = mysqli_query($conexao,$sql = "UPDATE notasDepend SET Bim2='$notas2[$n]',Faltas2='$faltas2[$n]' WHERE Matricula = '$matricula' && Materia = '$materia2[$n]' && Ano = '$ano'") or die(mysql_error());
	   }
	  if ($bimestre2 == 3){
	   $notas3 = $_POST['Notas'];
	   $faltas3 = $_POST['Faltas'];
	   $query = mysqli_query($conexao,$sql = "UPDATE notasDepend SET Bim3='$notas3[$n]',Faltas3='$faltas3[$n]' WHERE Matricula = '$matricula' && Materia = '$materia2[$n]' && Ano = '$ano'") or die(mysql_error());
	   }
	  if ($bimestre2 == 4){
	   $notas4 = $_POST['Notas'];
	   $faltas4 = $_POST['Faltas'];
	    $query = mysqli_query($conexao,$sql = "UPDATE notasDepend SET Bim4='$notas4[$n]',Faltas4='$faltas4[$n]' WHERE Matricula = '$matricula' && Materia = '$materia2[$n]' && Ano = '$ano'") or die(mysql_error()); 
	   }
 }
 echo "<font face=verdana size=1>O lançamento das notas foi realizado com sucesso.</font>";
 echo "<br />";
 
   	echo "<script type = 'text/javascript'> location.href = 'NotasDepend.php'</script>";
	
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
