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

$id2 = $_GET["id"];
$ano = date('Y');

$sql = "SELECT *,DATE_FORMAT(Nascimento,'%d/%m/%Y') as iNascimento FROM aluno WHERE id = '$id2'";

$resultado = mysqli_query($conexao,$sql) or die (mysql_error());

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

<table align="center" width="90%" border="1">

		 <tr> 
           	 <td style="width: 20%">Matr&iacute;cula:</td> 
           	 <td style="width: 80%" align="left"> <? echo $matricula; ?></td> 
       	 </tr> 
       	 <tr> 
           	<td style="width: 20%">Nome:</td> 
           	<td style="width: 80%" align="left"><? echo $nome2; ?></td> 
       	 </tr>
         <tr> 
           	 <td style="width: 20%">Nascimento:</td> 
           	 <td style="width: 80%" align="left"><? echo $nascimento; ?></td> 
       	 </tr>
         <tr> 
           	 <td style="width: 20%">Endere&ccedil;o:</td> 
           	 <td style="width: 80%" align="left"><? echo $endereco; ?></td> 
       	 </tr>
         <tr> 
           	 <td style="width: 20%">Bairro:</td> 
           	 <td style="width: 80%" align="left"><? echo $bairro; ?></td> 
       	 </tr>
         <tr> 
           	 <td style="width: 20%">Cidade:</td> 
           	<td style="width: 80%" align="left"><? echo $cidade; ?></td> 
       	 </tr>
         <tr> 
           	 <td style="width: 20%">Estado:</td> 
           	 <td style="width: 80%" align="left"><? echo $estado; ?></td> 
       	 </tr>
         <tr> 
           	 <td style="width: 20%">CEP:</td> 
           	 <td style="width: 80%" align="left"><? echo $cep; ?></td> 
       	 </tr>
         <tr> 
           	 <td style="width: 20%">Telefone:</td> 
           	 <td style="width: 80%" align="left"><? echo $telefone; ?></td> 
       	 </tr> 
         <tr> 
           	 <td style="width: 20%">Pai:</td> 
           	 <td style="width: 80%" align="left"><? echo $pai; ?></td> 
       	 </tr>
          <tr> 
           	 <td style="width: 20%">M&atilde;e:</td> 
           	<td style="width: 80%" align="left"><? echo $mae; ?></td> 
       	 </tr>
          <tr> 
           	 <td style="width: 20%">Status:</td> 
           	 <td style="width: 80%" align="left"><? echo $status; ?></td> 
       	 </tr>
          <tr> 
           	 <td style="width: 20%">Motivo:</td> 
           	 <td style="width: 80%" align="left"><? echo $transferencia; ?></td> 
       	 </tr>
         <tr> 
           	 <td style="width: 20%">Turma:</td> 
           	 <td style="width: 80%" align="left"><? echo $turma; ?></td> 
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
