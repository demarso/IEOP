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
   $conta = $_SESSION['conta'];
   $matricula = $_SESSION['matricula'];
  $ano = $_SESSION["AnoLetivo"];
  
    
for ($n=0;$n<$conta;$n++){
	 
	  $materia2 = $_POST['Materias'];
	  $notas1 = $_POST['Notas'];
	  $media = $notas1;
	 // if($media < 6.0)
	      $rec = 'Sim';
	//   else
	//	  $rec = '-';
	 
	// echo $matricula.'&nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp;'.$materia2[$n].'&nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp;'.$notas1[$n].'&nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp;'.$media[$n].'&nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp;'.$rec[$n]."<br />";
	  	  
	  $query = mysqli_query($conexao,$sql = "UPDATE notas SET Recfin='$notas1[$n]', Media = '$media[$n]', Recuperacao = '$rec[$n]' WHERE Matricula = '$matricula' && Materia = '$materia2[$n]' && Ano = '$ano'") or die(mysql_error());
   
}

echo "<br />";
 echo "<font face=verdana size=1>A Alteração da Recuperação foi realizado com sucesso.</font>";
 echo "<br />";
 
  // 	echo "<script type = 'text/javascript'> location.href = 'RecupSelTurma.php'</script>";
	
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
