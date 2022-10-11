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

<?php

include "conexao.php";
$nome2 = $_POST["Nome"];
$nasc = $_POST["NascEx"];
$bimestre = $_POST["Bimestre"];

 if ($bimestre == 'Primeiro Bimestre')
	$bimestre2 = 1; 
	else
	 if ($bimestre == 'Segundo Bimestre') 
			$bimestre2 = 2;
 			else if ($bimestre == 'Terceiro Bimestre')
					$bimestre2 = 3;
	 				else if ($bimestre == 'Quarto Bimestre')
							$bimestre2 = 4;
							else if ($bimestre == 'Recuperacao Final')
									$bimestre2 = 5;
							
$_SESSION[bimestr] = $bimestre2;
$ano = $_SESSION["AnoLetivo"];

$sql = "SELECT Matricula,Nome,Turma,Segmento,Foto FROM aluno WHERE Nome = '$nome2' && DATE_FORMAT(Nascimento, '%d/%m/%Y') = '$nasc'";

if ($sql == " "){
echo "Este aluno não existe";
}
else{
$resultado = mysqli_query($conexao, $sql) or die (mysql_error());

while ($linha = mysqli_fetch_array($resultado))
{
	$nome2 = $linha['Nome'];
	$segmento = $linha['Segmento'];
	$turma = $linha['Turma'];
	$matricula = $linha['Matricula'];
	$foto = $linha['Foto'];
}
}
$_SESSION[conta] = 0;
$_SESSION[matricula] = $matricula;
$_SESSION[turma] = $turma;

?>
 <div id="main">
   <div id="palco3">
     <fieldset>
	    <legend>Dados do Aluno para lan&ccedil;ar notas</legend>
			<br /><br />
            
            <label>Matrícula:</label><br /><br />
            <label class="textbox3"><? echo $matricula; ?></label><br /><br /><br /><br />
           <div class="foto">
           <?  echo "<img src=\"$foto\" width='95' height='120' border='3'>"; ?>
           </div>
            <label>Nome:</label><br /><br />
		    <label class="textbox"><? echo $nome2; ?></label><br /><br /><br /><br />
            <label>Turma:</label><br /><br />
		    <label class="textbox2"><? echo $turma; ?></label><br /><br /><br /><br />
            <label>Bimestre:</label><br /><br />
		    <label class="textbox3"><blink><font color="#FF0000"><? echo $bimestre; ?></font></blink></label>
     </fieldset>
    </div>
<div id="palco4">
<?
 if( $segmento == 1)
	include "Notas2a.php";
	if( $segmento == 2 || $segmento == 3 )
	include "Notas2.php";
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
