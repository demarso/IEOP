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
<meta http-equiv="content-type" content="text/html; charset='UTF-8'">
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
      <form action="anoLetivoOK.php" method="post" enctype="multipart/form-data" name="cadastro" >
	<fieldset>
		<legend align="center">Defini&ccedil;&atilde;o do Ano Letivo para Pesquisas</legend><br /><br />
  		<label for="AnoLetivo">Ano Letivo:</label>
         <select name="AnoLetivo" id="AnoLetivo" class="textbox2" tabindex="6" title="Informe o Ano que quer pesquisar">
			<option value="">Selecione</option>
             <option value="2018">2018</option>
             <option value="2019">2019</option>
             <option value="2020">2020</option>
             <option value="2021">2021</option>
             <option value="2022">2022</option>
             <option value="2023">2023</option>
             <option value="2024">2024</option>
             <option value="2025">2025</option>
             <option value="2026">2026</option>
             <option value="2027">2027</option>
             <option value="2028">2028</option>
             <option value="2029">2029</option>
             <option value="2030">2030</option>
		 </select><br />
		 <br /><br />
        	
        <input type="submit" class="button" name="cadastrar" value="REGISTRA"  />
	</fieldset>
</form><br /><br />

</fieldset>
<br /><br />

 </div> 
</div>  
<div id='footer'>
<? include("footer.php"); ?>
</div>
</div>
</center>
</body>
</html>