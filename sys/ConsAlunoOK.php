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

$nome2 = $_POST["Nome"];
$nasc = $_POST["NascEx"];
$ano = $_SESSION["AnoLetivo"];

$sql = "SELECT *,DATE_FORMAT(Nascimento,'%d/%m/%Y') as iNascimento FROM aluno WHERE Nome = '$nome2' and DATE_FORMAT(Nascimento, '%d/%m/%Y') = '$nasc'";

$resultado = mysqli_query($conexao,$sql) or die (mysql_error());

while ($linha = mysqli_fetch_array($resultado)) {


	$id2 = $linha['id'];
	$next = $id2 + 1;
	$matricula = $linha['Matricula'];
	$nome2 = $linha['Nome'];
	$nascimento = $linha['iNascimento'];
	$endereco = $linha['Endereco'];
	$bairro = $linha['Bairro'];
	$cidade = $linha['Cidade'];
	$estado = $linha['Estado'];
	$cep = $linha['Cep'];
	$pai = $linha['Pai'];
	$celpai = $linha['CelPai'];
	$mae = $linha['Mae'];
	$celmae = $linha['CelMae'];
	$email = $linha['Email'];
	$telefone = $linha['Telefone'];
	$transferencia = $linha['Transferencia'];
	$turma = $linha['Turma'];
	$status = $linha['Status'];
	$foto = $linha['Foto'];

?>
<center>
<? if ($status == 'Ativo'){ ?>
	 <fieldset>
    <legend align="center">Aluno Ativo</legend>
   	<div class="foto2">
 		<? echo "<img src=\"$foto\" width='95' height='120' border='3'>".'<br /><br />'; ?>
	</div>
    </fieldset>
<?	} ?>
<? if ($status == 'Inativo'){ ?>
    <fieldset>
 	<legend align="center">Aluno Inativo</legend>
    <div class="foto2">
 		<? echo "<img src=\"$foto\" width='95' height='120' border='3'>".'<br /><br />'; ?>
	</div>
    </fieldset>
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
           	 <td style="width: 20%">Cel. Pai:</td> 
           	 <td style="width: 80%" align="left"><? echo $celpai; ?></td> 
       	 </tr> 
          <tr> 
           	 <td style="width: 20%">M&atilde;e:</td> 
           	<td style="width: 80%" align="left"><? echo $mae; ?></td> 
       	 </tr>
          <tr> 
           	 <td style="width: 20%">Cel. Mãe:</td> 
           	 <td style="width: 80%" align="left"><? echo $celmae; ?></td> 
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
<br /><br />
<!-- <input type="button" value="PRÓXIMO" onClick="ajaxGetRecord($next)"> -->
<br /><br />
   </div> 
   </div>
    
  
<div id='footer'>
<? include("footer.php"); ?>
</div>
</div>
</center>
</body>
</html>
