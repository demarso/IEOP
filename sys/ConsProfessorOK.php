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

include "conexao.php";

$nome3 = $_POST['Nome'];

$sql = "SELECT * FROM professor WHERE Nome = '$nome3'";

$resultado = mysqli_query($conexao,$sql) or die (mysql_error());

while ($linha = mysqli_fetch_array($resultado)) {

	$id = $linha['id'];
	$nome2 = $linha['Nome'];
	$materia = $linha['Materia'];
	$email = $linha['Email'];
	$telefone = $linha['Telefone'];
	$celular = $linha['Celular'];
	$status = $linha['Status'];

?>
<center>
<? if ($status == 'Ativo'){ ?>
	<legend align="center">Professor Ativo</legend>
<?	} ?>
<? if ($status == 'Inativo'){ ?>
	<legend align="center">Professor Inativo</legend>
<?	} ?>

<table align="center" width="70%"  bgcolor="">

		 <tr> 
           	 <td class="textbox2">ID:</td> 
           	 <td class="textbox2" align="left"> <? echo $id; ?></td> 
       	 </tr> 
       	 <tr> 
           	<td class="textbox2">Nome:</td> 
           	<td class="textbox" align="left"><? echo $nome2; ?></td> 
       	 </tr>
         <tr> 
           	 <td class="textbox2">Matéria:</td> 
           	 <td class="textbox" align="left"><? echo $materia; ?></td> 
       	 </tr>
        
         <tr> 
           	 <td class="textbox2">Telefone Res.:</td> 
           	 <td class="textbox2" align="left"><? echo $telefone; ?></td> 
       	 </tr> 
          <tr> 
           	 <td class="textbox2">Celular:</td> 
           	 <td class="textbox2" align="left"><? echo $celular; ?></td> 
       	 </tr> 
         <tr> 
           	 <td class="textbox2">Email:</td> 
           	 <td class="textbox3" align="left"><? echo $email; ?></td> 
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
