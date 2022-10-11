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
<fieldset>
     		<legend>Rela&ccedil;&atilde;o de Inadimplentes</legend>
 <br /><br />
  <center>
  <table align="center" width="900">
        	<tr>
            	<td align="center" style="width: 5%" bgcolor=""><b>Nº</b></td>
                <td align="center" style="width: 18%" bgcolor=""><b>MATR&Iacute;CULA</b></td>
                <td align="left" style="width: 35%"><b>NOME</b></td>
                <td align="center" style="width: 14%"><b>TELEFONE</b></td>
                <td align="center" style="width: 14%"><b>Cel Pai</b></td>
                 <td align="center" style="width: 14%"><b>Cel Mae</b></td>
             </tr>
    <?php

include "conexao.php";
/* $nome2 = $_POST["Nome"];
$nasc = $_POST["NascEx"];
$ano = date('Y'); */

$cont = 1;
$sql = "SELECT *,DATE_FORMAT(Nascimento,'%d/%m/%Y') as iNascimento,DATE_FORMAT(Data,'%d/%m/%Y') as iData FROM aluno ";

$resultado = mysqli_query($conexao,$sql) or die (mysql_error());
$con = 2; $n = 1;
while ($linha = mysqli_fetch_array($resultado))
{
	if ($con % 2 == 0)
				 $bgcolor = "bgcolor='#FFFFFF'";
				else
				 $bgcolor = "bgcolor='#FFFFCC'";
	$id2 = $linha['id'];
	$matricula = $linha['Matricula'];
	$nome3 = $linha['Nome'];
	$telefone = $linha['Telefone'];
	$celpai = $linha['CelPai'];
	$celmae = $linha['CelMae'];
	echo "<tr $bgcolor>
				  <td align='center' style='width: 5%'><b>".$n."º</b></td>
                <td align='center' style='width: 18%'><b>".$matricula."</b></td>
                <td align='left' style='width: 35%'><b>".$nome3."</b></td>
                <td align='center' style='width: 14%'><b>".$telefone."</b></td>
                <td align='center' style='width: 14%'><b>".$celpai."</b></td>
                 <td align='center' style='width: 14%'><b".$celmae."</b></td>
				  </tr>";  
            $con = $con + 1; $n = $n +1;
}
mysql_close($conexao);
?>
    
		  
    </table>
    </center>
     <input type="submit" class="button" name="cadastrar" value="ALTERAR"  />
 </fieldset> 
    </div> 

<div id='footer'>
<? include("footer.php"); ?>
</div>
</div>
</center>
</body>
</html>
