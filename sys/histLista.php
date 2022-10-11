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
<? 
 $nome1 = $_POST['Nome'];
 $matr = $_POST['Matr'];
 $mes = date("m");
 $today = date("d/m/Y");
?> 
<div id="main">
<fieldset id="forms">
		<legend>Histórico das Turmas do Aluno</legend><br/ >
<center>
<table align="center" width="70%" border="1" >
<tr bgcolor="#CCCCCC">
<td colspan="3"><b>Nome:&nbsp;<? echo $nome1; ?></b></td><td colspan="3"><b>Matrícula:&nbsp;<? echo $matr; ?></b></td> 
<tr align="center" bgcolor="#CCCCCC">
<td align="center" style="width: 15%"><font color="#333333"><b>Data</b></font></td>
<td align="center" style="width: 10%"><font color="#333333"><b>Ano</b></font></td>
<td align="center" style="width: 15%"><font color="#333333"><b>Turma</b></font></td>
<td align="center" style="width: 30%"><font color="#333333"><b>Transferência</b></font></td>
<td align="center" style="width: 15%"><font color="#333333"><b>Segmento</b></font></td>
</tr>
</table>

     <?php

include "conexao.php";

$sql = "SELECT *,DATE_FORMAT(Data,'%d/%m/%Y') as iData FROM histMatr WHERE Nome = '$nome1' && Matricula = '$matr' ORDER BY Ano";

$resultado = mysqli_query($conexao,$sql) or die (mysql_error());
$con = 2;
while ($linha = mysqli_fetch_array($resultado)) {

	$data2 = $linha['iData'];
	$ano2 = $linha['Ano'];
	$turma = $linha['Turma'];
	$transf = $linha['Transferencia'];
	$seguim = $linha['Segmento'];
	
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

?> 

<table align="center" width="70%" border="1" >
<tr align="center" <? echo $bgcolor; ?>>
<td align="center" style="width: 15%"><font color="#333333"><b><? echo $data2; ?></b></font></td>
<td align="center" style="width: 10%"><font color="#333333"><b><? echo $ano2; ?></b></font></td>
<td align="center" style="width: 15%"><font color="#333333"><b><? echo $turma; ?></b></font></td>
<td align="center" style="width: 30%"><font color="#333333"><b><? echo $transf; ?></b></font></td>
<td align="center" style="width: 15%"><font color="#333333"><b><? echo $seguim; ?></b></font></td>
</tr>
</table>

</center>


<?
 $con = $con + 1;
}
?>

</fieldset>
  
   </div>
    
  
<div id='footer'>
<? include("footer.php"); ?>
</div>
</div>
</center>
</body>
</html>
