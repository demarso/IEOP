<!DOCTYPE html>
<html lang="pt-br">
<head>
<title>IEOP</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
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
<?
  include("head.php"); 
?> 
</div>
 <div id="menubox">
  
 </div>
 
<div id="main">

   <div id="cal">
      <cente>
        <form action="testar.php" method="post" name="formulario">
          <center>
 <?php 
 if (isset($_GET['errologin'])){
  echo "\n";
  echo "<font color='#FF0000'>"."** Senha inv&aacute;lida! **"."</font>";
  echo "\n";
  }
 if (isset($_GET['erro'])){
  echo "\n";
  echo "<font color='#FF0000'>"."** Favor logar primeiro! **"."</font>";
  echo "\n";
  } 
  
/*aqui cria um log de acesso.		
$arquivo = "./dataatualizada/log.doc";
$linha1 = "\n[".date("d/m/Y - H:i:s")."]  ";
$linha2 = $_SERVER['REMOTE_ADDR']." ";
$linha3 = $_SERVER['PHP_SELF']."  ";
$linha4 = $_SESSION['nome']."\n";
$texto  = $linha1.$linha2.$linha3.$linha4;
$abrindo = fopen($arquivo, 'a+');
fwrite($abrindo, $texto);
fclose($abrindo);*/
?>
           
          </center>
            <div>
              <label for="username">Login:</label>
              <input type="text" name="login" value="" id="login" />
            </div>
           
            <div>
              <label for="password">Senha:</label>
              <input type="password" name="senha" value="" id="senha" />
            </div>
            
          <div id="login-button">
        <input type="image" src="img/btn_login.gif" name="l" value="h" id="l" />
          </div>
      </form>
      
     </div>
     
  </div>
<div id='footer'>
<p class="links">&copy; Copyright&nbsp;2011-<? echo date('Y'); ?> - Todos os direitos reservados&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sistema Desenvolvido por:&nbsp;&nbsp;<a href="http://www.idbras.com.br" target="_blank">IDBRAS</a> 
</div>
</div>
</center>
</body>
</html>
