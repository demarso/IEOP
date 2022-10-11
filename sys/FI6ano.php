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
 <div id="main">  <div id="palco2">
  <br /><br /><br />
  <fieldset>
    	<legend>Imprime Ficha individual do Aluno do 6&ordm; Ano</legend>
    <form name = "form1" method = "post" action = "Fichaindividual.php" enctype = "multipart/form-data" target="_blank">
      <label for="Nome">Nome:</label>
      <select name="Nome" id="Nome" class="textbox" onChange="ajaxGet('processConsultaGeral.php?Nome='+this.value, document.getElementById('NascEx'), true)" onMouseMove="ajaxGet('processConsultaGeral.php?Nome='+'', document.getElementById('Situacao'), true)">
        <option value="" >Selecione</option>
         <?php
						include ("conexao.php");
						//$ano = date('Y');
						$ano = $_SESSION["AnoLetivo"];
			            //Busco os estados
						$sql3 = "SELECT a.Nome FROM aluno a, histMatr h WHERE a.Nome = h.Nome && a.Status = 'Ativo' && h.Turma = '6 Ano' && h.Ano = '$ano' ORDER BY h.Chamada";
						$results3 = mysqli_query($conexao, $sql3);
						while ( $row = mysqli_fetch_array($results3) ) {
							echo "<option value='".$row[0]."'>".$row[0]."</option>";
						}
		 ?>
      </select>
      <br />
      <br />
      <br />
      <label for=""></label><label for="Nome">Data de Nascimento:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><input name="NascEx" id="NascEx"  class="textbox2" size="50" readonly align="middle"></label><br /><br /><br />
      
      <!--  <label for="Situacao">Situação do aluno:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
          <input name="Situacao" id="Situacao"  class="textbox" size="50" ></label> -->
          <br /><br /><br /><br />
 <font size="2" ><b>Imprime Status?</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font>
           SIM:&nbsp;&nbsp;&nbsp;<input  type="radio" name="Recup1" id="Recup1" value="Sim" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
           NÃO:&nbsp;&nbsp;&nbsp;<input  type="radio" name="Recup1" id="Recup2" value="Nao" checked ><br /><br />
            <br /><br />


    
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