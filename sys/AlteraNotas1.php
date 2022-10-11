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
<script type="text/javascript">
var ieBlink = (document.all)?true:false;
function doBlink(){
	if(ieBlink){
		obj = document.getElementsByTagName('BLINK');
		for(i=0;i<obj.length;i++){
			tag=obj[i];
			tag.style.visibility=(tag.style.visibility=='hidden')?'visible':'hidden';
		}
	}
}
</script>
<style type="text/css">
<!--
.style1 {
	font-size: 36px
}
-->
</style>
</head>

<body background="Fundo.png" onLoad="if(ieBlink){setInterval('doBlink()',450)}">
<center>
<div id="sitemain">
	<div id="topo">
		<? include("head.php"); ?> 
	</div>
 	<div id="menubox">
  		<? include("menu.html"); ?> 
 	</div>
 <div id="main">
<!-- <div id="palco2"><br /><br /> -->
<?php

include "conexao.php";
$nome2 = $_POST["Nome"];
$nasc = $_POST["NascEx"];
$materia2 = $_POST["Materia"];
$bimes = $_POST["Bimestre"];
 if ($bimes == 'Primeiro Bimestre')
	$bimestre2 = 1; 
	else
	 if ($bimes == 'Segundo Bimestre') 
			$bimestre2 = 2;
 			else if ($bimes == 'Terceiro Bimestre')
					$bimestre2 = 3;
	 				else if ($bimes == 'Quarto Bimestre')
							$bimestre2 = 4;
//$_SESSION[bimestre] = $bimestre ;
$ano = $_SESSION["AnoLetivo"];

$sql = "SELECT Matricula,Nome,Turma,Segmento FROM aluno WHERE Nome = '$nome2' && DATE_FORMAT(Nascimento, '%d/%m/%Y') = '$nasc'";
$resultado = mysqli_query($conexao, $sql) or die (mysql_error());
while ($linha = mysqli_fetch_array($resultado))
{
	$nome2 = $linha['Nome'];
	$seg = $linha['Segmento'];
	$turma = $linha['Turma'];
	$matricula = $linha['Matricula'];
}
?>
	<!--	<font style="text-align:left">Aluno:</font><?//echo "  ".$nome2 ?>
        <font style="text-align:left">Matrícula:</font><?// echo "  ".$matricula ?>
        <font style="text-align:left">Ano:</font><?// echo "  ".$ano ?>
     	<font style="text-align:left">Bimestre:</font><?// echo "  ".$bimestre ?><br /><br /> -->
<?

$_SESSION[conta] = 0;
$_SESSION[matricula] = $matricula;
$_SESSION[turma] = $turma;

 	$sql3 = "SELECT * FROM notas WHERE Matricula = '$matricula' && Ano = '$ano' && Materia = '$materia2'";
$resultado3 = mysqli_query($conexao, $sql3) or die (mysql_error());

while ($linha3 = mysqli_fetch_array($resultado3))
{
	$materia = $linha3['Materia'];
	$bim1 = $linha3['Bim1'];
	$bim2 = $linha3['Bim2'];
	$bim3 = $linha3['Bim3'];
	$bim4 = $linha3['Bim4'];
	$faltas1 = $linha3['Faltas1'];
	$faltas2 = $linha3['Faltas2'];
	$faltas3 = $linha3['Faltas3'];
	$faltas4 = $linha3['Faltas4'];
	$contar = $contar + 1;
?>
   		     
    <form action="AlteraNotasOK.php" method="post" name="form1" >
     <fieldset id="forms">
		<legend align="left">Altera Notas do Aluno</legend><br /><br />

<input type="text" name="Matricula"  class="textbox2"  readonly  tabindex="-1" value="<? echo $matricula; ?>" title="Matricula"/>&nbsp;&nbsp;
<input type="text" name="Nome"  class="textbox3"  readonly   tabindex="-1" value="<? echo $nome2; ?>" title="Nome"/>&nbsp;&nbsp;
<input type="text" name="Ano"  class="textbox2"  readonly  tabindex="-1" value="<? echo $ano; ?>" title="Ano"/>&nbsp;&nbsp;
<input type="text" name="Bimestre"  class="textbox3"  readonly tabindex="-1" value="<? echo $bimes; ?>" title="Bimestre"/>&nbsp;&nbsp;
<input type="text" name="Segmento"  class="textbox4"  readonly  tabindex="-1" value="<? echo $seg; ?>" title="Segmento"/><br /><br />
<input type="text" name="Materia"  class="textbox3"  readonly  tabindex="-1" value="<? echo $materia; ?>" title="Materia"/>

        <? if($seg == 1){
		 if($bimestre2 == 1){ ?>
        <input type="text" name="Bim1"  class="textbox4"  tabindex="1"  value="<? echo $bim1 ?>" />&nbsp;&nbsp;&nbsp;
     	<? } ?>
        <? if($bimestre2 == 2){ ?>
        <input type="text" name="Bim2"  class="textbox4"  tabindex="1"  value="<? echo $bim2 ?>" />&nbsp;&nbsp;&nbsp;
        <? } ?>
        <? if($bimestre2 == 3){ ?>
        <input type="text" name="Bim3"  class="textbox4"  tabindex="1"  value="<? echo $bim3 ?>" />&nbsp;&nbsp;&nbsp;
        <? } ?>
        <? if($bimestre2 == 4){ ?>
         <input type="text" name="Bim4"  class="textbox4"  tabindex="1"  value="<? echo $bim4 ?>" />&nbsp;&nbsp;&nbsp;
        <? } } ?>
		
		<? if($seg == 2 || $seg == 3){
		 if($bimestre2 == 1){ ?>
        <input type="text" name="Bim1"  class="textbox4"  tabindex="1"  value="<? echo $bim1 ?>" />&nbsp;&nbsp;&nbsp;
        <input type="'text" name="Faltas1"  class="textbox4" tabindex="2"  value="<? echo $faltas1 ?>" />&nbsp;&nbsp;&nbsp;
		<? } ?>
        <? if($bimestre2 == 2){ ?>
        <input type="text" name="Bim2"  class="textbox4"  tabindex="1"  value="<? echo $bim2 ?>" />&nbsp;&nbsp;&nbsp;
        <input type="'text" name="Faltas2"  class="textbox4" tabindex="2"  value="<? echo $faltas2 ?>" />&nbsp;&nbsp;&nbsp;
        <? } ?>
        <? if($bimestre2 == 3){ ?>
        <input type="text" name="Bim3"  class="textbox4"  tabindex="1"  value="<? echo $bim3 ?>" />&nbsp;&nbsp;&nbsp;
        <input type="'text" name="Faltas3"  class="textbox4" tabindex="2"  value="<? echo $faltas3 ?>" />&nbsp;&nbsp;&nbsp;
        <? } ?>
         <? if($bimestre2 == 4){ ?>
         <input type="text" name="Bim4"  class="textbox4"  tabindex="1"  value="<? echo $bim4 ?>" />&nbsp;&nbsp;&nbsp;
         <input type="'text" name="Faltas4"  class="textbox4" tabindex="2"  value="<? echo $faltas4 ?>" />
        <? } } }?>
              
       <br /><br />
       <input  type='submit' class='button' value='ALTERA'>
       </fieldset>
       </form>

    
</div>  
<div id='footer'>
<? include("footer.php"); ?>
</div>
</div>
</center>
</body>
</html>
