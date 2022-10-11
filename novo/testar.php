<?php
session_start();
//header('Content-type: text/html; charset=UTF-8');
date_default_timezone_set('America/Sao_Paulo');
include "conexao.php";
	
	if (empty($_POST['senha']) || empty($_POST['login']))
        {
		echo "<script>alert(\"Preencha corretamente!\");history.back(-1);</script>";
		exit;
	}
	$senha = $_POST['senha'];
    $login = $_POST['login'];
	
	$confu1 = "L2xB3Sbia";
	$confu2 = "Dawi748v2";
	$senha1 = $senha;
	$senha1 = $confu1.$senha1.$confu2;
	$senha1 = hash( 'SHA256',$senha1);
  	$nova = $senha1;
	
	
		   if (mysql_errno())
        {
	      echo "ERRO : " . mysql_errno() . "</body></html>";
	      exit;
	     }
	
	$sql = "SELECT * FROM usuns WHERE senha = '$nova' and login = '$login'";
	$tabela = mysqli_query($conn,$sql) or die(mysql_error());
	$registro = mysqli_num_rows($tabela);
	
	if ($registro == 0)
        {
	 header('Location: index.php?errologin=1');
         exit;
	}
        else
        {
	$reg = mysqli_fetch_array($tabela, MYSQLI_ASSOC);
	$_SESSION[id] = $reg[id];
	$_SESSION[nome] = $reg[nome];
	header('Location: index1.php');
	}
?>