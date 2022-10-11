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
<table align="center" width="100%" border="1" >
<tr align="center" bgcolor="#CCCCCC">
<td align="center" style="width: 5%"><font color="#333333"><b>Nº</b></font></td>
<td align="center" style="width: 15%"><font color="#333333"><b>ID</b></font></td>
<td align="center" style="width: 15%"><font color="#333333"><b>Matrícula</b></font></td>
<td align="center" style="width: 30%"><font color="#333333"><b>Nome</b></font></td>
<td align="center" style="width: 15%"><font color="#333333"><b>Materia</b></font></td>
<td align="center" style="width: 10%"><font color="#333333"><b>Status</b></font></td>
<td align="center" style="width: 10%"><font color="#333333"><b>Turma</b></font></td>
</tr>
</table>
 
   <?php

include "conexao.php";
$ano = $_SESSION["AnoLetivo"];

$sq = "SELECT id, Matricula FROM pagamento WHERE Ano = '$ano'";
			$resultado1 = mysqli_query($conexao,$sq) or die (mysql_error());
			
			while ($linha1 = mysqli_fetch_array($resultado1))
			{ 
				$id1 = $linha1['id'];
				$matric = $linha1['Matricula'];
								
				
      $sql = "SELECT id, Matricula FROM pagamento";
			$resultado2 = mysqli_query($conexao,$sql) or die (mysql_error());
			
			while ($linha2 = mysqli_fetch_array($resultado2))
			{ 
				
				$id2 = $linha2['id'];
				$matric2 = $linha2['Matricula'];
							
		if($id2 > $id1 && $matric2 == $matric){
			
//	$query = mysql_query($sql = "DELETE FROM pagamento WHERE id = '$id2'") or die(mysql_error());	
?>
<center>

<table align="center" width="100%" border="1">
<tr align="center" <? echo $bgcolor; ?>>
<td align="center" style="width: 5%"><font color="#333333" size="2"><? echo $chamada; ?></font></td>
<td align="center" style="width: 15%"><font color="#333333" size="2"><? echo $id2; ?></font></td>
<td align="center" style="width: 15%"><font color="#333333" size="2"><? echo $matric2; ?></font></td>
<td align="left" style="width: 30%"><font color="#333333" size="2"><? echo $nome2; ?></font></td>
<td align="center" style="width: 15%"><font color="#333333" size="2"><? echo $materia2; ?></font></td>
<td align="center" style="width: 10%"><font color="#333333" size="2"><? echo $status; ?></font></td>
<td align="center" style="width: 10%"><font color="#333333" size="2"><? echo $turmaH; ?></font></td>
</tr>
</table>

</center>

<?
		}
	}
}
?>

  
   </div>
    
  
<div id='footer'>
 <a href="Imprime9Ano.php" target="_blank"><img src="img/imprimir.jpg" width="120" height="22" align="left" /></a>
<? include("footer.php"); ?>
</div>
</div>
</center>
</body>
</html>
