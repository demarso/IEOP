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
<fieldset id="forms">
		<legend>Aniversariantes do mês</legend><br/ >
<center>
<table align="center" width="70%" border="1" >
<tr align="center" bgcolor="#CCCCCC">
<td align="center" style="width: 20%"><font color="#333333"><b>Matrícula</b></font></td>
<td align="center" style="width: 40%"><font color="#333333"><b>Nome</b></font></td>
<td align="center" style="width: 15%"><font color="#333333"><b>Nascimento</b></font></td>
<td align="center" style="width: 15%"><font color="#333333"><b>Turma</b></font></td>
<td align="center" style="width: 10%"><font color="#333333"><b>Idade</b></font></td>
</tr>
</table>
</center>
     <?php

include "conexao.php";

$nome1 = $_POST['Nome'];
$nas = $_POST['Nascimento'];
$mes = date("m");
$today = date("d/m/Y");
$ano = $_SESSION["AnoLetivo"];
$sql = "SELECT a.Matricula,a.Nome,DATE_FORMAT(a.Nascimento,'%d/%m/%Y') as iNascimento,DATE_FORMAT(h.Data,'%d/%m/%Y') as iData, h.Turma FROM aluno a, histMatr h WHERE a.Matricula = h.Matricula && h.Ano = '$ano' && extract(MONTH from a.Nascimento)='$mes' ORDER BY extract(day from a.Nascimento)";

$resultado = mysqli_query($conexao, $sql) or die (mysql_error());
$con = 2;
while ($linha = mysqli_fetch_array($resultado)) {

	$matricula = $linha['Matricula'];
	$nome2 = $linha['Nome'];
	$nascimento = $linha['iNascimento'];
	$turma = $linha['Turma'];
	
	/*if ($nascimento == $today)
	   	$letra = "color='green'";
	else if ($nascimento < $today)
	   	$letra = "color='red'";
	else
		$letra = "color='blue'";*/
	   
	if ($con % 2 == 0)
		 $bgcolor = "bgcolor='#FFFFFF'";
	else
		 $bgcolor = "bgcolor='#FFFFCC'"; 

$partes_nascimento = explode('/',$nascimento);
$data_nascimento = $partes_nascimento[2].'/'.$partes_nascimento[1].'/'.$partes_nascimento[0];
$partes_today = explode('/',$today);
$data_today = $partes_today[2].'/'.$partes_today[1].'/'.$partes_today[0];

 //echo $data_nascimento."  ".$data_today."<br />";
 $diff = abs(strtotime($data_today) - strtotime($data_nascimento)); $years = floor($diff / (365*60*60*24)); $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24)); $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
 
   if($years == 1)
    $old = $years." ano";
   else
    $old = $years." anos";

$dat1 = explode("/", $nascimento);
$dia1 = $dat1[0];
$mes1 = $dat1[1];
$dat2 = explode("/", $today);
$dia2 = $dat2[0];
$mes2 = $dat2[1];

if ($dia1 == $dia2){
	$letra = "color='green'"; 
 	$aniversariante = "<font $letra><b>$nome2</b></font>";}
else if($dia1 < $dia2){
 	$letra = "color='red'";
	$aniversariante = "<font $letra>$nome2</font>"; }
else if($dia1 > $dia2){
 	$letra = "color='blue'";
	$aniversariante = "<font $letra>$nome2</font>"; }
		

//echo $dia1,'/'.$mes1.'  '.$dia2,'/'.$mes2;  	
?> 
<center>
<table align="center" width="70%" border="1">
<tr align="center" <? echo $bgcolor; ?>>
<td align="center" style="width: 20%"><font <? echo $letra; ?>><? echo $matricula; ?></font></td>
<td align='left' style='width: 40%'><? echo $aniversariante; ?></td>
<td align="center" style="width: 15%"><font <? echo $letra; ?>><? echo $nascimento; ?></font></td>
<td align="center" style="width: 15%"><font <? echo $letra; ?>><? echo $turma; ?></font></td>
<td align="center" style="width: 10%"><font <? echo $letra; ?>><? echo $old; ?></font></td>
</tr>
</table>
</center>


<?
 $con = $con + 1;
}
?>
<br/ ><br/ >
<font size="2" color="red">Vermelho = Aniversário já passou&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font><blink><font size="2" color="green">Verde = É HOJE&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font></blink><font size="2" color="blue">Azul = Ainda não chegou</font>
</fieldset>
  
   </div>
    
  
<div id='footer'>
<? include("footer.php"); ?>
</div>
</div>
</center>
</body>
</html>
