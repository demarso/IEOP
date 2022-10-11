<?php
session_start();
require("include/arruma_link.php");
if (! isset($_SESSION['id'])){
header("Location: index.php?erro=1");
exit;
}
/*if($_SESSION[AnoLetivo] <> date('Y')){
   echo "<script>alert('O ano Letivo não é o ano atual!'); history.back(-1); </script>";}*/

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
  	<br />
    <fieldset>
    	<legend>Lan&ccedil;a N&ordm; da Chamada - Selecione a Turma do Aluno</legend>
    <br />
    <table align="center" width="80%" border="1" >
		<tr align="center" bgcolor="#CCCCCC"><td></td><td><a href="ChamadaMaternal.php"><font color="#333333"><img src="img/Maternal.png" width="87" height="30" /></font></a></td><td></td></tr>
        <tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
        <tr align="center" bgcolor="#CCCCCC">
        	<td><a href="Chamada1Per.php"><font color="#333333"><img src="img/1periodo.png" width="90" height="30" /></font></a></td>
        
        	<td><a href="Chamada2Per.php"><font color="#333333"><img src="img/2periodo.png" width="90" height="30" /></font></a></td>
                
        	<td><a href="Chamada3Per.php"><font color="#333333"><img src="img/3periodo.png" width="90" height="30" /></font></a></td>
        </tr>
        <tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
        <tr align="center" bgcolor="#CCCCCC">
        	<td><a href="Chamada1Ano.php"><font color="#333333"><img src="img/1ano.png" width="70" height="30" /></font></a></td>
        
        	<td><a href="Chamada2Ano.php"><font color="#333333"><img src="img/2ano.png" width="70" height="30" /></font></a></td>
                
        	<td><a href="Chamada3Ano.php"><font color="#333333"><img src="img/3ano.png" width="70" height="30" /></font></a></td>
        </tr>
        <tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
        <tr align="center" bgcolor="#CCCCCC">
        	<td><a href="Chamada4Ano.php"><font color="#333333"><img src="img/4ano.png" width="70" height="30" /></font></a></td>
        
        	<td><a href="Chamada5Ano.php"><font color="#333333"><img src="img/5ano.png" width="70" height="30" /></font></a></td>
       
        	<td><a href="Chamada6Ano.php"><font color="#333333"><img src="img/6ano.png" width="70" height="30" /></font></a></td>
        </tr>
         <tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
        <tr align="center" bgcolor="#CCCCCC">
        	<td><a href="Chamada7Ano.php"><font color="#333333"><img src="img/7ano.png" width="70" height="30" /></font></a></td>
        
        	<td><a href="Chamada8Ano.php"><font color="#333333"><img src="img/8ano.png" width="70" height="30" /></font></a></td>
       
        	<td><a href="Chamada9Ano.php"><font color="#333333"><img src="img/9ano.png" width="70" height="30" /></font></a></td>
        </tr>
     </table><br />
    </fieldset>     
   </div> 
   
    
</div>  
<div id='footer'>
<? include("footer.php"); ?>
</div>
</div>
</center>
</body>
</html>
