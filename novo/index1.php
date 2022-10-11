<?php
session_start();
if (!isset($_SESSION['id'])){
header("Location: index.php?erro=1");
exit;
}
date_default_timezone_set('America/Sao_Paulo');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta http-equiv="Content-type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>30 Semanas - IBRN</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css?version=12">
  <link rel="stylesheet" href="css/navbar.css">
  <script>
      (function($){
      $('.dropdown-menu a.dropdown-toggle').on('click', function(e) {
        if (!$(this).next().hasClass('show')) {
        $(this).parents('.dropdown-menu').first().find('.show').removeClass("show");
        }
        var $subMenu = $(this).next(".dropdown-menu");
        $subMenu.toggleClass('show');

        $(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function(e) {
        $('.dropdown-submenu .show').removeClass("show");
        });

        return false;
      });
    })(jQuery)
</script>
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
 <? include("menu.php"); ?>
 </div>
<?php
  include "conexao.php";
  $mes = date('m');
  $dia = date('d');
  $ano1 = date('Y');
  $ano = $_SESSION["AnoLetivo"];
    
		/*$resultado = mysql_query("SELECT MAX(id) FROM aluno");
		while ($linha = mysql_fetch_array($resultado)) {
		$idMat1 = $linha["MAX(id)"];
		}
		$resultado2 = mysql_query("SELECT Matricula FROM aluno WHERE id = '$idMat1'");
		while ($linha1 = mysql_fetch_array($resultado2)) {
		$_SESSION[idMat] = $linha1["Matricula"];
		}*/
	 
 ?>
<div id="main">
    <div id="conteudoEsqTr">
      <br />
      <a href="AlteraSenha.php">Alterar Senha</a> <br /><br />
     
 	</div>
 
</div>    
	<div id='footer'>
	 <? include("footer.php"); ?>
	</div>
</div>
</center>
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/navbar.js"></script>
    <script language="javascript" src="js/micoxAjax.js"></script>
</body>
</html>