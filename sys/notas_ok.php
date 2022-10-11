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

<?
include("conexao.php");

$matricula = '2013-0001-161';
$ano = 2013;
 
 $sql3 = "SELECT Materia FROM materia_sex_iot";
 
 $resultado3 = mysqli_query($conexao, $sql3) or die (mysql_error());

 while ($linha3 = mysqli_fetch_array($resultado3))
{
	$materia = $linha3['Materia'];
 
 $sql2 = "INSERT INTO notas(Matricula,Ano,Materia,Bim1,Bim2,Bim3,Bim4,Faltas1,Faltas2,Faltas3,Faltas4) VALUES('$matricula','$ano','$materia','-','-','-','-','-','-','-','-')";
 
 $result2 = mysqli_query($conexao, $sql2) or die ("Cadastro Materias para Notas não realizado.");
}
		
?>
 
</body>
</html>
