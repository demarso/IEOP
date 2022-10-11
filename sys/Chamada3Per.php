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
  <? include("menu.html");
  $ano = $_SESSION["AnoLetivo"];
   ?> 
 </div>
<div id="main">
<center>
<fieldset>
	<legend>Cadastrando lista pela chamada da Turma 3&ordm; Per&iacute;odo de <? echo $ano ?></legend>
<br />
<table align="center" width="70%" border="1" >
<tr align="center" bgcolor="#CCCCCC">
<td align="center" style="width: 10%"><font color="#333333"><b>Chamada</b></font></td>
<td align="center" style="width: 30%"><font color="#333333"><b>Matr&iacute;cula</b></font></td>
<td align="center" style="width: 60%"><font color="#333333"><b>Nome</b></font></td>
</tr>
</table>

 <?php
include "conexao.php";
$sq = "SELECT Matricula, Turma, Chamada FROM histMatr WHERE Turma = '3 Periodo' && Ano = '$ano' ORDER BY Chamada";
			$resultado1 = mysqli_query($conexao,$sq) or die (mysql_error());
			$cont = 1;$con = 2;
			while ($linha1 = mysqli_fetch_array($resultado1))
			{ 
				$matricH = $linha1['Matricula'];
				$turmaH = $linha1['Turma'];
				$chamada = $linha1['Chamada'];

$sql = "SELECT *,DATE_FORMAT(Nascimento,'%d/%m/%Y') as iNascimento,DATE_FORMAT(Data,'%d/%m/%Y') as iData FROM aluno WHERE Matricula = '$matricH' ORDER BY Nome ";

$resultado = mysqli_query($conexao,$sql) or die (mysql_error());

while ($linha = mysqli_fetch_array($resultado)) {

	$matricula = $linha['Matricula'];
	$nome2 = $linha['Nome'];
	
	if ($con % 2 == 0){
		 $bgcolor = "bgcolor='#FFFFFF'";
		 $bgcolor2 = "#FFFFFF";
	}
	else{
		 $bgcolor = "bgcolor='#FFFFCC'";
		 $bgcolor2 = "#FFFFCC";
	}
	
?>
<form action="ChamadaOK.php" method="post" enctype="multipart/form-data" name="cadastro" >
<table align="center" width="70%" border="1" >
<tr align="center" <? echo $bgcolor; ?>>
<td align="center" style="width: 10%"><font color="#333333" size="2"><input type="text" name="Chamada[<? echo $cont; ?>]" id="Chamada" maxlength="2" value="<? echo "$chamada" ?> " onkeypress="return Onlynumbers(event)" size="5" style="background-color:<? echo $bgcolor2; ?>" /></font></td>
<td align="center" style="width: 30%"><font color="#333333" size="2"><input type="text" name="Matricula[<? echo $cont; ?>]" id="Matricula" size="27"  value="<? echo "$matricula" ?>" readonly style="background-color:<? echo $bgcolor2; ?>" /></font></td>
<td align="left" style="width: 60%"><font color="#333333" size="2"><input type="text" name="Nome[<? echo $cont; ?>]" id="Nome" size="60"  value="<? echo "$nome2" ?> " readonly style="background-color:<? echo $bgcolor2; ?>" /></font></td>
</tr>
</table>
<?
 }$con = $con + 1;
 $cont = $cont + 1; }
 $_SESSION[cont] = $con - 1;
?>
  		<br />
        <input type = "submit" name = "Submit" value = "Enviar">
 </form>
 </fieldset>
       
</center>
  
   </div>
    
  
<div id='footer'>
 <? include("footer.php"); ?>
</div>
</div>
</center>
</body>
</html>
