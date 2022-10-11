<?php
session_start();
require("include/arruma_link.php");
if (! isset($_SESSION['id'])){
header("Location: index.php?erro=1");
exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8" />
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
   <?
    require_once("conexao.php");
    $sql5 = "DELETE FROM selecao";
	$results15 = mysqli_query($conexao, $sql5);
   ?>
      <form action="AlteraNotas1.php" method="post" enctype="multipart/form-data" name="cadastro" >
	<fieldset id="forms">
		<legend>Altera Notas do Aluno</legend><br /><br />
        
     <!--   
        <label for="Turma">Turma:</label><select name="Turma" id="Turma" class="textbox2" onChange="ajaxGetInfo(this.value)" >
           <option value="">Selecione</option>
        				<?php
			            //Busco os estados
						$sql3 = "SELECT id, Ano FROM turmas ORDER BY id";
						$results3 = mysqli_query($conexao, $sql3);
						while ( $row = mysqli_fetch_array($results3) ) {
							echo "<option value='".$row[1]."'>".$row[1]."</option>";
						}
					    ?>
              </select>
		<br /><br /><br />
        
  <label for="Matrícula">Nome:</label>
  <select name="Nome" id="Nome" class="textbox" onChange="ajaxGet('processConsultaGeral.php?Nome='+this.value, document.getElementById('NascEx'), true)" d>
           <option value="" >Selecione</option>
        				<?php
			            //Busco os estados
						$sql3 = "SELECT Nome FROM selecao ORDER BY Nome";
						$results3 = mysqli_query($conexao, $sql3);
						while ( $row = mysqli_fetch_array($results3) ) {
							echo "<option value='".$row[0]."'>".$row[0]."</option>";
						}
					    ?>
              </select>
		<br /><br /><br /> -->
        
         <label for="Materia">Materia:</label>
 			 <select name="Materia" id="Materia" class="textbox3">
             	 <option value="" >Selecione</option>
                 <option value="Português">Portugu&ecirc;s</option>
                 <option value="Matemática">Matem&aacute;tica</option>
                 <option value="História">Hist&oacute;ria</option>
                 <option value="Geografia">Geografia</option>
                 <option value="Ciências">Ci&ecirc;ncias</option>
                 <option value="Artes">Artes</option>
                 <option value="Ensino Religioso">Ensino Religioso</option>
                 <option value="Leitura">Leitura</option>
                 <option value="Educação Física">Educa&ccedil;&atilde;o F&iacute;sica</option>
                 <option value="Inglês">Ingl&ecirc;s</option>
                 <option value="Álgebra">&Aacute;lgebra</option>
                 <option value="Geometria">Geometria</option>
                 <option value="Espanhol">Espanhol</option>
                 <option value="Física">F&iacute;sica</option>
                 <option value="Química">Qu&iacute;mica</option>
                 <option value="Comportamento">Comportamento</option>
                 <option value="Faltas">Faltas</option>
                 </option>
             </select>
		<br /><br /><br />
        <label for="Bimestre">Bimestre:</label>
 			 <select name="Bimestre" id="Bimestre" class="textbox3">
             	 <option value="" >Selecione</option>
                 <option value="Primeiro Bimestre" >Primeiro Bimestre</option>
                 <option value="Segundo Bimestre" >Segundo Bimestre</option>
                 <option value="Terceiro Bimestre" >Terceiro Bimestre</option>
                 <option value="Quarto Bimestre" >Quarto Bimestre</option>
             </select>
		<br /><br /><br />
        <label for="Nome">Nome:</label>
  <select name="Nome" id="Nome" class="textbox" onChange="ajaxGet('processConsultaGeral.php?Nome='+this.value, document.getElementById('NascEx'), true)" d>
           <option value="" >Selecione</option>
        				<?php
			            //Busco os estados
						$sql3 = "SELECT Nome FROM aluno WHERE Status = 'Ativo' && Segmento <> 0 ORDER BY Nome";
						$results3 = mysqli_query($conexao, $sql3);
						while ( $row = mysqli_fetch_array($results3) ) {
							echo "<option value='".$row[0]."'>".$row[0]."</option>";
						}
					    ?>
              </select>
		<br /><br /><br />
            <!-- Campo que irá receber a consulta enviada-->
          <label for=""></label><label for="Nome">Data de Nascimento:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><input name="NascEx" id="NascEx"  class="textbox2" size="50" readonly align="middle"></label><br /><br /><br /><br /><br />
          <!--<select class="textbox"  id="NomeEx" name="NomeA">
              <option value=""></option>
            </select>-->
            
                 
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
