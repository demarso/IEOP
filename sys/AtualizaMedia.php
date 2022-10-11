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
   <?
   include("conexao.php");
 
 $sql = "SELECT * FROM notas ";
$resultado = mysqli_query($conexao, $sql) or die (mysql_error());
while ($linha = mysqli_fetch_array($resultado))
{
	$matr = $linha['Matricula'];
	$mater = $linha['Materia'];
	$bim1 = $linha['Bim1'];
	$bim2 = $linha['Bim2'];
	$bim3 = $linha['Bim3'];
	$bim4 = $linha['Bim4'];
  	
	if( $bim1 <> '-')
		$media = $bim1;
		if( $bim1 <> '-' && $bim2 <> '-')
			$media = ($bim1 + $bim2)/2;
			if( $bim1 <> '-' && $bim2 <> '-' && $bim3 <> '-')
				$media = ($bim1 + $bim2 + $bim3)/3;
				if( $bim1 <> '-' && $bim2 <> '-' && $bim3 <> '-' && $bim4 <> '-')
					$media = ($bim1 + $bim2 + $bim3 + $bim4)/4;
		if($media < 6)
			$recup = 'Sim';
			 else
			  $recup = '-';

	      $query1 = mysqli_query($conexao, $sql1 = "UPDATE notas SET Media='$media', Recuperacao = '$recup' WHERE Matricula = '$matr' && Materia = '$mater' && Materia <> 'Faltas' && Materia <> 'Comportamento'") or die(mysql_error());
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
