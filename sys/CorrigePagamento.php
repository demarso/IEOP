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
ieop
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
    
	$sql = "SELECT id,Jan,Fev,Mar,Abr,Mai,Jun,Jul,Ago,Sete,Outu,Nove,Deze FROM pagamento";
	$resultado = mysqli_query($conexao,$sql) or die (mysql_error());
	while ($linha = mysqli_fetch_array($resultado))
	{
		$id = $linha['id'];
		$Jan = $linha['Jan'];
		if(empty($Jan))
	      $query = mysqli_query($conexao,$sql = "UPDATE pagamento SET Jan='Não' WHERE id = '$id'") or die(mysql_error());
		$Fev = $linha['Fev'];
		if(empty($Fev))
	      $query = mysqli_query($conexao,$sql = "UPDATE pagamento SET Fev='Não' WHERE id = '$id'") or die(mysql_error());
		  $Mar = $linha['Mar'];
		if(empty($Mar))
	      $query = mysqli_query($conexao,$sql = "UPDATE pagamento SET Mar='Não' WHERE id = '$id'") or die(mysql_error());
		$Abr = $linha['Abr'];
		if(empty($Abr))
	      $query = mysqli_query($conexao,$sql = "UPDATE pagamento SET Abr='Não' WHERE id = '$id'") or die(mysql_error());
		  $Mai = $linha['Mai'];
		if(empty($Mai))
	      $query = mysqli_query($conexao,$sql = "UPDATE pagamento SET Mai='Não' WHERE id = '$id'") or die(mysql_error()); 
		 $Jun = $linha['Jun'];
		if(empty($Jun))
	      $query = mysqli_query($conexao,$sql = "UPDATE pagamento SET Jun='Não' WHERE id = '$id'") or die(mysql_error());
		$Jul = $linha['Jul'];
		if(empty($Jul))
	      $query = mysqli_query($conexao,$sql = "UPDATE pagamento SET Jul='Não' WHERE id = '$id'") or die(mysql_error());
		  $Ago = $linha['Ago'];
		if(empty($Ago))
	      $query = mysqli_query($conexao,$sql = "UPDATE pagamento SET Ago='Não' WHERE id = '$id'") or die(mysql_error());
		$Sete = $linha['Sete'];
		if(empty($Sete))
	      $query = mysqli_query($conexao,$sql = "UPDATE pagamento SET Sete='Não' WHERE id = '$id'") or die(mysql_error());
		$Outu = $linha['Outu'];
		if(empty($Outu))
	      $query = mysqli_query($conexao,$sql = "UPDATE pagamento SET Outu='Não' WHERE id = '$id'") or die(mysql_error());
	    $Nove = $linha['Nove'];
		if(empty($Nove))
	      $query = mysqli_query($conexao,$sql = "UPDATE pagamento SET Nove='Não' WHERE id = '$id'") or die(mysql_error());
		$Deze = $linha['Deze'];
		if(empty($Deze))
	      $query = mysqli_query($conexao,$sql = "UPDATE pagamento SET Deze='Não' WHERE id = '$id'") or die(mysql_error());  	               	
 
}
			echo "<font face=verdana size=1>A correção foi realizada com sucesso.</font>";
echo "\n";

	
		/*$resultado = mysql_query("SELECT MAX(id) FROM aluno");
		while ($linha = mysql_fetch_array($resultado)) {
		$idMat1 = $linha["MAX(id)"];
		}
		$resultado2 = mysql_query("SELECT Matricula FROM aluno WHERE id = '$idMat1'");
		while ($linha1 = mysql_fetch_array($resultado2)) {
		$_SESSION[idMat] = $linha1["Matricula"];
		}*/
		
   mysqli_close($conexao);
  /*echo "<script type = 'text/javascript'> location.href = 'Aluno.php'</script>";*/
  echo "<script type = 'text/javascript' >  window.open('FichaMatricula.php?Matr=$matricula', '_blank');</script>";			
?>
   </div> 
   </div>
     
<div id='footer'>

</div>
</div>
</center>
</body>
</html>
