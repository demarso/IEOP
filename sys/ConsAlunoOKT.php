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

   <div id="palco2">
 
     <?php

include "conexao.php";

$nome2 = $_POST['Nome'];
$nasc = $_POST['NascEx'];

$sql = "SELECT *,DATE_FORMAT(Nascimento,'%d/%m/%Y') as iNascimento FROM aluno WHERE Nome = '$nome2' && DATE_FORMAT(Nascimento, '%d/%m/%Y') =  '$nasc'";

$resultado = mysqli_query($conexao,s$sql) or die (mysql_error());

while ($linha = mysqli_fetch_array($resultado)) {


	$matricula = $linha['Matricula'];
	$nome2 = $linha['Nome'];
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

?>
<center>
<? if ($status == 'Ativo'){ ?>
	<legend align="center">Aluno Ativo</legend>
<?	} ?>
<? if ($status == 'Inativo'){ ?>
	<legend align="center">Aluno Inativo</legend>
<?	} ?>

<table align="center" width="70%"  bgcolor="">

		 <tr> 
           	 <td class="textbox2">Matr&iacute;cula:</td> 
           	 <td class="textbox3" align="left"> <? echo $matricula; ?></td> 
       	 </tr> 
       	 <tr> 
           	<td class="textbox2">Nome:</td> 
           	<td class="textbox3" align="left"><? echo $nome2; ?></td> 
       	 </tr>
         <tr> 
           	 <td class="textbox2">Nascimento:</td> 
           	 <td class="textbox3" align="left"><? echo $nascimento; ?></td> 
       	 </tr>
         <tr> 
           	 <td class="textbox2">Endere&ccedil;o:</td> 
           	 <td class="textbox3" align="left"><? echo $endereco; ?></td> 
       	 </tr>
         <tr> 
           	 <td class="textbox2">Bairro:</td> 
           	 <td class="textbox3" align="left"><? echo $bairro; ?></td> 
       	 </tr>
         <tr> 
           	 <td class="textbox2">Cidade:</td> 
           	<td class="textbox3" align="left"><? echo $cidade; ?></td> 
       	 </tr>
         <tr> 
           	 <td class="textbox2">Estado:</td> 
           	 <td class="textbox3" align="left"><? echo $estado; ?></td> 
       	 </tr>
         <tr> 
           	 <td class="textbox2">CEP:</td> 
           	 <td class="textbox3" align="left"><? echo $cep; ?></td> 
       	 </tr>
         <tr> 
           	 <td class="textbox2">Telefone:</td> 
           	 <td class="textbox3" align="left"><? echo $telefone; ?></td> 
       	 </tr> 
         <tr> 
           	 <td class="textbox2">Pai:</td> 
           	 <td class="textbox3" align="left"><? echo $pai; ?></td> 
       	 </tr>
          <tr> 
           	 <td class="textbox2">M&atilde;e:</td> 
           	<td class="textbox3" align="left"><? echo $mae; ?></td> 
       	 </tr>
          <tr> 
           	 <td class="textbox2">Status:</td> 
           	 <td class="textbox3" align="left"><? echo $status; ?></td> 
       	 </tr>
          <tr> 
           	 <td class="textbox2">Motivo:</td> 
           	 <td class="textbox3" align="left"><? echo $transferencia; ?></td> 
       	 </tr>
         <tr> 
           	 <td class="textbox2">Turma:</td> 
           	 <td class="textbox3" align="left"><? echo $turma; ?></td> 
       	 </tr>
</table>
</center>
<?
}
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
