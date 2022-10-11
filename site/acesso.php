<html lang="pt-br">

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
  <?php $ano = date("Y"); ?>
    
    <div class="container-fluid" id="home">
   <center><h1>Acessos IEOP SYS em <? echo $ano; ?></h1></center>
     <div class="table-responsive">
      <table class="table table-sm mt-0 mb-0" id="tabela">
         <thead>
            <tr align="center" bgcolor="#CCCCCC">
              <th align="center" style="width: 10%"><font color="#333333" size="2"><b>Contador</b></font></th>
              <th align="center" style="width: 30%"><font color="#333333" size="2"><b>Usuário</b></font></th>
              <th align="center" style="width: 30%"><font color="#333333" size="2"><b>IP</b></font></th>
              <th align="center" style="width: 30%"><font color="#333333" size="2"><b>Data/Hora</b></font></th>
            </tr>
          <tr align="center" bgcolor="#CCCCCC">
            <th align="center" style="width: 10%"></th>
            <th align="center" style="width: 30%"><input type="text" id="txtColuna1" size="20%"/></th>
            <th align="center" style="width: 30%"><input type="text" id="txtColuna2" size="20%"/></th>
            <th align="center" style="width: 30%"><input type="text" id="txtColuna2" size="20%"/></th>
            
          </tr>
          </thead>
       </table>
    <?php

      include "conexao.php";
      
      $today = date("d/m/Y");
      $todayI = date("Y/m/d");
      $con = 1;

      $sq = "SELECT * FROM acesso WHERE year(data)='$ano' ORDER BY data desc";
            $resultado1 = mysqli_query($conexao,$sq) or die (mysql_error());
            while ($linha1 = mysqli_fetch_array($resultado1))
            { 
              $usu = $linha1['usu'];
              $addr = $linha1['addr'];
              $data = $linha1['data'];
        
        if ($con % 2 == 0)
           $bgcolor = "bgcolor='#FFFFFF'";
        else
           $bgcolor = "bgcolor='#FFFFCC'"; 
  
    ?>
<center>

<table class="table table-sm mt-0 mb-0" id="tabela">
<tr align="center" <? echo $bgcolor; ?>>
<td align="center" style="width: 10%"><font color="#333333" size="2"><? echo $con; ?></font></td>
<td align="center" style="width: 20%"><font color="#333333" size="2"><? echo $usu; ?></font></td>
<td align="center" style="width: 20%"><font color="#333333" size="2"><? echo $addr; ?></font></td>
<td align="center" style="width: 20%"><font color="#333333" size="2"><? echo $data; ?></font></td>
</tr>
</table>

</center>

<?
  $con = $con + 1;
  }
  $con = $con - 1;
?>
   

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
    <script src="js/navbar.js"></script>
    <script src="js/script.js"></script>
    <script src="js/main.js"></script>

  </body>

</html>

