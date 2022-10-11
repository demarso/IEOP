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
      <form action="AlteraProfessor1.php" method="post" enctype="multipart/form-data" name="cadastro" >
	<fieldset id="forms">
		<legend>Busca Professor para Altera&ccedil;&atilde;o</legend><br /><br />
  <label for="Nome">Nome:</label><select name="Nome" id="Nome" class="textbox3" >
           <option value="">Selecione</option>
        				<?php
			            //Busco os estados
						require_once("conexao.php");
						$sql3 = "SELECT Nome FROM professor WHERE Status = 'Ativo' ORDER BY Nome";
						$results3 = mysqli_query($conexao, $sql3);
						while ( $row = mysqli_fetch_array($results3) ) {
							echo "<option value='".$row[0]."'>".$row[0]."</option>";
						}
					    ?>
              </select>
		<br /><br /><br />
            <!-- Campo que irá receber a consulta enviada-->
          <br />
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
