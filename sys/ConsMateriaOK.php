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
<center>
  <table align="center" width="50%" border="1" bgcolor="#CCCCCC">
<tr align="center">
<td align="center" style="width: 50%"><font color="#0000FF">MAT&Eacute;RIA</font></td>
<td align="center" style="width: 50%"><font color="#0000FF">SEGMENTO</font></td>
</tr>
</table>
</center>
<?php
include "conexao.php";
$matricula1 = $_POST['Matr'];
$sql = "SELECT * FROM materia ORDER By Segmento";
$resultado = mysqli_query($conexao,$sql) or die (mysql_error());
while ($linha = mysqli_fetch_array($resultado)) {
	$materia = $linha['Materia'];
	if ($linha['Segmento'] == 1){
	 $segmento = "Primeiro Segmento";
	}
	if ($linha['Segmento'] == 2){
	 $segmento = "Segundo Segmento";
	}
	if ($linha['Segmento'] == 3){
	 $segmento = "Ambos Segmentos";
	}
?>
<center>
<table align="center" width="50%" border="1" bgcolor="#CCCCCC">
  <tr align="center">
    <td align="center" style="width: 50%"><font color="#000000"><? echo $materia; ?></font></td>
    <td align="center" style="width: 50%"><font color="#000000"><? echo $segmento; ?></font></td>
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
