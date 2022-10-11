<form action="NotasOK.php" method="post" name="form1">
<fieldset>
<legend>Lan&ccedil;amento das Notas do Aluno</legend>
  <label><blink><font size="1" color="#FF0000">Use apenas (.) PONTO. Ex: 10.0</font></blink></label><br /><br />
    <label>Materias&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Notas</label>
      
	<br /><br />
<?	
include "conexao.php";
$turma = $_SESSION["turma"];
$matricula = $_SESSION["matricula"];
$bimestre2 = $_SESSION["bimestr"];
$ano = $_SESSION["AnoLetivo"];
$cont = 0;


$sql2 = "SELECT Materia FROM materia_pri_qui";
$resultado2 = mysqli_query($conexao, $sql2) or die (mysql_error());
while ($linha2 = mysqli_fetch_array($resultado2))
{
	$materia = $linha2['Materia'];
		
$sql3 = "SELECT * FROM notas WHERE Matricula = '$matricula' && Ano = '$ano' && Materia = '$materia'";
$resultado3 = mysqli_query($conexao, $sql3) or die (mysql_error());
while ($linha3 = mysqli_fetch_array($resultado3))
{
	$recup = $linha3['Recuperacao'];
 	
	if( $bimestre2 == 1){
	$nota = $linha3['Bim1'];
	}
	if( $bimestre2 == 2){
	$nota = $linha3['Bim2'];
	}
	if( $bimestre2 == 3){
	$nota = $linha3['Bim3'];
	}
	if( $bimestre2 == 4){
	$nota = $linha3['Bim4'];
	}
	 if( $bimestre2 == 5 && $recup == 'Sim'){
	$nota = $linha3['RecFin'];
	$_SESSION[recfin] = $nota;
	}
	if($bimestre2 == 5 && $recup <> 'Sim'){
	$nota = '-'; $materia = '';
	}
     	

 	?>
        <input type="text" name="Materias[<? echo $cont; ?>]"  class="textbox3"  readonly  tabindex="-1" value="<? echo $materia; ?>"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
       	<input type="text" name="Notas[<? echo $cont; ?>]"  class="textbox4"  tabindex="$cont" value="<? echo $nota ?>" /> 
        <br /><br />
<?
$cont = $cont + 1;
$_SESSION[conta] =  $cont;

}
} 
?>
<br />
 <input type="submit" class="button" name="cadastrar" value="Lan&ccedil;ar Notas"  />
  </fieldset>
</form>

