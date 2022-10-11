
<div id="palco4">
<form action="NotasDependOK.php" method="post" name="form1">
<fieldset>
<legend>Lan&ccedil;amento das Depend&ecirc;ncias do Aluno</legend>
	  
      <label>Mat&eacute;rias&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Notas&nbsp;&nbsp;&nbsp;&nbsp;Faltas</label>
      
	<br />
<?	
include "conexao.php";
$turma = $_SESSION["turma"];
$matricula = $_SESSION["matricula"];
$bimestre2 = $_SESSION["bim"];
$ano = $_SESSION["AnoLetivo"];
$cont = 0;

	
$sql3 = "SELECT * FROM notasDepend WHERE Matricula = '$matricula' && Ano = '$ano'";
$resultado3 = mysqli_query($conexao,$sql3) or die (mysql_error());
while ($linha3 = mysqli_fetch_array($resultado3))
{
	$materia = $linha3['Materia'];
	if( $bimestre2 == 1){
	$nota = $linha3['Bim1'];
	$faltas = $linha3['Faltas1'];
	}
	if( $bimestre2 == 2){
	$nota = $linha3['Bim2'];
	$faltas = $linha3['Faltas2'];
	}
	if( $bimestre2 == 3){
	$nota = $linha3['Bim3'];
	$faltas = $linha3['Faltas3'];
	}
	if( $bimestre2 == 4){
	$nota = $linha3['Bim4'];
	$faltas = $linha3['Faltas4'];
	}
 	?>
    <br /><br />
        <input type="text" name="Materias[<? echo $cont; ?>]"  class="textbox3"  readonly  tabindex="-1" value="<? echo $materia; ?>"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
       	<input type="text" name="Notas[<? echo $cont; ?>]"  class="textbox4"  tabindex="$cont" value="<? echo $nota ?>" />
        
        <? if($materia <> 'Comportamento' ){?>
        <input type="'text" name="Faltas[<? echo $cont; ?>]"  class="textbox4" value="<? echo $faltas ?>" />
        
        <? } ?> <br /><br />
<?
$cont = $cont + 1;
$_SESSION[conta] =  $cont;
}


 


$cont = $cont + 1;
$_SESSION[conta] =  $cont;

?>
<br /><br />
 <input type="submit" class="button" name="cadastrar" value="Lan&ccedil;ar Notas"  />
	</fieldset>
</form>
</div>