<?php
  include "conexao.php";

  if(isset($_POST[OK])){

 
    $email = $_POST['email'];
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
     $erro[] = "E-mail inválido"; 
   }
   if(filter_var($email, FILTER_VALIDATE_EMAIL)){
   $sql = "SELECT IDUsuario FROM usuario WHERE email = '$email'";
   $tabela = mysqli_query($conn,$sql) or die(mysql_error());
   $registro = mysqli_num_rows($tabela);
   if ($registro == 0){
    $erro[] = "E-mail informado não existe no banco de dados!";
  }
 } 

  if(count($erro) == 0){

    $novasenha = substr(md5(time()),0,8);
    $confu1 = "L2xB3Sbia";
    $confu2 = "Dawi748v2";
    $senha1 = $novasenha;
    $senha1 = $confu1.$senha1.$confu2;
    $senha1 = hash( 'SHA256',$senha1);

    if(!mail($email, "Sua nova Senha", "Sua nova Senha é: ".$novasenha))
       echo "e-mail não enviado";
    else
    $query = mysqli_query($conn, $sql = "UPDATE usuario SET senha = '$senha1' WHERE email = '$email'") or die(mysql_error());
  

    echo "<script>alert(\"Senha alterada e e-mail enviado com Sucesso!\");</script>";
    echo "<script>window.close();</script>";
  } 
}
            
?>
<!DOCTYPE html>
<html lang="pr-br">

  <head>
    <title>IEOP</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=DM+Sans:300,400,700|Indie+Flower" rel="stylesheet">
    

    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="css/aos.css">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="css/style.css">

  </head>

  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

     <div class="site-wrap" id="home-section">

      <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
          <div class="site-mobile-menu-close mt-3">
            <span class="icon-close2 js-menu-toggle"></span>
          </div>
        </div>
        <div class="site-mobile-menu-body"></div>
      </div>



      <header class="site-navbar site-navbar-target" role="banner">

        <div class="container mb-3">
          <div class="d-flex align-items-center">
            <div class="site-logo mr-auto">
              <a href="index.php"><img src="images/logo_ieop.png" width="100px"><span class="text-primary"></span></a>
              
            </div>
            <div class="site-quick-contact d-none d-lg-flex ml-auto ">
              <div class="d-flex site-info align-items-center mr-5">
                <span class="block-icon mr-3"><span class="icon-map-marker text-yellow"></span></span>
                <span>R. Dona Castorina, 93 - Viga, Nova Iguaçu - RJ, 26012-340, <br> Rio de Janeiro</span>
              </div>
              <div class="d-flex site-info align-items-center">
                <span class="block-icon mr-3"><span class="icon-clock-o"></span></span>
                <span>Segunda a Sexta 7:00h - 17:00h <br> Sábados e Domingos Fechado</span>
              </div>
              
            </div>
          </div>
        </div>

  </header>
<div class="ftco-blocks-cover-1">
   <div class="site-section-cover overlay">
  <div class="container" align="text-center">
    <div class="row align-items-center ">

      <div class="col-md-12 mt-2">
        <?php
            if(count($erro) > 0 ){
              foreach ($erro as $msg) {
                echo "<p>$msg</p>";
              }
            }
          ?>
        <br /><br /><h2>Informe seu email para receber a nova senha.</h2><br /><br />
        <div id="novasenha" class="row text-center">

          <form method="POST" action="" name="form">
            <input type="text" name="email" value="<? echo $POST['email']; ?>" placeholder="Seu e-mail">
            <input type="submit" name="OK" value="OK"> 
          </form>

        </div>
      
      </div>
    </div>    
  </div>
  </div>
</div>    

    <footer class="site-footer">
      <div class="container">
        <div class="row text-center">
          <div class="col-md-12">
            <p>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
          </div>
        </div>
      </div>
    </footer>

    </div>

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/jquery-migrate-3.0.0.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.animateNumber.min.js"></script>
    <script src="js/jquery.fancybox.min.js"></script>
    <script src="js/jquery.stellar.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/bootstrap-datepicker.min.js"></script>
    <script src="js/aos.js"></script>

    <script src="js/main.js"></script>

  </body>

</html>

