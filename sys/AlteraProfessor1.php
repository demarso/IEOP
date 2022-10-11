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
$nome3 = $_POST["Nome"];


$sql = "SELECT * FROM professor WHERE Nome = '$nome3'";

if ($sql == " "){
echo "Este aluno não existe";
}
else{
$resultado = mysqli_query($conexao, $sql) or die (mysql_error());

while ($linha = mysqli_fetch_array($resultado))
{
	$id2 = $linha['id'];
	$nome2 = $linha['Nome'];
	$materia = $linha['Materia'];
	$email = $linha['Email'];
	$telefone = $linha['Telefone'];
	$celular = $linha['Celular'];
	$status = $linha['Status'];
	
}
}
?>
 <cente>
        <form action="AlteraProfessorOK.php" method="post" enctype="multipart/form-data" name="cadastro" >
	<fieldset id="forms">
		<legend>Alterar os dados do Professor</legend>
				<br /><br />
            <label for="Id">ID:</label>
		<input type="text" name="Id" id="Id" class="textbox2" accesskey="n" tabindex="2" maxlength="12" value="<? echo $id2; ?>" title="Informe o ID do Professor"/><br />
		<br />
		<label for="Nome">Nome:</label>
		<input type="text" name="Nome" id="Nome" class="textbox" accesskey="n" tabindex="2"  value="<? echo $nome2; ?>" title="Informe o nome do Professor"/><br />
		<br />
       <label for="Materia">Matéria:</label>
		<input type="text" name="Materia" id="Materia" class="textbox2" accesskey="n" tabindex="4"  value="<? echo $materia; ?>" title="Informe a matéria"/><br />
		<br />
        <label for="Telefone">Telefone Res.:</label>
		<input type="text" name="Telefone" id="Telefone" class="textbox2"  accesskey="s" tabindex="14"  value="<? echo $telefone; ?>" onKeyPress="MascaraTelefone(form1.Telefone);" maxlength="14"  onBlur="ValidaTelefone(form1.Telefone);" title="Informe o Telefone Residencial" /><br />
		<br />
        <label for="Celular">Celular:</label>
		<input type="text" name="Celular" id="Celular" class="textbox2"  accesskey="s" tabindex="5" value="<? echo $celular; ?>" onKeyPress="MascaraCelular(form1.Celular);" maxlength="15"  title="Informe o Celular" /><br /><br />
        
        <label for="Email">Email:</label>
		<input type="text" name="Email" id="Email" class="textbox3"  accesskey="s" tabindex="14"  value="<? echo $email; ?>"  title="Informe o Email" /><br />
		<br />
		<label for="Status">Status:</label>
         <select name="Status" id="Status" class="textbox2"  tabindex="8" title="Informe a Raça">
			<option value="<? echo $status; ?>"><? echo $status; ?></option>
            <option value="Ativo">Ativo</option>
            <option value="Inativo">Inativo</option>
         </select><br />
		<br />
        
        <input type="submit" class="button" name="cadastrar" value="Alterar"  />
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
