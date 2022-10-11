<?
 session_start();
 $_SESSION[AnoLetivo] = date('Y');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta http-equiv="Content-type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>IEOP Bootstrap</title>
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

</head>

<body background="Fundo.png">
 <div id="interface">
  <?php
    include("head.php"); 
  ?>
  <div class="container" id="home">
    <br /><br /><br />
    <div id="login" class="rounded-sm  h-30 justify-content-center align-items-center" >
      <form action="testar.php" method="post" name="formulario">
    <font class="font3">
    <?php
     if (isset($_GET['errologin'])){
      echo "\n";
      echo "<font size='3' color='#FFFF00'><b>&nbsp;&nbsp&nbsp&nbsp*** Senha inválida! ***</b></font>";
      echo "\n";
      }
     if (isset($_GET['erro'])){
      echo "\n";
      echo "<font size='3' color='#FF0000'><b>*** Coloque o Login e senha válidos primeiro! ***</b></font>";
      echo "\n";
      } 
    ?>
    </font>
    <table>
    <tr>
     <td><font size="8">Login:</font></td>
    </tr>
    <tr>
     <td><input type="text" name="login" size="30" align="left" maxlength=18 ></td>
    </tr>
     <tr><td>&nbsp;</td></tr>
     <tr>
       <td><font size="8">Senha:</font></td>
     </tr>
     <tr>
       <td><input type="password" name="senha" size="30" class="formulario"></td>
     </tr>
     <tr><td>&nbsp;</td></tr>
     <tr>
      <td><input type="submit" value="LOGAR" class="formulario"></td>
     </tr>
    </table>
    </form>
  </div>
  </div>
</div>
  <div id='footer'>
  <p class="links">&copy; Copyright&nbsp;2011-<? echo date('Y'); ?> - Todos os direitos reservados&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sistema Desenvolvido por:&nbsp;&nbsp;<a href="http://www.idbras.com.br" target="_blank">IDBRAS</a> 
  </div>

</center>
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/navbar.js"></script>
</body>
</html>
