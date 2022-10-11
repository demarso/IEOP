<?php
session_start();
require("include/arruma_link.php");
if (! isset($_SESSION['id'])){
header("Location: index.php?erro=1");
exit;
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
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
    	<legend align="center">Imprime Boletim - Selecione a Turma do Aluno</legend>
    <br />
    <center>
    <table align="center" width="80%" border="1" >
		<tr align="center" bgcolor="#CCCCCC">
        	<td><a href="Boletim1ano.php"><font color="#333333"><img src="img/1ano.png" width="70" height="30" /></font></a></td>
        
        	<td><a href="Boletim2ano.php"><font color="#333333"><img src="img/2ano.png" width="70" height="30" /></font></a></td>
                
        	<td><a href="Boletim3ano.php"><font color="#333333"><img src="img/3ano.png" width="70" height="30" /></font></a></td>
        </tr>
        <tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
        <tr align="center" bgcolor="#CCCCCC">
        	<td><a href="Boletim4ano.php"><font color="#333333"><img src="img/4ano.png" width="70" height="30" /></font></a></td>
        
        	<td><a href="Boletim5ano.php"><font color="#333333"><img src="img/5ano.png" width="70" height="30" /></font></a></td>
       
        	<td><a href="Boletim6ano.php"><font color="#333333"><img src="img/6ano.png" width="70" height="30" /></font></a></td>
        </tr>
         <tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
        <tr align="center" bgcolor="#CCCCCC">
        	<td><a href="Boletim7ano.php"><font color="#333333"><img src="img/7ano.png" width="70" height="30" /></font></a></td>
        
        	<td><a href="Boletim8ano.php"><font color="#333333"><img src="img/8ano.png" width="70" height="30" /></font></a></td>
       
        	<td><a href="Boletim9ano.php"><font color="#333333"><img src="img/9ano.png" width="70" height="30" /></font></a></td>
        </tr>
     </table></center><br />
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
