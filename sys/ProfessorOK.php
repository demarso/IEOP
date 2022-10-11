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
	$id = $_POST['Id'];
	$nome2 = $_POST['Nome'];
	$email = $_POST['Email'];
	$telefone = $_POST['Telefone'];
	$celular = $_POST['Celular'];
	$materia = $_POST['Materia'];
	$status = "Ativo";
	
	$sql = "INSERT INTO professor(id,Nome,Materia,Telefone,Celular,Email,Status) VALUES('$id','$nome2','$materia','$telefone','$celular','$email','$status')";
 
 $result = mysqli_query($conexao,$sql) or die ("Cadastro não realizado.");
 
			echo "<font face=verdana size=1>O cadastro foi realizado com sucesso.</font>";
echo "\n";
		
				
   mysqli_close($conexao);
   echo "<script type = 'text/javascript'> location.href = 'Professor.php'</script>";		
?>
   </div> 
   </div>
     
<div id='footer'>

</div>
</div>
</center>
</body>
</html>
