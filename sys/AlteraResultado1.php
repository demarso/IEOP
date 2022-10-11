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
$nome2 = $_POST["Nome"];
$nasc = $_POST["NascEx"];
$ano = $_SESSION["AnoLetivo"];


$sql = "SELECT Matricula, Nome, DATE_FORMAT(Nascimento,'%d/%m/%Y') as iNascimento FROM aluno WHERE Nome = '$nome2' && DATE_FORMAT(Nascimento, '%d/%m/%Y') = '$nasc'";
$resultado = mysqli_query($conexao, $sql) or die (mysql_error());
while ($linha = mysqli_fetch_array($resultado))
{
	$matricula = $linha['Matricula'];
	
$sqlRes = "SELECT Resultado FROM histMatr WHERE Matricula = '$matricula' && DATE_FORMAT(Nascimento, '%d/%m/%Y') = '$nasc' && Ano = '$ano'";
$resultadoRes = mysqli_query($conexao, $sqlRes) or die (mysql_error());
while ($linhaRes = mysqli_fetch_array($resultadoRes))
{
	$resultado = $linhaRes['Resultado'];
?>
 <cente>
        <form action="AlteraResultadoOK.php" method="post" enctype="multipart/form-data" name="form1" >
	<fieldset id="forms">
    <!-- Dados do Aluno -->
		<legend align="center">Altera&ccedil;&atilde;o do Final do Aluno</legend>
		
        <br />
 		
        <label for="Matriculan">N&ordm; de Matricula:</label>
		<input type="text" name="Matriculan" id="Matriculan" class="textbox2" tabindex="-1" value="<? echo $matricula ?>" readonly /><br />
		<br />
        <label for="Nomen">Nome:</label>
		<input type="text" name="Nomen" id="Nomen" class="textbox"  tabindex="-1" value="<? echo $nome2 ?>" readonly  /><br />
		<br />
       	<label for="Nascimenton">Data de Nascimento:</label>
		<input type="text" name="Nascimenton" id="Nascimenton" class="textbox2"  tabindex="-1" value="<? echo $nasc ?>" readonly /><br />
		<br />
        <label for="Result">Resultado Final:</label>
		<input type="text" name="Result" id="Result" class="textbox" tabindex="1" value="<? echo $resultado ?>" onKeyUp="this.value = this.value.toUpperCase();" title="Altere o resultado final"/><br />
		<br /><br /><br />
        
        
        <input type="submit" class="button" name="cadastrar" value="ALTERAR"  />
	</fieldset>
</form>
   </div> 
   </div>
<? }} ?>     
  
<div id='footer'>
<? include("footer.php"); ?>
</div>
</div>
</center>
</body>
</html>
