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
      <form action="Boletim2.php" method="post" enctype="multipart/form-data" name="cadastro" target="_blank">
	<fieldset id="forms">
		<legend>Impressão do Boletim</legend><br /><br />
  <label for="Matrícula">Nome:</label><select name="Nome" id="Nome" class="textbox"  onChange="ajaxGet('processConsultaGeral.php?Nome='+this.value, document.getElementById('NascEx'), true)">
           <option value="">Selecione</option>
        				<?php
			            //Busco os estados
						require_once("conexao.php");
						$sql3 = "SELECT Nome FROM aluno WHERE Status = 'Ativo' && Segmento <> 0  ORDER BY Nome";
						$results3 = mysql_query($sql3);
						while ( $row = mysql_fetch_array($results3) ) {
							echo "<option value='".$row[0]."'>".$row[0]."</option>";
						}
					    ?>
              </select>
		<br /><br /><br />
            <!-- Campo que irá receber a consulta enviada-->
          <label for=""></label><label for="Nome">Data de Nascimento:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><input name="NascEx" id="NascEx"  class="textbox2" size="50" readonly align="middle"></label><br /><br /><br /><br /><br />
          <!-- <label for=""></label><label for="Seg">Segmento:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name="SegEx" id=SegEx"  class="textbox4" size="50"></label><br /><br /><br /> -->
         
          
        
		
        <input type="submit" class="button" name="cadastrar" value="Consulta"  />
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
