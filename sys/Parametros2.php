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
      <form action="ParametrosOK.php" method="post" enctype="multipart/form-data" name="cadastro" >
	<fieldset>
		<legend>Definição de dias letivos para o Ano</legend><br /><br />
  		<label for="DiasLetivos">Dias Letivos:</label>
  		<input name="DiasLetivos" id="DiasLetivos"  class="textbox4" size="3"></label><br /><br /><br />
		<label for="Ano">Ano:</label>
         <select name="Ano" id="Ano" class="textbox2" tabindex="6" title="Informe o Ano que o aluno vai estudar">
			<option value="">Selecione</option>
            <option value="2011">2011</option>
            <option value="2012">2012</option>
            <option value="2013">2013</option>
            <option value="2014">2014</option>
             <option value="2015">2015</option>
             <option value="2016">2016</option>
             <option value="2017">2017</option>
             <option value="2018">2018</option>
             <option value="2019">2019</option>
             <option value="2020">2020</option>
		 </select><br />
		<br />
        <br />		
        <input type="submit" class="button" name="cadastrar" value="BUSCA"  />
	</fieldset>
</form><br /><br />
<center>
<fieldset>
<legend>Relação de dias letivos lançados</legend>

<table align="center" width="40%" border="1" bgcolor="#CCCCCC">
<tr align="center">
<td align="center" style="width: 50%"><font color="#333333"><b>Ano</b></font></td>
<td align="center" style="width: 50%"><font color="#333333"><b>Dias Letivos</b></font></td>
</tr>
</table>
<?
include("conexao.php");
	$sql = "SELECT * FROM parametro ";
		$resultado = mysqli_query($conexao,$sql) or die (mysql_error());
		while ($linha = mysqli_fetch_array($resultado))
		{
			$diasletivos = $linha['DiasLetivos'];
			$ano2 = $linha['Ano'];
		
		
?>
<table align="center" width="40%" border="1" bgcolor="#CCCCCC">
<tr align="center">
<td align="center" style="width: 50%"><font color="#333333"><b><? echo $ano2 ?></b></font></td>
<td align="center" style="width: 50%"><font color="#333333"><b><? echo $diasletivos ?></b></font></td>
</tr>
</table>
<? }?>
</fieldset>
</center>
 </div> 
</div>  
<div id='footer'>
<? include("footer.php"); ?>
</div>
</div>
</center>
</body>
</html>