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

   <div id="palco3">
     <center>
<font size="3" color="#0099CC"><u><b>Relação de Matérias Cadastradas</b></u></font><br /><br />   
  <table align="center" width="80%" border="1" bgcolor="#CCCCCC">
<tr align="center">
<td align="center" style="width: 50%"><font color="#0000FF">MAT&Eacute;RIA</font></td>
<td align="center" style="width: 50%"><font color="#0000FF">SEGMENTO</font></td>
</tr>
</table>
</center>
<?php
include "conexao.php";
$matricula1 = $_POST['Matr'];
$sql = "SELECT * FROM materia ORDER By Segmento";
$resultado = mysqli_query($conexao,$sql) or die (mysql_error());
while ($linha = mysqli_fetch_array($resultado)) {
	$materia = $linha['Materia'];
	if ($linha['Segmento'] == 1){
	 $segmento = "Primeiro Segmento";
	}
	if ($linha['Segmento'] == 2){
	 $segmento = "Segundo Segmento";
	}
	if ($linha['Segmento'] == 3){
	 $segmento = "Ambos Segmentos";
	}
?>
<center>
<table align="center" width="80%" border="1" bgcolor="#CCCCCC">
  <tr align="center">
    <td align="center" style="width: 50%"><font color="#000000"><? echo $materia; ?></font></td>
    <td align="center" style="width: 50%"><font color="#000000"><? echo $segmento; ?></font></td>
  </tr>
</table>
</center>
<?
}
?>

   </div> 
   
   <div id="palco4">
    <form action="CadMateriaOK.php" method="post" >
     <fieldset>
		<legend>Cadastro de Matéiras</legend><br /><br />
		<label for="Materia">Matéria:</label>
		<input type="text" name="Materia" id="Materia" class="textbox" tabindex="1" maxlength="12" title="Informe o nome da Matéria"/><br />
		<br /><br />
        <label for="Segmento">Segmento:</label><br /><br />
		 <select name="Ano" id="Ano" class="textbox3" tabindex="2" title="Informe o segmento da matéria">
			<option value="">Selecione</option>
            <option value="1">1º Segmento</option>
            <option value="2">2º Segmento</option>
            <option value="3">Ambos Segmentos</option>
           </select> 
            <br /><br /><br />
        <input type="submit" class="button" name="cadastrar" value="Cadastra"  />
     </fieldset>
    </form><br />
   ************************************************************************************<br />
    <form action="ExclMateriaOK.php" method="post" >
     <fieldset>
		<legend>Exclusão de Matéiras</legend><br /><br />
		<label for="Materia">Matéria:</label>
		<select name="Materia" id="Materia" class="textbox" >
           <option value="">Selecione</option>
        				<?php
			            //Busco os estados
						require_once("conexao.php");
						$sql3 = "SELECT Materia FROM materia ORDER BY Materia";
						$results3 = mysqli_query($conexao,$sql3);
						while ( $row = mysqli_fetch_array($results3) ) {
							echo "<option value='".$row[0]."'>".$row[0]."</option>";
						}
					    ?>
              </select><br /><br /><br />
        
        <input type="submit" class="button" name="cadastrar" value="Exclui"  />
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
