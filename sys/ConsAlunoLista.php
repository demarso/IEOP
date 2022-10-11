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
<td align="center" style="width: 15%"><font color="#333333"><b>ID</b></font></td>
<td align="center" style="width: 15%"><font color="#333333"><b>Matrícula</b></font></td>
<td align="center" style="width: 35%"><font color="#333333"><b>Nome</b></font></td>
<td align="center" style="width: 15%"><font color="#333333"><b>Nascimento</b></font></td>
<td align="center" style="width: 10%"><font color="#333333"><b>Status</b></font></td>
<td align="center" style="width: 10%"><font color="#333333"><b>Turma</b></font></td>
</tr>
</table>
 
     <?php

include "conexao.php";

$nome1 = $_POST['Nome'];
$nas = $_POST['Nascimento'];
$ano = $_SESSION["AnoLetivo"];
$sql = "SELECT a.id, a.Nome, h.Matricula, h.Turma, a.Status, DATE_FORMAT(a.Nascimento,'%d/%m/%Y') as iNascimento,DATE_FORMAT(h.Data,'%d/%m/%Y') as iData FROM aluno a, histMatr h WHERE a.Matricula = h.Matricula && h.Ano = '$ano 'ORDER BY a.Nome";

$resultado = mysqli_query($conexao,$sql) or die (mysql_error());
$con = 2;
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
<td align="center" style="width: 15%"><font color="#333333" size="2"><? echo $id; ?></font></td>
<td align="center" style="width: 15%"><font color="#333333" size="2"><? echo $matricula; ?></font></td>
<td align="left" style="width: 35%"><font color="#333333" size="2"><? echo $nome2; ?></font></td>
<td align="center" style="width: 15%"><font color="#333333" size="2"><? echo $nascimento; ?></font></td>
<td align="center" style="width: 10%"><font color="#333333" size="2"><? echo $status; ?></font></td>
<td align="center" style="width: 10%"><font color="#333333" size="2"><? echo $turma; ?></font></td>
</tr>
</table>

</center>

<?
 $con = $con + 1;
}
?>

  
   </div>
    
  
<div id='footer'>
<? include("footer.php"); ?>
</div>
</div>
</center>
</body>
</html>
