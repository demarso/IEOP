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
<table align="center" width="100%" border="1" >
<tr align="center" bgcolor="#CCCCCC">
<td align="center" style="width: 5%"><font color="#333333"><b>N&ordm;</b></font></td>
<td align="center" style="width: 15%"><font color="#333333"><b>ID</b></font></td>
<td align="center" style="width: 15%"><font color="#333333"><b>Matr&iacute;cula</b></font></td>
<td align="center" style="width: 30%"><font color="#333333"><b>Nome</b></font></td>
<td align="center" style="width: 15%"><font color="#333333"><b>Nascimento</b></font></td>
<td align="center" style="width: 10%"><font color="#333333"><b>Status</b></font></td>
<td align="center" style="width: 10%"><font color="#333333"><b>Turma</b></font></td>
</tr>
</table>
 
     <?php

include "conexao.php";
$ano = $_SESSION["AnoLetivo"];

$sq = "SELECT Matricula, Turma, Chamada FROM histMatr WHERE Turma = '3 Ano' && Ano = '$ano' ORDER BY Chamada";
			$resultado1 = mysqli_query($conexao,$sq) or die (mysql_error());
			$cont = 1;$con = 2;
			while ($linha1 = mysqli_fetch_array($resultado1))
			{ 
				$matricH = $linha1['Matricula'];
				$turmaH = $linha1['Turma'];
				$chamada = $linha1['Chamada'];

$sql = "SELECT *,DATE_FORMAT(Nascimento,'%d/%m/%Y') as iNascimento,DATE_FORMAT(Data,'%d/%m/%Y') as iData FROM aluno WHERE Matricula = '$matricH' AND Status='Ativo' ORDER BY Nome ";

$resultado = mysqli_query($conexao,$sql) or die (mysql_error());

while ($linha = mysqli_fetch_array($resultado)) {

	$id = $linha['id'];
	$matricula = $linha['Matricula'];
	$nome2 = $linha['Nome'];
	$idata = $linha['iData'];
	$nascimento = $linha['iNascimento'];
	$endereco = $linha['Endereco'];
	$bairro = $linha['Bairro'];
	$cidade = $linha['Cidade'];
	$estado = $linha['Estado'];
	$cep = $linha['Cep'];
	$pai = $linha['Pai'];
	$mae = $linha['Mae'];
	$email = $linha['Email'];
	$telefone = $linha['Telefone'];
	$transferencia = $linha['Transferencia'];
	$turma = $linha['Turma'];
	$status = $linha['Status'];
	if ($con % 2 == 0)
		 $bgcolor = "bgcolor='#FFFFFF'";
	else
		 $bgcolor = "bgcolor='#FFFFCC'"; 
	
?>
<center>

<table align="center" width="100%" border="1">
<tr align="center" <? echo $bgcolor; ?>>
<td align="center" style="width: 5%"><font color="#333333" size="2"><? echo $chamada; ?></font></td>
<td align="center" style="width: 15%"><font color="#333333" size="2"><? echo $id; ?></font></td>
<td align="center" style="width: 15%"><font color="#333333" size="2"><? echo $matricula; ?></font></td>
<td align="left" style="width: 30%"><font color="#333333" size="2"><? echo $nome2; ?></font></td>
<td align="center" style="width: 15%"><font color="#333333" size="2"><? echo $nascimento; ?></font></td>
<td align="center" style="width: 10%"><font color="#333333" size="2"><? echo $status; ?></font></td>
<td align="center" style="width: 10%"><font color="#333333" size="2"><? echo $turmaH; ?></font></td>
</tr>
</table>

</center>

<?
 }$con = $con + 1;
 $cont = $cont + 1; }
?>
  
   </div>
    
  
<div id='footer'>
 <a href="Imprime3Ano.php" target="_blank"><img src="img/imprimir.jpg" width="120" height="22" align="left" /></a>
<? include("footer.php"); ?>
</div>
</div>
</center>
</body>
</html>
