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

// Recupera os dados dos campos
	$id2 = $_POST['Idn'];
	$matricula = $_POST['Matriculan'];
	$nome2 = $_POST['Nomen'];
	$data2 = $_POST['Datan'];
	$ano2 = $_POST['Anon'];
	$nasc = $_POST['Nascimenton'];
	$endereco = $_POST['Enderecon'];
	$certidao = $_POST['Certidaon'];
	$raca = $_POST['Racan'];
	$sexo = $_POST['Sexon'];
	$sangue = $_POST['Sanguen'];
	$natural = $_POST['Naturaln'];
	$nacional = $_POST['Nacionaln'];
	$bairro = $_POST['Bairron'];
	$cidade = $_POST['Cidaden'];
	$estado = $_POST['Estadon'];
	$cep = $_POST['Cepn'];
	$pai = $_POST['Pain'];
	$profpai = $_POST['Profpain'];
	$mae = $_POST['Maen'];
	$profmae = $_POST['Profmaen'];
	$email = $_POST['Emailn'];
	$telefone = $_POST['Telefonen'];
	$celpai = $_POST['CelPain'];
	$celmae = $_POST['CelMaen'];
	$transferencia = $_POST['Transferencian'];
	$turma = $_POST['Turman'];
	$carne = $_POST['Carnen'];
	$result = $_POST['Result'];

    $ano = $_SESSION["AnoLetivo"];
/*
echo $id2;
echo $matricula;
echo $nome2;
echo $data2;
echo $nasc;
echo $ano2;
echo $turma;
echo $carne;*/
echo $$result;

	
	$sql = "SELECT Segmento FROM turmas WHERE Ano = '$turma'";
$resultado = mysqli_query($conexao, $sql) or die (mysql_error());
while ($linha = mysqli_fetch_array($resultado))
{
	$segmento = $linha['Segmento'];
		
}	

$query1 = mysqli_query($conexao, $sql = "UPDATE aluno SET id='$id2', Matricula='$matricula', Nome='$nome2', Data=STR_TO_DATE('$data2','%d/%m/%Y') , Ano='$ano2' ,Nascimento=STR_TO_DATE('$nasc','%d/%m/%Y'), Endereco='$endereco',Certidao='$certidao',Raca='$raca',Sexo='$sexo', Sangue='$sangue', Naturalidade='$natural',Nacionalidade='$nacional', Telefone='$telefone', CelPai='$celpai', CelMae='$celmae', Bairro='$bairro', Cidade='$cidade', Estado='$estado', Cep='$cep', Pai='$pai', ProfPai='$profpai', Mae='$mae', ProfMae='$profmae', Email='$email', Transferencia='$transferencia', Turma='$turma',Segmento='$segmento' WHERE Matricula = '$matricula'") or die(mysql_error());

$query2 = mysqli_query($conexao, $sql = "UPDATE pagamento SET Carne='$carne' WHERE Matricula = '$matricula'") or die(mysql_error());

$query3 = mysqli_query($conexao, $sql = "UPDATE histMatr SET Matricula='$matricula', 
	      Nome='$nome2', Data=STR_TO_DATE('$data2','%d/%m/%Y'), Ano='$ano2', Turma='$turma', 
	      Transferencia='$transferencia', Segmento='$segmento', Resultado='$result' WHERE Matricula = '$matricula'
	      && Ano = '$ano'") or die(mysql_error());

 
echo "<font face=verdana size=1>Os dados do Aluno foram alterados com sucesso.</font>";

mysqlI_close($conexao); 

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
