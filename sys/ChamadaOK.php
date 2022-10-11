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
	$matricula = $_POST['Matricula'];
	$nome2 = $_POST['Nome'];
	$chamada = $_POST['Chamada'];
	$ano = $_SESSION["AnoLetivo"];
	$con = $_SESSION["cont"];	

for($n=0;$n<$con;$n++)
$query = mysqli_query($conexao,$sql = "UPDATE histMatr SET Chamada='$chamada[$n]' WHERE Matricula = '$matricula[$n]' && Nome = '$nome2[$n]' && Ano = $ano") or die(mysql_error());

echo "<font face=verdana size=1>Os nºs da chamada foram lançados com sucesso.</font>";

mysqli_close($conexao); 

echo "<script type = 'text/javascript'> location.href = 'ChamadaSelTurma.php'</script>";
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
