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
      <form action="ExcluiAlunoOK.php" method="post" enctype="multipart/form-data" name="cadastro" >
	<fieldset id="forms">
		<legend>Consulta de Aluno</legend><br /><br />
  <label for="Matr�cula">Nome:</label><select name="Nome" id="Nome" class="textbox"  onChange="ajaxGet('processConsultaGeral.php?Nome='+this.value, document.getElementById('NascEx'), true)">
           <option value="">Selecione</option>
        				<?php
			            //Busco os estados
						require_once("conexao.php");
						$sql3 = "SELECT Nome FROM aluno WHERE Status = 'Ativo' ORDER BY Nome";
						$results3 = mysqli_query($conexao,$sql3);
						while ( $row = mysqli_fetch_array($results3) ) {
							echo "<option value='".$row[0]."'>".$row[0]."</option>";
						}
					    ?>
              </select>
		<br /><br /><br />
            <!-- Campo que ir� receber a consulta enviada-->
          <label for=""></label><label for="Nome">Data de Nascimento:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><input name="NascEx" id="NascEx"  class="textbox2" size="50" readonly align="middle"></label><br /><br /><br />
		<br /><br />
       	<label for="Motivo">Motivo:</label>
		<select name="Transferencia"  class="textbox3" title="Informe a origem da inclus�o">
    		<option value" "></option>
            <option value"Formatura">Formatura</option>
    		<option value"Transfer�ncia para Rede Particular">Transfer&ecirc;ncia para Rede Particular</option>
    		<option value"Transfer�ncia para Rede P�blica">Transfer&ecirc;ncia para Rede P&uacute;blica</option>
    		<option value"Op��o">Op&ccedil;&atilde;o</option>
            <option value"Expuls�o">Expuls&atilde;o</option>
    	</select>
		<br /><br /><br />
        <input type="submit" class="button" name="cadastrar" value="Excluir"  />
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
