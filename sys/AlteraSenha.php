<?php
include "valida.php";
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
      <cente>
        <form action="AlteraSenha1.php" method="post" >
          
          <div align="center">
          <font size="+2" color="#0033FF">Altera&ccedil;&atilde;o de Senha</font><br /><br />
          </div>
            <div>
              <label for="password">Senha Antiga:</label>
              <input type="password" name="Senha0" value="" id="Senha0" />
            </div><br /><br />
            <div>
              <label for="password">Senha Nova:</label>
              <input type="password" name="Senha1" value="" id="Senha1" />
            </div><br /><br />
           
            <div>
              <label for="password">Confirma Senha Nova:</label>
              <input type="password" name="Senha2" value="" id="Senha2" />
            </div>
            <br /><br />
          <div id="login-button">
        <input type="submit"  value="ALTERA"  />
          </div>
      </form>
      
     </div>
    
  </div>
<div id='footer'>
</div>
</div>
</center>
</body>
</html>
