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
		<legend align="center">Defini&ccedil;&atilde;o de Dias Letivos e Cargas Hor&aacute;rias para o Ano</legend><br /><br />
  	<label for="Ano">Ano:</label>
         <select name="Ano" id="Ano" class="textbox2" tabindex="6" title="Informe o Ano que o aluno vai estudar">
			<option value="">Selecione</option>
            <option value="2019">2018</option>
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
   <!-- <label for="Ano">Dias Letivos:</label>
  		<input name="Ano" id="Ano"  class="textbox4" size="4" value="<? //echo date("Y")?>" readonly></label> -->
		<br />
        <label for="DiasLetivos">Dias Letivos:</label>
  		<input name="DiasLetivos" id="DiasLetivos"  class="textbox4" size="3"></label>
		<br /><br />
        <label for="Ch6ano">Carga Hor&aacute; 6&ordm; Ano:</label>
  		<input name="Ch6ano" id="Ch6ano"  class="textbox2" size="10"></label>
        <br /><br />
        <label for="Ch7ano">Carga Hor&aacute;ria 7&ordm; Ano:</label>
  		<input name="Ch7ano" id="Ch7ano"  class="textbox2" size="10"></label>
        <br /><br />
        <label for="Ch8ano">Carga Hor&aacute;ria 8&ordm; Ano:</label>
  		<input name="Ch8ano" id="Ch8ano"  class="textbox2" size="10"></label>
        <br /><br />
        <label for="Ch9ano">Carga Hor&aacute;ria 9&ordm; Ano:</label>
  		<input name="Ch9ano" id="Ch9ano"  class="textbox2" size="10"></label>
        <br /><br />
        	
        <input type="submit" class="button" name="cadastrar" value="REGISTRA"  />
	</fieldset>
</form><br /><br />
<center>
<fieldset>
<legend align="center">Rela&ccedil;&atilde;o de Dias Letivos e Cargas Hor&aacute;rias lan&ccedil;ados</legend>
<br />
<table align="center" width="80%" border="1" bgcolor="#CCCCCC">
<tr align="center">
<td align="center" style="width: 16%"><font color="#333333"><b>Ano</b></font></td>
<td align="center" style="width: 16%"><font color="#333333"><b>Dias Letivos</b></font></td>
<td align="center" style="width: 16%"><font color="#333333"><b>CH 6&ordm; Ano</b></font></td>
<td align="center" style="width: 16%"><font color="#333333"><b>CH 7&ordm; Ano</b></font></td>
<td align="center" style="width: 16%"><font color="#333333"><b>CH 8&ordm; Ano</b></font></td>
<td align="center" style="width: 16%"><font color="#333333"><b>CH 9&ordm; Ano</b></font></td>
</tr>
</table>
<?
include("conexao.php");
$con = 2;
$anoatual = date("Y");
	$sql = "SELECT * FROM parametro WHERE Ano > '$anoatual'-2";
		$resultado = mysqli_query($conexao,$sql) or die (mysql_error());
		while ($linha = mysqli_fetch_array($resultado))
		{
			$diasletivos = $linha['DiasLetivos'];
			$ano3 = $linha['Ano'];
			$ch6ano = $linha['Ch6ano'];
			$ch7ano = $linha['Ch7ano'];
			$ch8ano = $linha['Ch8ano'];
			$ch9ano = $linha['Ch9ano'];
		
		if ($con % 2 == 0)
		 $bgcolor = "bgcolor='#FFFFFF'";
	    else
		 $bgcolor = "bgcolor='#FFFFCC'";
		
?>
<table align="center" width="80%" border="1" bgcolor="#CCCCCC">
<tr align="center" <? echo $bgcolor; ?>>
<td align="center" style="width: 16%"><font color="#333333"><b><? echo $ano3 ?></b></font></td>
<td align="center" style="width: 16%"><font color="#333333"><b><? echo $diasletivos ?></b></font></td>
<td align="center" style="width: 16%"><font color="#333333"><b><? echo $ch6ano ?></b></font></td>
<td align="center" style="width: 16%"><font color="#333333"><b><? echo $ch7ano ?></b></font></td>
<td align="center" style="width: 16%"><font color="#333333"><b><? echo $ch8ano ?></b></font></td>
<td align="center" style="width: 16%"><font color="#333333"><b><? echo $ch9ano ?></b></font></td>
</tr>
</table>
<? $con = $con + 1; }?>
</fieldset>
<br /><br />
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