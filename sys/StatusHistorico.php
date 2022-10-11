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
 <div id="main">
 
     <?php

include "conexao.php";
$ano = $_SESSION["AnoLetivo"];


$sql = "SELECT Matricula, Status FROM aluno";
$resultado = mysqli_query($conexao,$sql) or die (mysql_error());
while ($linha = mysqli_fetch_array($resultado)) {
	$matricula = $linha['Matricula'];
	$status = $linha['Status'];

$query = mysqli_query($conexao,$sql = "UPDATE histMatr SET Status='$status' WHERE Matricula = '$matricula' && Ano = '$ano'") or die(mysql_error());

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
