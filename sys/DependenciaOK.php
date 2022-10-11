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
   <?
 include ("conexao.php");
$nome2 = $_POST["Nome"];
$turma1 = $_POST["AnoDep1"];
$turma2 = $_POST["AnoDep2"];
$nasc = $_POST["NascEx"];
$mat1 = $_POST["Mat1"];
$mat2 = $_POST["Mat2"];
$ano = $_SESSION["AnoLetivo"];

$materia = $mat1; 
 $sql = "SELECT Matricula FROM aluno WHERE Nome = '$nome2' && DATE_FORMAT(Nascimento, '%d/%m/%Y') = '$nasc'";
 $resultado = mysqli_query($conexao,$sql) or die (mysql_error());

while ($linha = mysqli_fetch_array($resultado))
{
	$matricula = $linha['Matricula'];
	
                     $sql = "SELECT Matricula, Ano FROM notasDepend WHERE Matricula = '$matricula' && Ano = '$ano'";
                             $resultado = mysqli_query($conexao,$sql) or die (mysql_error());
                             while ($linha = mysqli_fetch_array($resultado))
                              {
	                              $matr = $linha['Matricula'];
								  if(!empty($matr)){
								   echo "<script>alert('Aluno já inserido para este ano!');history.back(-1);</script>";
	                               exit;
								  }
							  }
for($n=0;$n<2;$n++){
	if($n == 0){
		 $turmam1 = $turma1; $turmam2 = '';}
	else if($n == 1){
		 $turmam1 = ''; $turmam2 = $turma2;}	  
		 
$sql2 = "INSERT INTO notasDepend(Matricula,Nome,Turma1,Turma2,Ano,Materia,Bim1,Bim2,Bim3,Bim4,Faltas1,Faltas2,Faltas3,Faltas4) VALUES('$matricula','$nome2','$turmam1','$turmam2','$ano','$materia','-','-','-','-','-','-','-','-')";
 
 $result2 = mysqli_query($conexao,$sql2) or die ("Cadastro Materias para Dependencia não realizado.");
 if(!empty($mat2))
    $materia = $mat2;
	else $n=2;
 }
}	
	echo "Cadastro relaizado";
  //echo "<script type = 'text/javascript'> location.href = 'Notas.php'</script>";
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
