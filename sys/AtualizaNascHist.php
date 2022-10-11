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
	include("conexao.php");
	
	$sql = "SELECT Matricula,DATE_FORMAT(Nascimento,'%d/%m/%Y') as iNascimento FROM aluno";
$resultado = mysqli_query($conexao, $sql) or die (mysql_error());
while ($linha = mysqli_fetch_array($resultado))
{
	$matr = $linha['Matricula'];
	$nasc = $linha['iNascimento'];
	
	echo "Matricula = ".$matr."  Nascimento = ".$nasc."<br />";	
 
 $query = mysql_query($sql = "UPDATE histMatr SET Nascimento = STR_TO_DATE('$nasc','%d/%m/%Y') WHERE Matricula = '$matr'") or die(mysql_error());
 
}
?>
   </div> 
   </div>
     
<div id='footer'>

</div>
</div>
</center>
</body>
</html>
