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
							else if ($bimestre == 'Recuperação Final')
									$bimestre2 = 5;
							
$_SESSION[bimestr] = $bimestre2;
$ano = $_SESSION["AnoLetivo"];

$sql = "SELECT Matricula,Nome,Turma,Segmento,Foto FROM aluno WHERE Nome = '$nome2' && DATE_FORMAT(Nascimento, '%d/%m/%Y') = '$nasc'";

if ($sql == " "){
echo "Este aluno não existe";
}
else{
$resultado = mysqli_query($conexao,$sql) or die (mysql_error());

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
<?
     include "conexao.php";
$turma = $_SESSION["turma"];
$matricula = $_SESSION["matricula"];
$bimestre2 = $_SESSION["bimestr"];
$ano = $_SESSION["AnoLetivo"];
$cont = 0;


$sql2 = "SELECT Materia FROM materia_pri_qui";
$resultado2 = mysqli_query($conexao,$sql2) or die (mysql_error());
while ($linha2 = mysqli_fetch_array($resultado2))
{
	$materia = $linha2['Materia'];
		
$sql3 = "SELECT * FROM notas WHERE Matricula = '$matricula' && Ano = '$ano' && Materia = '$materia'";
$resultado3 = mysqli_query($conexao,$sql3) or die (mysql_error());
while ($linha3 = mysqli_fetch_array($resultado3))
{
	$recup = $linha3['Recuperacao'];
 	
	if( $bimestre2 == 1){
	$nota = $linha3['Bim1'];
	}
	if( $bimestre2 == 2){
	$nota = $linha3['Bim2'];
	}
	if( $bimestre2 == 3){
	$nota = $linha3['Bim3'];
	}
	if( $bimestre2 == 4){
	$nota = $linha3['Bim4'];
	}
	 if( $bimestre2 == 5 && $recup == 'Sim'){
	$nota = $linha3['RecFin'];
	$_SESSION[recfin] = $nota;
	}
	if($bimestre2 == 5 && $recup <> 'Sim'){
	$nota = '-'; $materia = '';
	}
     	

 	?>
        <input type="text" name="Materias[<? echo $cont; ?>]"  class="textbox3"  readonly  tabindex="-1" value="<? echo $materia; ?>"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
       	<input type="text" name="Notas[<? echo $cont; ?>]"  class="textbox4"  tabindex="$cont" value="<? echo $nota ?>" /> 
        <br /><br />
<?
$cont = $cont + 1;
$_SESSION[conta] =  $cont;

}

} 
?>
<br />
 <input type="submit" class="button" name="cadastrar" value="Lançar Notas"  />
  </fieldset>
</form>

</div>	
</div>
<div id='footer'>
<? include("footer.php"); ?>
</div>
</div>
</center>
</body>
</html>
