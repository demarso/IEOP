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
	$id2 = $_POST['Idn'];
	$matricula = $_POST['Matriculan'];
	$nome2 = $_POST['Nomen'];
	$telefone = $_POST['Telefonen'];
	$celpai = $_POST['CelPain'];
	$celmae = $_POST['CelMaen'];
	

$query = mysqli_query($conexao, $sql = "UPDATE aluno SET  Telefone='$telefone', CelPai='$celpai', CelMae='$celmae' WHERE Matricula = '$matricula' && DATE_FORMAT(Nascimento, '%d/%m/%Y') = '$nasc'") or die(mysql_error());

$query = mysqli_query($conexao, $sql = "UPDATE pagamento SET Carne='$carne' WHERE Matricula = '$matricula'") or die(mysql_error());

echo "<font face=verdana size=1>Os dados do Aluno foram alterados com sucesso.</font>";

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
