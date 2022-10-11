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
<center><div id="sitemain">
<div id="topo">
<? include("head.php"); ?> 
</div>
 <div id="menubox">
  <? include("menu.html"); ?> 
 </div>
 <div id="main">
  <div id="palco2">
  <br /><br /><br />
  <fieldset>
    	<legend>Altera Dados do Aluno do 1º Ano</legend>
    <form name = "form1" method = "post" action = "histLista.php" enctype = "multipart/form-data">
      <label for="Nome">Nome:</label>
      <select name="Nome" id="Nome" class="textbox" onChange="ajaxGet('processConsultaHist.php?Nome='+this.value, document.getElementById('Matr'), true)" d>
        <option value="" >Selecione</option>
        <?php
						include ("conexao.php");
			            //Busco os estados
						$sql3 = "SELECT Nome FROM aluno WHERE Status = 'Ativo' ORDER BY Nome";
						$results3 = mysqli_query($conexao,$sql3);
						while ( $row = mysqli_fetch_array($results3) ) {
							echo "<option value='".$row[0]."'>".$row[0]."</option>";
						}
					    ?>
      </select>
      <br />
      <br />
      <br />
      <label for=""></label><label for="Matr">Data de Nascimento:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><input name="Matr" id="Matr"  class="textbox2" size="50" readonly align="middle"></label><br /><br /><br /><br /><br />
     
      <input type = "submit" name = "Submit" value = "Enviar">
    </form>
    </fieldset>
 </div>
</div>
<div id='footer'>
  <? include("footer.php"); ?>
</div>
</div>

</center>
</body>
</html>