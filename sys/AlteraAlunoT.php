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
      <?php

include "conexao.php";

// Recupera os dados dos campos
	$id3 = $_POST['Id'];
	$matricula = $_POST['Matricula'];
	$nome2 = $_POST['Nome'];
	$data2 = $_POST['Data'];
	$ano2 = $_POST['Ano'];
	$nascimento = $_POST['Nascimento'];
	$endereco = $_POST['Endereco'];
	$certidao = $_POST['Certidao'];
	$raca = $_POST['Raca'];
	$sexo = $_POST['Sexo'];
	$sangue = $_POST['Sangue'];
	$natural = $_POST['Natural'];
	$nacional = $_POST['Nacional'];
	$bairro = $_POST['Bairro'];
	$cidade = $_POST['Cidade'];
	$estado = $_POST['Estado'];
	$cep = $_POST['Cep'];
	$pai = $_POST['Pai'];
	$profpai = $_POST['Profpai'];
	$mae = $_POST['Mae'];
	$profmae = $_POST['Profmae'];
	$email = $_POST['Email'];
	$telefone = $_POST['Telefone'];
	$celpai = $_POST['CelPai'];
	$celmae = $_POST['CelMae'];
	$transferencia = $_POST['Transferencia'];
	$turma = $_POST['Turma'];
	$carne = $_POST['Carne'];
	
echo $id3.' '.$matricula.' '.$nome2;

mysql_close($conexao);

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
