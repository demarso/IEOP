<?php
			$phpself = $_SERVER['PHP_SELF'];
			$url = explode("/", $phpself);
			$link = sizeof($url);
			$pontos = "";
			if ($link == 2){
				$pontos = ".";
			}
			if ($link == 4){
				$pontos = "../..";
			}
			if ($link == 5){
				$pontos = "../../..";
			}
			if ($link == 6){
				$pontos = "../../../..";
			}
			if ($link == 7){
				$pontos = "../../../../..";
			}
						
//aqui cria um log de acesso.		
$arquivo = "./dataatualizada/log.doc";
$linha1 = "\n[".date("d/m/Y - H:i:s")."]  ";
$linha2 = $_SERVER['REMOTE_ADDR']." ";
$linha3 = $_SERVER['PHP_SELF']."  ";
$linha4 = $_SESSION['nome']."\n";

$texto  = $linha1.$linha2.$linha3.$linha4;
$abrindo = fopen($arquivo, 'a+');
fwrite($abrindo, $texto);
fclose($abrindo);
?>
