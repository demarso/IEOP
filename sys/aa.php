<?php

 require("include/arruma_link.php");
 include "conexao.php";

$sql2 = "SELECT * FROM notas WHERE Matricula = '2011-0018-02a' AND Ano = 2015";

$resultado2 = mysql_query($sql2) or die (mysql_error());



while ($linha2 = mysql_fetch_array($resultado2))

{

	$materia = $linha2['Materia'];

	$nota1 = $linha2['Bim1'];

	$nota2 = $linha2['Bim2'];

	$nota3 = $linha2['Bim3'];

	$nota4 = $linha2['Bim4'];
	
		
	if($nota1 <> '-' && $nota2 <> '-' && $nota3 <> '-' && $nota4 <> '-')
		//$quantNotas = 4;
		$media = ($nota1 + $nota2 + $nota3 + $nota4)/4;
	if($nota1 == '-' && $nota2 <> '-' && $nota3 <> '-' && $nota4 <> '-')
		//$quantNotas = 3;
		$media = ($nota2 + $nota3 + $nota4)/3;
	if($nota1 == '-' && $nota2 == '-' && $nota3 <> '-' && $nota4 <> '-')
		//$quantNotas = 2;
		$media = ($nota3 + $nota4)/2;
	if($nota1 == '-' && $nota2 == '-' && $nota3 == '-' && $nota4 <> '-')
		//$quantNotas = 1;
		$media = $nota4;	
	if($nota1 <> '-' && $nota2 <> '-' && $nota3 <> '-' && $nota4 == '-')
		//$quantNotas = 3;
		$media = ($nota1 + $nota2 + $nota3)/3;
	if($nota1 <> '-' && $nota2 <> '-' && $nota3 == '-' && $nota4 == '-')
		//$quantNotas = 2;
	    $media = ($nota1 + $nota2)/2;
	if($nota1 <> '-' && $nota2 == '-' && $nota3 == '-' && $nota4 == '-')
		//$quantNotas = 1;
		$media = $nota1;
	
	$mostramedia = number_format(round($media * 2 )/ 2,1);
				
	echo $materia.": ".$nota1."  ".$nota2."  ".$nota3."  ".$nota4."    ".$mostramedia."<br /><br />"; 
}
?>