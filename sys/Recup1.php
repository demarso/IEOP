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
echo $ano;

$sql = "SELECT Matricula, Nome, Foto FROM aluno WHERE Nome = '$nome2' && DATE_FORMAT(Nascimento, '%d/%m/%Y') = '$nasc'";

$resultado = mysqli_query($conexao,$sql) or die (mysql_error());

while ($linha = mysqli_fetch_array($resultado))
{
	
	$matricula = $linha['Matricula'];
	$nome2 = $linha['Nome'];
	$foto = $linha['Foto'];
}
?> 


        <br />
 		<? echo "<img src=\"$foto\" width='95' height='120' border='5'>".'<br />'; ?>
        <font size="2"><? echo $nome2;?></font><br />
        <font size="2"><? echo $matricula;?></font>
        <form action="RecupOK.php" method="post" enctype="multipart/form-data" name="form1" >
	<fieldset id="forms">
    <!-- Dados do Aluno -->
		<legend align="center">Altera&ccedil;&atilde;o das Notas de Recupera&ccedil;&atilde;o</legend>


<?
$_SESSION[matricula] = $matricula;
$cont = 0;

$sql2 = "SELECT Materia, RecFin FROM notas WHERE Matricula = '$matricula' && Ano = '$ano'";
$resultado2 = mysqli_query($conexao,$sql2) or die (mysql_error());
while ($linha2 = mysqli_fetch_array($resultado2))
{
	
	$materia = $linha2['Materia'];
	$recfin = $linha2['RecFin'];
	
?>

    	
      <? //if($recfin <> '-'){  ?> <br />
          <label for="Materias"></label>
		<input type="text" name="Materias[<? echo $cont; ?>]" id="Materias[<? echo $cont; ?>]" class="textbox2" tabindex="1"  value="<? echo $materia ?>" maxlength="12"  readonly>
		
		<input type="text" name="Notas[<? echo $cont; ?>]" id="Notas[<? echo $cont; ?>]" class="textbox2" tabindex="2" value="<? echo  $recfin ?>" maxlength="5" title="Informe a nova nota de Recuperação"/><br />
   

<? 
$cont = $cont + 1;
//}
   
   $_SESSION[conta] =  $cont;
  }
?> 
 <input type="submit" class="button" name="cadastrar" value="ALTERAR"  />
	</fieldset>
</form>    
</div> 
   </div>  
<div id='footer'>
<? include("footer.php"); ?>
</div>
</div>

</body>
</html>
