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
<div id="topo"><? include("head.php"); ?></div>
 <div id="menubox">
  <? include("menu.html"); ?> 
 </div>
<div id="main">

   <div id="palco2"><br /><br />
   <?
    require_once("conexao.php");
    $sql5 = "DELETE FROM selecao";
	$results15 = mysqli_query($conexao, $sql5);
   ?>
      <form action="ConsNotas1.php" method="post" enctype="multipart/form-data" name="cadastro" >
	<fieldset id="forms">
		<legend>Consultar Notas do Aluno do 1� ANO</legend><br /><br />
        
     <!--   
        <label for="Turma">Turma:</label><select name="Turma" id="Turma" class="textbox2" onChange="ajaxGetInfo(this.value)" >
           <option value="">Selecione</option>
        				<?php
			            //Busco os estados
						$sql3 = "SELECT id, Ano FROM turmas ORDER BY id";
						$results3 = mysql_query($sql3);
						while ( $row = mysql_fetch_array($results3) ) {
							echo "<option value='".$row[1]."'>".$row[1]."</option>";
						}
					    ?>
              </select>
		<br /><br /><br />
        
  <label for="Matr�cula">Nome:</label>
  <select name="Nome" id="Nome" class="textbox" onChange="ajaxGet('processConsultaGeral.php?Nome='+this.value, document.getElementById('NascEx'), true)" d>
           <option value="" >Selecione</option>
        				<?php
			            //Busco os estados
						$sql3 = "SELECT Nome FROM selecao ORDER BY Nome";
						$results3 = mysql_query($sql3);
						while ( $row = mysql_fetch_array($results3) ) {
							echo "<option value='".$row[0]."'>".$row[0]."</option>";
						}
					    ?>
              </select>
		<br /><br /><br /> -->
        
       
        <label for="Nome">Nome:</label>
  <select name="Nome" id="Nome" class="textbox" onChange="ajaxGet('processConsultaGeral.php?Nome='+this.value, document.getElementById('NascEx'), true)" d>
           <option value="" >Selecione</option>
        				 <?php
						include ("conexao.php");
						$ano = $_SESSION["AnoLetivo"];
			            //Busco os estados
						$sql3 = "SELECT a.Nome FROM aluno a, histMatr h WHERE a.Nome = h.Nome && a.Status = 'Ativo' && h.Turma = '1 Ano' && h.Ano = '$ano' ORDER BY h.Chamada";
						$results3 = mysqli_query($conexao, $sql3);
						while ( $row = mysqli_fetch_array($results3) ) {
							echo "<option value='".$row[0]."'>".$row[0]."</option>";
						}
		 ?>
              </select>
		<br /><br /><br />
            <!-- Campo que ir� receber a consulta enviada-->
          <label for=""></label><label for="Nome">Data de Nascimento:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><input name="NascEx" id="NascEx"  class="textbox2" size="50" readonly align="middle"></label><br /><br /><br /><br /><br />
          <!--<select class="textbox"  id="NomeEx" name="NomeA">
              <option value=""></option>
            </select>-->
            
                 
		<input  id="enviar" type='submit' class='button' name='cadastrar' value='LAN�A'>
		
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
