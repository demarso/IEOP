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

	// Recupera os dados dos campos
	$matricula = $_POST['Matricula'];
	$nasc = $_POST['Nascimento'];
	$nome2 = $_POST['Nome'];
	$data2 = $_POST['Data'];
	if(empty($data2)) {echo "<script>alert('A data da Rematícula deve ser preenchida!!  ** RETORNANDO PÁGINA **'); history.go(-2);</script>"; exit;}
	$transferencia = $_POST['Transferencia'];
	$turma = $_POST['Turma'];
	$carne = $_POST['Carne'];
	if(empty($carne)) {echo "<script>alert('O nº do Carnê deve ser preenchido!!  ** RETORNANDO PÁGINA **'); history.go(-2);</script>"; exit;}
	$status = "Ativo";
	$ano2 = $_POST['Ano'];
	if(empty($ano2)) {echo "<script>alert('O ano deve ser preenchido!!  ** RETORNANDO PÁGINA **'); history.go(-2);</script>"; exit;}
	$segmento = $_POST['Segmento'];
	 if(empty($segmento) && $segmento <> 0) {echo "<script>alert('Você não aguardou o Segmento ser carregado!!  ** RETORNANDO PÁGINA **'); history.go(-2);</script>"; exit;}
		
if ($segmento == 1){
 $sql3 = "SELECT Materia FROM materia_pri_qui";
 
 $resultado3 = mysqli_query($conexao,$sql3) or die (mysql_error());

    while ($linha3 = mysqli_fetch_array($resultado3))
    {
	$materia = $linha3['Materia'];
 
    $sql2 = "INSERT INTO notas(Matricula,Ano,Materia,Bim1,Bim2,Bim3,Bim4,RecFin,Faltas1,Faltas2,Faltas3,Faltas4,Media,Recuperacao) VALUES('$matricula','$ano2','$materia','-','-','-','-','-','-','-','-','-','-','-')";
 
    $result2 = mysqli_query($conexao, $sql2) or die ("Cadastro Materias para Notas do 1º segmento não realizado.");
    }
}

if ($segmento == 2){
 $sql3 = "SELECT Materia FROM materia_sex_iot";
 
 $resultado3 = mysqli_query($conexao,$sql3) or die (mysql_error());

   while ($linha3 = mysqli_fetch_array($resultado3))
   {
   $materia = $linha3['Materia'];
 
   $sql2 = "INSERT INTO notas(Matricula,Ano,Materia,Bim1,Bim2,Bim3,Bim4,RecFin,Faltas1,Faltas2,Faltas3,Faltas4,Media,Recuperacao) VALUES('$matricula','$ano2','$materia','-','-','-','-','-','-','-','-','-','-','-')";
 
   $result2 = mysqli_query($conexao,$sql2) or die ("Cadastro Materias para Notas do 2º segmento não realizado.");
   }
}

if ($segmento == 3){
 $sql3 = "SELECT Materia FROM materia_nono";
 
 $resultado3 = mysqli_query($conexao,$sql3) or die (mysql_error());

   while ($linha3 = mysqli_fetch_array($resultado3))
   {
	$materia = $linha3['Materia'];
 
    $sql2 = "INSERT INTO notas(Matricula,Ano,Materia,Bim1,Bim2,Bim3,Bim4,RecFin,Faltas1,Faltas2,Faltas3,Faltas4,Media,Recuperacao) VALUES('$matricula','$ano2','$materia','-','-','-','-','-','-','-','-','-','-','-')";
 
    $result2 = mysqli_query($conexao,$sql2) or die ("Cadastro Materias para Notas do 3º segmento não realizado.");
    }
}
			
	$query = mysqli_query($conexao,$sql = "UPDATE aluno SET Status = 'Ativo', Turma='$turma', Segmento='$segmento' WHERE Matricula = '$matricula' && DATE_FORMAT(Nascimento, '%d/%m/%Y') = '$nasc'") or die(mysql_error());	

    	
	$sql2 = "INSERT INTO histMatr(Matricula,Nome,Nascimento,Data,Ano,Turma,Transferencia,Segmento) VALUES('$matricula','$nome2',STR_TO_DATE('$nasc','%d/%m/%Y'),STR_TO_DATE('$data2','%d/%m/%Y'),'$ano2','$turma','$transferencia',$segmento)";
 
    $result2 = mysqli_query($conexao,$sql2) or die ("Cadastro de rematrícula não realizado.");
	
	$query2 = mysqli_query($conexao,$sql = "UPDATE histMatr SET Resultado = '' WHERE Matricula = '$matricula' && Ano = '$ano2'") or die(mysql_error());
	 
 $sql3 = "INSERT INTO pagamento(Matricula,Ano,Carne,Jan,Fev,Mar,Abr,Mai,Jun,Jul,Ago,Sete,Outu,Nove,Deze,Status) VALUES('$matricula','$ano2','$carne','Nao','Nao','Nao','Nao','Nao','Nao','Nao','Nao','Nao','Nao','Nao','Nao','$status')";
 
 $result3 = mysqli_query($conexao,$sql3) or die ("Cadastro de pagamento não realizado.");
 
			echo "<font face=verdana size=1>O cadastro foi realizado com sucesso.</font>";
echo "\n";
		
		/*$resultado = mysql_query("SELECT MAX(id) FROM aluno");
		while ($linha = mysql_fetch_array($resultado)) {
		$idMat1 = $linha["MAX(id)"];
		}
		$resultado2 = mysql_query("SELECT Matricula FROM aluno WHERE id = '$idMat1'");
		while ($linha1 = mysql_fetch_array($resultado2)) {
		$_SESSION[idMat] = $linha1["Matricula"];
		}*/
		
   mysqli_close($conexao);
   
?>
   </div> 
   </div>
     
<div id='footer'>

</div>
</div>
</center>
</body>
</html>
