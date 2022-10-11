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
<script type="text/javascript">
var ieBlink = (document.all)?true:false;
function doBlink(){
	if(ieBlink){
		obj = document.getElementsByTagName('BLINK');
		for(i=0;i<obj.length;i++){
			tag=obj[i];
			tag.style.visibility=(tag.style.visibility=='hidden')?'visible':'hidden';
		}
	}
}
</script>
<style type="text/css">
<!--
.style1 {
	font-size: 36px
}
-->
</style>
</head>

<body background="Fundo.png" onLoad="if(ieBlink){setInterval('doBlink()',450)}">
<center>
<div id="sitemain">
	<div id="topo">
		<? include("head.php"); ?> 
	</div>
 	<div id="menubox">
  		<? include("menu.html"); ?> 
 	</div>
 <div id="main">
<!-- <div id="palco2"><br /><br /> -->
<?php

include "conexao.php";
	$nome2 = $_POST["Nome"];
	$matricula2 = $_POST["Matricula"];
	$bimes = $_POST["Bimestre"];
 if ($bimes == 'Primeiro Bimestre')
	$bimestre2 = 1; 
	else
	 if ($bimes == 'Segundo Bimestre') 
			$bimestre2 = 2;
 			else if ($bimes == 'Terceiro Bimestre')
					$bimestre2 = 3;
	 				else if ($bimes == 'Quarto Bimestre')
							$bimestre2 = 4;
 	$materia = $_POST['Materia'];
	$segmento = $_POST['Segmento'];
	$ano2 = $_POST['Ano'];
	$bim1 = $_POST['Bim1'];
	$bim2 = $_POST['Bim2'];
	$bim3 = $_POST['Bim3'];
	$bim4 = $_POST['Bim4'];
	$faltas1 = $_POST['Faltas1'];
	$faltas2 = $_POST['Faltas2'];
	$faltas3 = $_POST['Faltas3'];
	$faltas4 = $_POST['Faltas4'];

$sql3 = "SELECT * FROM notas WHERE Matricula = '$matricula2' && Ano = '$ano2' && Materia = '$materia'";
       $resultado3 = mysqli_query($conexao, $sql3) or die (mysql_error());
       while ($linha3 = mysqli_fetch_array($resultado3))
       {
	        $nbim1 = $linha3['Bim1'];  
			$nbim2 = $linha3['Bim2'];
			$nbim3 = $linha3['Bim3'];	   
	   }

if($segmento == 1){
	if($bimestre2 == 1){
	$media = $bim1;
	$media = number_format(round($media * 2 )/ 2,1);
	$query = mysqli_query($conexao, $sql = "UPDATE notas SET Bim1='$bim1', Media = '$media' WHERE Matricula = '$matricula2' && Ano = '$ano2' && Materia = '$materia'") or die(mysql_error());
	}
	if($bimestre2 == 2){
	$media = ($nbim1 + $bim2)/2;
	$media = number_format(round($media * 2 )/ 2,1);
	$query = mysqli_query($conexao, $sql = "UPDATE notas SET Bim2='$bim2', Media = '$media' WHERE Matricula = '$matricula2' && Ano = '$ano2' && Materia = '$materia'") or die(mysql_error());
	}
	if($bimestre2 == 3){
	$media = ($nbim1 + $nbim2 + $bim3)/3;
	$media = number_format(round($media * 2 )/ 2,1);
	$query = mysqli_query($conexao, $sql = "UPDATE notas SET Bim3='$bim3', Media = '$media' WHERE Matricula = '$matricula2' && Ano = '$ano2' && Materia = '$materia'") or die(mysql_error());
	}
	if($bimestre2 == 4){
	$media = ($nbim1 + $nbim2 + $nbim3 + $bim4)/4;
	$media = number_format(round($media * 2 )/ 2,1);
	$query = mysql_query($sql = "UPDATE notas SET Bim4='$bim4', Media = '$media' WHERE Matricula = '$matricula2' && Ano = '$ano2' && Materia = '$materia'") or die(mysql_error());
}
}
if($segmento == 2 || $segmento == 3){
if($bimestre2 == 1){
 $media = $bim1;
 $media = number_format(round($media * 2 )/ 2,1);
 $query = mysqli_query($conexao, $sql = "UPDATE notas SET Bim1='$bim1', Faltas1='$faltas1', Media = '$media' WHERE Matricula = '$matricula2' && Ano = '$ano2' && Materia = '$materia'") or die(mysql_error());
}
if($bimestre2 == 2){
$media = ($nbim1 + $bim2)/2;
$media = number_format(round($media * 2 )/ 2,1);
$query = mysqli_query($conexao, $sql = "UPDATE notas SET Bim2='$bim2', Faltas2='$faltas2', Media = '$media' WHERE Matricula = '$matricula2' && Ano = '$ano2' && Materia = '$materia'") or die(mysql_error());
}
if($bimestre2 == 3){
 $media = ($nbim1 + $nbim2 + $bim3)/3;
 $media = number_format(round($media * 2 )/ 2,1);
$query = mysqli_query($conexao, $sql = "UPDATE notas SET Bim3='$bim3', Faltas3='$faltas3', Media = '$media' WHERE Matricula = '$matricula2' && Ano = '$ano2' && Materia = '$materia'") or die(mysql_error());
}
if($bimestre2 == 4){
$media = ($nbim1 + $nbim2 + $nbim3 + $bim4)/4;
$media = number_format(round($media * 2 )/ 2,1);
$query = mysqli_query($conexao, $sql = "UPDATE notas SET Bim4='$bim4', Faltas4='$faltas4', Media = '$media' WHERE Matricula = '$matricula2' && Ano = '$ano2' && Materia = '$materia'") or die(mysql_error());
}
}

//echo "<script type = 'text/javascript'> location.href = 'AlteraNotas.php'</script>";

 
?>
 
    
</div>  
<div id='footer'>
<? include("footer.php"); ?>
</div>
</div>
</center>
</body>
</html>
