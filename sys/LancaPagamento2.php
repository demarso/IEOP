<?php
session_start();
require("include/arruma_link.php");
if (! isset($_SESSION['id'])){
header("Location: index.php?erro=1");
exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta http-equiv="Content-type" content="text/html; charset=UTF-8"/>
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
	 <?php
	include "conexao.php";
	
	$matricula = $_SESSION['matricula'];
	$mespag = $_POST['MesPg'];
	//$datapg = $_POST['DataPg'];
	$valorpg = $_POST['ValorPg'];
	$ano = $_SESSION["AnoLetivo"];
	
	//echo $matricula.' '.$mespag.' '.$valorpg;
	if ($mespag == 1){
	$query = mysqli_query($conexao, $sql ="UPDATE pagamento SET Jan='$valorpg' WHERE Matricula='$matricula' AND Ano='$ano'")or die(mysql_error());}
	if ($mespag == 2)
	$query = mysqli_query($conexao, $sql ="UPDATE pagamento SET Fev='$valorpg' WHERE  Matricula='$matricula' AND Ano='$ano'")or die(mysql_error());
	if ($mespag == 3)
	$query = mysqli_query($conexao, $sql ="UPDATE pagamento SET Mar='$valorpg' WHERE  Matricula='$matricula' AND Ano='$ano'")or die(mysql_error());
	if ($mespag == 4)
	$query = mysqli_query($conexao, $sql ="UPDATE pagamento SET Abr='$valorpg' WHERE  Matricula='$matricula' AND Ano='$ano'")or die(mysql_error());
	if ($mespag == 5)
	$query = mysqli_query($conexao, $sql ="UPDATE pagamento SET Mai='$valorpg' WHERE  Matricula='$matricula' AND Ano='$ano'")or die(mysql_error());
	if ($mespag == 6)
	$query = mysqli_query($conexao, $sql ="UPDATE pagamento SET Jun='$valorpg' WHERE  Matricula='$matricula' AND Ano='$ano'")or die(mysql_error());
	if ($mespag == 7)
	$query = mysqli_query($conexao, $sql ="UPDATE pagamento SET Jul='$valorpg' WHERE  Matricula='$matricula' AND Ano='$ano'")or die(mysql_error());
	if ($mespag == 8)
	$query = mysqli_query($conexao, $sql ="UPDATE pagamento SET Ago='$valorpg' WHERE  Matricula='$matricula' AND Ano='$ano'")or die(mysql_error());
	if ($mespag == 9)
	$query = mysqli_query($conexao, $sql ="UPDATE pagamento SET Sete='$valorpg' WHERE  Matricula='$matricula' AND Ano='$ano'")or die(mysql_error());
	if ($mespag == 10)
	$query = mysqli_query($conexao, $sql ="UPDATE pagamento SET Outu='$valorpg' WHERE Matricula='$matricula' AND Ano='$ano'")or die(mysql_error());
	if ($mespag == 11)
	$query = mysqli_query($conexao, $sql ="UPDATE pagamento SET Nove='$valorpg' WHERE Matricula='$matricula' AND Ano='$ano'")or die(mysql_error());
	if ($mespag == 12)
	$query = mysqli_query($conexao, $sql ="UPDATE pagamento SET Deze='$valorpg' WHERE Matricula='$matricula' AND Ano='$ano'")or die(mysql_error());
	
	/* "INSERT INTO pagamento(Matricula,Ano,Mes,Valor,DataPg,Status) VALUES('$matricula','$ano','$mespag','$valorpg',STR_TO_DATE('$datapg','%d/%m/%Y'),'$status')";
 
 	$result = mysql_query($sql,$conexao) or die ("Cadastro não realizado."); */
 	
	mysqli_close($conexao);
	 echo "<script type = 'text/javascript'> location.href = 'LancaPgSelTurma.php'</script>";	
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
