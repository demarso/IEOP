<?php
session_start();
require("include/arruma_link.php");
if (! isset($_SESSION['id'])){
header("Location: index.php?erro=1");
exit;
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/frameset.dtds">
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
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
<div id="topo"><? include("head.php"); ?></div>
 <div id="menubox">
  <? include("menu.html"); ?> 
 </div>
<div id="main">

   <div id="palco2"><br /><br />
   <?
    require_once("conexao.php");
   ?>
      <form action="Boletim2.php" method="post" enctype="multipart/form-data" name="cadastro" target="_blank" >
	<fieldset id="forms">
		<legend>Imprime Boletim do Aluno do 9&ordm; ANO</legend><br /><br />
        
            
        
        <label for="Nome">Nome:</label>
  <select name="Nome" id="Nome" class="textbox" onChange="ajaxGet('processConsultaGeral.php?Nome='+this.value, document.getElementById('NascEx'), true)" >
           <option value="" >Selecione</option>
        				 <?php
						include ("conexao.php");
						$ano = $_SESSION["AnoLetivo"];
			            //Busco os estados
						$sql3 = "SELECT a.Nome FROM aluno a, histMatr h WHERE a.Nome = h.Nome && a.Status = 'Ativo' && h.Turma = '9 Ano' && h.Ano = '$ano' ORDER BY h.Chamada";
						$results3 = mysqli_query($conexao, $sql3);
						while ( $row = mysqli_fetch_array($results3) ) {
							echo "<option value='".$row[0]."'>".$row[0]."</option>";
						}
		 ?>
              </select>
		<br /><br /><br />
            <!-- Campo que irá receber a consulta enviada-->
           <label for="NascEx">Data de Nascimento:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><br />
          <input name="NascEx" id="NascEx"  class="textbox2" size="50" readonly align="middle"></label><br /><br /><br />
          
          <label for="Situacao">Situa&ccedil;&atilde;o do aluno:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
          <input name="Situacao" id="Situacao"  class="textbox" size="50"onKeyUp="this.value = this.value.toUpperCase();" ></label>
          <br /><br /><br /><br />
          
          
          <font size="2" ><b>Imprime Status?</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font>
           SIM:&nbsp;&nbsp;&nbsp;<input  type="radio" name="Recup1" id="Recup1" value="Sim" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
           N&Atilde;O:&nbsp;&nbsp;&nbsp;<input  type="radio" name="Recup1" id="Recup2" value="Nao" checked><br /><br />
            <br /><br />
                 
		<input  id="enviar" type='submit' class='button' name='cadastrar' value='IMPRIME'>
		
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
