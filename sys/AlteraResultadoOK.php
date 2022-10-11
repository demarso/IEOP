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
	$matricula = $_POST['Matriculan'];
	$nomen = $_POST['Nomen'];
	$nascimenton = $_POST['Nascimenton'];
	$result = $_POST['Result'];
	$ano = $_SESSION["AnoLetivo"];
	
	$query = mysqli_query($conexao, $sql = "UPDATE histMatr SET Resultado='$result' WHERE Matricula = '$matricula' && DATE_FORMAT(Nascimento, '%d/%m/%Y') =  '$nascimenton' && Ano = '$ano'") or die(mysql_error());

echo "<font face=verdana size=1>O resultado final de $ano do Aluno foi alterados com sucesso.</font>";

 echo "<script type = 'text/javascript'> location.href = 'AlteraResSelTurma.php'</script>";
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
