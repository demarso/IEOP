<?php
session_start();
require("include/arruma_link.php");
if (! isset($_SESSION['id'])){
header("Location: index.php?erro=1");
exit;
}
if($_SESSION[AnoLetivo] <> date('Y')){
   echo "<script>alert('O ano Letivo n�o � o ano atual!'); history.back(-1); </script>";}
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
      <form action="RematriculaAluno1.php" method="post" enctype="multipart/form-data" name="cadastro" >
	<fieldset>
		<legend>Consulta de Aluno <font color="blue">Ativo</font> para Rematricular</legend><br /><br />
  <label for="Matr�cula">Nome:</label><select name="Nome" id="Nome" class="textbox"  onChange="ajaxGet('processConsultaGeral2.php?Nome='+this.value, document.getElementById('NascEx'), true)">
           <option value="">Selecione</option>
        				<?php
			            //Busco os estados
						require_once("conexao.php");
						$ano = $_SESSION["AnoLetivo"];
						$sql3 = "SELECT Nome FROM aluno WHERE Status = 'Ativo' ORDER BY Nome";
						$results3 = mysqli_query($conexao,$sql3);
						while ( $row = mysqli_fetch_array($results3) ) {
							echo "<option value='".$row[0]."'>".$row[0]."</option>";
						}
					    ?>
              </select>
		<br />
            <!-- Campo que ir� receber a consulta enviada-->
          <label for=""></label><label for="Nome">Data de Nascimento:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><input name="NascEx" id="NascEx"  class="textbox2" size="50" readonly align="middle"></label><br /><br /><br /><br /><br />
          <!--<select class="textbox"  id="NomeEx" name="NomeA">
              <option value=""></option>
            </select>-->
               
	</fieldset>
    <br /><br />
    <fieldset>
		<legend>Consulta de Aluno <font color="red">Inativo</font> para Reativar e Matricular</legend><br /><br />
  <label for="Matr�cula2">Nome:</label><select name="Nome2" id="Nome2" class="textbox"  onChange="ajaxGet('processConsultaGeral2.php?Nome='+this.value, document.getElementById('NascEx2'), true)">
           <option value="">Selecione</option>
        				<?php
			            //Busco os estados
						require_once("conexao.php");
						$sql3 = "SELECT Nome FROM aluno WHERE Status = 'Inativo' ORDER BY Nome";
						$results3 = mysqli_query($conexao,$sql3);
						while ( $row = mysqli_fetch_array($results3) ) {
							echo "<option value='".$row[0]."'>".$row[0]."</option>";
						}
					    ?>
              </select>
		<br /><br />
            <!-- Campo que ir� receber a consulta enviada-->
          <label for=""></label><label for="Nome2">Data de Nascimento:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><input name="NascEx2" id="NascEx2"  class="textbox2" size="50" readonly align="middle"></label><br /><br /><br /><br /><br />
          <!--<select class="textbox"  id="NomeEx" name="NomeA">
              <option value=""></option>
            </select>-->
        
		
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
