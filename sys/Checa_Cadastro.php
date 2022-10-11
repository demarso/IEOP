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

	
 $sql = "SELECT Matricula, Status FROM histMatr WHERE Ano = 2013";
$resultado = mysqli_query($conexao,$sql) or die (mysql_error());
while ($linha = mysqli_fetch_array($resultado))
{
  $matricula1 = $linha['Matricula'];
  $status1 = $linha['Status'];
  
  $query3 = mysqli_query($conexao,$sql3 = "UPDATE histMatr SET Status ='Ativo' WHERE Status = '' AND Ano = 2013") or die(mysql_error());
		
/*
$sql2 = "SELECT Matricula, Nome, Status FROM aluno WHERE Matricula = '$matricula1' && Status != '$status1'";
$resultado2 = mysql_query($sql2) or die (mysql_error());
while ($linha2 = mysql_fetch_array($resultado2))
{
  $matricula2 = $linha2['Matricula'];
  $nome = $linha2['Nome'];
  $status2 = $linha2['status'];

//echo "histórico: ".$matricula."  ".$turma."<br />";
echo "Aluno: ".$matricula2."  ".$nome."   A: ".$status2."  H: ".$stasus1."<br />";
//if(!empty($matricula2))
//  $query3 = mysql_query($sql3 = "UPDATE aluno SET Turma='$turma1' WHERE Matricula = '$matricula2'") or die(mysql_error());
}*/

}
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
