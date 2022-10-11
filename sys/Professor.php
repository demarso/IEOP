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
<script type="text/javascript" src="include/jquery-1.6.1.min.js"></script>
<script type="text/javascript" src="include/jquery.maskedinput.js"/></script>
<script language="javascript" src="include/micoxAjax.js"></script>
<script type="text/javascript">
$(document).ready(function(){
		$("#Matricula").mask("9999-9999-9999");
		$("#Telefone").mask("(99)9999-9999");
		$("#CelMae").mask("(99)99999-9999");
		$("#CelPai").mask("(99)99999-9999");
		$("#Celular").mask("(99)99999-9999");
		$("#cpf").mask("999.999.999-99");
		$("#cep").mask("99999-999");
		$("#data").mask("99/99/9999");
	});
</script>
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
      <form action="ProfessorOK.php" method="post" enctype="multipart/form-data"  name="form1" >
	<fieldset id="forms"><br />
		<legend>Cadastro do Professor</legend><br /><br />
		<label for="Id">ID:</label>
		<input type="text" name="Id" id="Id" class="textbox2" accesskey="n" tabindex="1" maxlength="12" onkeypress="return Onlynumbers(event)" title="Informe a ID do aluno"/><br />
		
		<br />
		<label for="Nome">Nome:</label>
		<input type="text" name="Nome" id="Nome" class="textbox" accesskey="n" tabindex="2" onkeypress="return Onlychars(event)" title="Informe o nome do Professor"/><br />
		<br />
       	<label for="Materia">Matéria:</label>
		<input type="text" name="Materia" id="Materia" class="textbox" accesskey="n" tabindex="3"  title="Informe a data de mascimento"/><br />
		<br />
		<label for="Telefone">Telefone Res:</label>
		<input type="text" name="Telefone" id="Telefone" class="textbox2"  accesskey="s" tabindex="4" onKeyPress="MascaraTelefone(form1.Telefone);" maxlength="14"   title="Informe o Telefone Residencial" />formato: (00) 0000-0000<br /><br />
        <label for="Celular">Celular:</label>
		<input type="text" name="Celular" id="Celular" class="textbox2"  accesskey="s" tabindex="5" onKeyPress="MascaraCelular(form1.Celular);" maxlength="15"   title="Informe o Celular" />formato: (00) 00000-0000<br /><br />
				<label for="Mail">Email</label>
		<input type="text" name="Email" id="Email" class="textbox"  accesskey="e" tabindex="6" onBlur="ValidEmail();" title="Informe um email válido" />
		<br /><br /><br /><br />
        
        
        <input type="submit" class="button" name="cadastrar" value="Cadastrar"  />
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
