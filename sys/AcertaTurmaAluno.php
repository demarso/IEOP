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
// Conexão com o banco de dados
include("conexao.php");
$ano = $_SESSION["AnoLetivo"];

 $sql3 = "SELECT Matricula, Turma, Segmento FROM histMatr WHERE Ano = '$ano'";
 
 $resultado3 = mysqli_query($conexao, $sql3) or die (mysql_error());

    while ($linha3 = mysqli_fetch_array($resultado3))
    {
	$Matr = $linha3['Matricula'];
	$Tur = $linha3['Turma'];
	$Seg = $linha3['Segmento'];
 
 	
	$query = mysqli_query($conexao, $sql = "UPDATE aluno SET Turma = '$Tur', Segmento='$Seg' WHERE Matricula = '$Matr'") or die(mysql_error());	
	
	
	}
	 
 
 
			echo "<font face=verdana size=1>A Atualização foi relaizada com sucesso</font>";
echo "\n";

		
   mysqli_close($conexao);
   
?>
   </div> 
   </div>
     
<div id='footer'>

</div>
</div>
</center>
</body>
</html>
