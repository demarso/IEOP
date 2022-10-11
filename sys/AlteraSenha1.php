<?php
include "valida.php";
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

   <?

require_once("conexao.php");
$senha0 = $_POST["Senha0"];
$senha1 = $_POST["Senha1"];
$senha2 = $_POST["Senha2"];
$nome2 = $_SESSION['nome'];

    $confu1 = "L2xB3Sbia";
	$confu2 = "Dawi748v2";
	$senha0 = $confu1.$senha0.$confu2;
	$senha1 = $confu1.$senha1.$confu2;
	$senha2 = $confu1.$senha2.$confu2;
	$senha1 = hash( 'SHA256',$senha1);
	$senha2 = hash( 'SHA256',$senha2);
  	$senha0 = hash( 'SHA256',$senha0);
	

$sql = "SELECT senha FROM usuns WHERE nome = '$nome2'";
 $result = mysqli_query($conexao, $sql) or die (mysql_error());

while ($linha = mysqli_fetch_array($result))
{
	$senhaantiga = $linha['senha'];
	}

if ($senha0 ==  $senhaantiga){

  if (empty($senha1)){ 
      echo "<br /><br /><a href='AlteraSenha.php'>VOLTA</a><br /><br />";
	  die("Escolha uma senha Nova");
	  
   }
   
   if (empty($senha2)){ 
      echo "<br /><br /><a href='AlteraSenha.php'>VOLTA</a><br /><br />";
	  die("Você deve confirmar a sua senha Nova");
	  
   }
   
   if ($senha1 != $senha2){ 
     echo "<br /><br /><a href='AlteraSenha.php'>VOLTA</a><br /><br />";
	 die("Os campos senha e confirmação de senha devem ser idênticos");
	 
   }
}
else{
echo "<br /><br /><a href='AlteraSenha.php'>VOLTA</a><br /><br />";
die("Sua senha antiga não confere");

}

$query = mysqli_query($conexao,"UPDATE usuns SET senha='$senha1' WHERE nome = '$nome2'") or die(mysql_error());

echo "<br>";
echo "<font face=verdana size=2>Sua senha foi alterada com sucesso.";

mysqli_close($conexao);

?>
    
  </div>
<div id='footer'>
</div>
</div>
</center>
</body>
</html>
