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
    
   ?>
      <form action="DependenciaOK.php" method="post" enctype="multipart/form-data" name="cadastro" >
	<fieldset id="forms">
		<legend>Cadastra Depend&ecirc;ncia do Aluno do 7&#186; ANO</legend><br /><br />
        
            
        
        <label for="Nome">Nome:</label>
  <select name="Nome" id="Nome" class="textbox" onChange="ajaxGet('processConsultaGeral.php?Nome='+this.value, document.getElementById('NascEx'), true)" d>
           <option value="" >Selecione</option>
        				 <?php
						include ("conexao.php");
						$ano = $_SESSION["AnoLetivo"];
			            //Busco os estados
						$sql3 = "SELECT a.Nome FROM aluno a, histMatr h WHERE a.Nome = h.Nome && a.Status = 'Ativo' && h.Turma = '7 Ano' && h.Ano = '$ano' ORDER BY h.Chamada";
						$results3 = mysqli_query($conexao,$sql3);
						while ( $row = mysqli_fetch_array($results3) ) {
							echo "<option value='".$row[0]."'>".$row[0]."</option>";
						}
		 ?>
              </select>
		<br /><br /><br />
            <!-- Campo que irá receber a consulta enviada-->
          <label for=""></label><label for="Nome">Data de Nascimento:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><input name="NascEx" id="NascEx"  class="textbox2" size="50" readonly align="middle"></label><br /><br /><br />
          
                    
            <label for="Mat1">Mat&eacute;ria 1:</label>
  <select name="Mat1" id="Mat1" class="textbox3" >
           <option value="" >-</option>
        				<?php
			            //Busco os estados
						$sql3 = "SELECT Materia FROM materia_depend ORDER BY id";
						$results3 = mysqli_query($conexao,$sql3);
						while ( $row = mysqli_fetch_array($results3) ) {
							echo "<option value='".$row[0]."'>".$row[0]."</option>";
						}
					    ?>
              </select>
               <label for="AnoDep1">Ano da Mast&eacute;ria 1:</label>
 			 <select name="AnoDep1" id="AnoDep1" class="textbox2">
             	 <option value="" >Selecione</option>
                 <option value="6 Ano" >6&#186; Ano</option>
                 <option value="7 Ano" >7&#186; Ano</option>
                 <option value="8 Ano" >8&#186; Ano</option>
			 </select>
		<br /><br /><br />
              <br /><br /><br />
              <label for="Mat2">Mat&eacute;ria 2:</label>
  <select name="Mat2" id="Mat2" class="textbox3" >
           <option value="" >-</option>
        				<?php
			            //Busco os estados
						$sql3 = "SELECT Materia FROM materia_depend ORDER BY id";
						$results3 = mysqli_query($conexao,$sql3);
						while ( $row = mysqli_fetch_array($results3) ) {
							echo "<option value='".$row[0]."'>".$row[0]."</option>";
						}
					    ?>
              </select>
              <label for="AnoDep2">Ano da Mast&eacute;ria 2:</label>
 			 <select name="AnoDep2" id="AnoDep2" class="textbox2">
             	 <option value="" >Selecione</option>
                 <option value="6 Ano" >6&#186; Ano</option>
                 <option value="7 Ano" >7&#186; Ano</option>
                 <option value="8 Ano" >8&#186; Ano</option>
			 </select>
                 <br /><br /><br />
                 
           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;      
		<input  id="enviar" type='submit' class='button' name='cadastrar' value='LANÇA'>
		
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
