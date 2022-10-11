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
// Conexão com o banco de dados
include("conexao.php");


	$sql = "SELECT *,DATE_FORMAT(Data,'%d/%m/%Y') as iData FROM aluno";
$resultado = mysqli_query($conexao, $sql) or die (mysql_error());
while ($linha = mysqli_fetch_array($resultado))
{
	$matricula = $linha['Matricula'];
	$nome2 = $linha['Nome'];
	$ano2 = $linha['Ano'];
	$data2 = $linha['iData'];
	$turma = $linha['Turma'];
	$transferencia = $linha['Transferencia'];
	$segmento = $linha['Segmento'];
		
echo $matricula.' '.$nome2.' '.$ano2.' '.$data2.' '.$turma.' '.$transferencia.' '.$segmento.'<br />';
	
	$sql2 = "INSERT INTO histMatr(Matricula,Nome,Data,Ano,Turma,Transferencia,Segmento) VALUES('$matricula','$nome2',STR_TO_DATE('$data2','%d/%m/%Y'),'$ano2','$turma','$transferencia',$segmento)";
 
 $result2 = mysqli_query($conexao, $sql2) or die ("Atualziação não realizado.");
	 
}
			echo "<font face=verdana size=1>A Atualziação foi realizada com sucesso.</font>";
echo "\n";
		
		/*$resultado = mysql_query("SELECT MAX(id) FROM aluno");
		while ($linha = mysql_fetch_array($resultado)) {
		$idMat1 = $linha["MAX(id)"];
		}
		$resultado2 = mysql_query("SELECT Matricula FROM aluno WHERE id = '$idMat1'");
		while ($linha1 = mysql_fetch_array($resultado2)) {
		$_SESSION[idMat] = $linha1["Matricula"];
		}*/
		
   mysql_close($conexao);
   
?>
   </div> 
   </div>
     
<div id='footer'>

</div>
</div>
</center>
</body>
</html>
