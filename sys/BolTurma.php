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
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1"> <!--iso-8859-1 -->
<title></title>
<link href="style.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="include/micoxAjax.js"></script>
<script language="javascript">
function combos(valor,fml)
{
	var V = valor;
 if	(V == '1 Ano' || V == '2 Ano' || V == '3 Ano' || V == '4 Ano' || V == '5 Ano'){
    fml.Materia1a5.style.visibility="visible";
	document.getElementById("Materia1a5").value = "Selecione";
    fml.Materia6a8.style.visibility="hidden";
	fml.Materia9.style.visibility="hidden";
   }
 if	(V == '6 Ano' || V == '7 Ano' || V == '8 Ano'){
     fml.Materia1a5.style.visibility="hidden";
     fml.Materia6a8.style.visibility="visible";
	 document.getElementById("Materia6a8").value = "Selecione";
	 fml.Materia9.style.visibility="hidden";
 }
 if	(V == '9 Ano'){   
    fml.Materia1a5.style.visibility="hidden";
    fml.Materia6a8.style.visibility="hidden";
	fml.Materia9.style.visibility="visible";
	document.getElementById("Materia9").value = "Selecione";
    
 }
}

</script>
<style type="text/css">
<!--
.style1 {
	font-size: 36px
}
.invisivel { display: none; }
.visivel { visibility: visible; }
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
	$results15 = mysqli_query($conexao,$sql5);
   ?>
      <form action="Bol1anob.php" method="post" enctype="multipart/form-data" name="cadastro"  target="_blank">
	<fieldset id="forms">
		<legend>Imprime Notas Por Turma e Mat&eacute;ria</legend><br /><br />
        
          
        <label for="Turma">Turma:</label>
        <select name="Turma" id="Turma" class="textbox2" onChange="combos(this.value,this.form)" >
           <option value="" >Selecione</option>
           <option value="1 Ano" >1&ordm; Ano</option>
           <option value="2 Ano" >2&ordm; Ano</option>
           <option value="3 Ano" >3&ordm; Ano</option>
           <option value="4 Ano" >4&ordm; Ano</option>
           <option value="5 Ano" >5&ordm; Ano</option>
           <option value="6 Ano" >6&ordm; Ano</option>
           <option value="7 Ano" >7&ordm; Ano</option>
           <option value="8 Ano" >8&ordm; Ano</option>
           <option value="9 Ano" >9&ordm; Ano</option> 
        </select>   
        				 <?php /*
						include ("conexao.php");
						$ano = date('Y');
			            //Busco os estados
						$sql3 = "SELECT Ano FROM turmas";
						$results3 = mysql_query($sql3);
						while ( $row = mysql_fetch_array($results3) ) {
							echo "<option value='".$row[0]."'>".$row[0]."</option>"; 
						} */
		 ?>
              </select>
		<br /><br /><br />
        
        <label for="Materia1a5">Materia 1&ordm;-5&ordm; Ano:</label>
        <select name="Materia1a5" id="Materia1a5" class="textbox" style="visibility:hidden" >
           <option value="" >Selecione</option>
        				 <?php
						include ("conexao.php");
						$ano = $_SESSION["AnoLetivo"];
			            //Busco os estados
						$sql3 = "SELECT Materia FROM materia_pri_qui";
						$results3 = mysqli_query($conexao,$sql3);
						while ( $row = mysqli_fetch_array($results3) ) {
							echo "<option value='".$row[0]."'>".$row[0]."</option>";
						}
		 ?>
              </select>
        <br /><br /><br />
          <label for="Materia6a8">Materia 6&ordm;-8&ordm; Ano:</label>
        <select name="Materia6a8" id="Materia6a8" class="textbox" style="visibility:hidden" >
           <option value="" >Selecione</option>
        				 <?php
						include ("conexao.php");
						$ano = $_SESSION["AnoLetivo"];
			            //Busco os estados
						$sql3 = "SELECT Materia FROM materia_sex_iot";
						$results3 = mysqli_query($conexao,$sql3);
						while ( $row = mysqli_fetch_array($results3) ) {
							echo "<option value='".$row[0]."'>".$row[0]."</option>";
						}
		 ?>
              </select>
           <br /><br /><br />  
           
           <label for="Materia9">Materia 9&ordm; Ano:</label>
        <select name="Materia9" id="Materia9" class="textbox" style="visibility:hidden" >
           <option value="" >Selecione</option>
        				 <?php
						include ("conexao.php");
						$ano = $_SESSION["AnoLetivo"];
			            //Busco os estados
						$sql3 = "SELECT Materia FROM materia_nono";
						$results3 = mysqli_query($conexao,$sql3);
						while ( $row = mysqli_fetch_array($results3) ) {
							echo "<option value='".$row[0]."'>".$row[0]."</option>";
						}
		 ?>
              </select>
           
           <br /><br /><br />
           
               
		<input  id="enviar" type='submit' class='button' name='cadastrar' value='IMPRIME'>
		
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
