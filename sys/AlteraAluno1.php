<?php
session_start();
require("include/arruma_link.php");
if (! isset($_SESSION['id'])){
header("Location: index.php?erro=1");
exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta http-equiv="Content-type" content="text/html; charset=UTF-8"/>
<title></title>
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
<? include("head.php"); ?> 
</div>
 <div id="menubox">
  <? include("menu.html"); ?> 
 </div>
<div id="main">

   <div id="palco2"><br /><br />
     <?php

include "conexao.php";
$nome2 = $_POST["Nome"];
$nasc = $_POST["NascEx"];
$ano = $_SESSION["AnoLetivo"];


$sql = "SELECT *,DATE_FORMAT(Nascimento,'%d/%m/%Y') as iNascimento,DATE_FORMAT(Data,'%d/%m/%Y') as iData FROM aluno WHERE Nome = '$nome2' && DATE_FORMAT(Nascimento, '%d/%m/%Y') = '$nasc'";

$resultado = mysqli_query($conexao, $sql) or die (mysql_error());

while ($linha = mysqli_fetch_array($resultado))
{
	$id2 = $linha['id'];
	$matricula = $linha['Matricula'];
	$nome3 = $linha['Nome'];
	$data = $linha['iData'];
	//$ano2 = $linha['Ano'];
	$nascimento = $linha['iNascimento'];
	$endereco = $linha['Endereco'];
	$certidao = $linha['Certidao'];
	$raca = $linha['Raca'];
	$sexo = $linha['Sexo'];
	$sangue = $linha['Sangue'];
	$natural = $linha['Naturalidade'];
	$nacional = $linha['Nacionalidade'];
	$bairro = $linha['Bairro'];
	$cidade = $linha['Cidade'];
	$estado = $linha['Estado'];
	$cep = $linha['Cep'];
	$pai = $linha['Pai'];
	$profpai = $linha['Profpai'];
	$mae = $linha['Mae'];
	$profmae = $linha['Profmae'];
	$email = $linha['Email'];
	$telefone = $linha['Telefone'];
	$celpai = $linha['CelPai'];
	$celmae = $linha['CelMae'];
	$transferencia = $linha['Transferencia'];
	$turma = $linha['Turma'];
	$foto = $linha['Foto'];

  $sql2 = "SELECT Resultado FROM histMatr WHERE Matricula = '$matricula' && ano = '$ano'";
     $resultado2 = mysqli_query($conexao, $sql2) or die (mysql_error());
       while ($linha2 = mysqli_fetch_array($resultado2))
       {
	      $result = $linha2['Resultado'];


$sql2 = "SELECT Carne FROM pagamento WHERE Matricula = '$matricula' && ano = '$ano'";

$resultado2 = mysqli_query($conexao, $sql2) or die (mysql_error());

while ($linha2 = mysqli_fetch_array($resultado2))
{
	$carne = $linha2['Carne'];
?>
 <cente>
        <form action="AlteraAlunoOK.php" method="post" enctype="multipart/form-data" name="form1" >
	<fieldset id="forms">
    <!-- Dados do Aluno -->
		<legend align="center">Alteração dos dados do Aluno</legend>
		<center>------------------ Dados do Aluno --------------------- 
        <br />
 		<? echo "<img src=\"$foto\" width='95' height='120' border='5'>".'<br />'; ?>
	     </center>
        <label for="Idn">ID:</label>
		<input type="text" name="Idn" id="Idn" class="textbox2" tabindex="1"  value="<? echo $id2 ?>" maxlength="12" onkeypress="return Onlynumbers(event)" title="Informe a ID do aluno"/><br />
		<br />
		<label for="Matriculan">Nº de Matricula:</label>
		<input type="text" name="Matriculan" id="Matriculan" class="textbox2" tabindex="2" value="<? echo  $matricula ?>" onkeypress="formatar_mascara(this, '####-####-####')" maxlength="14" title="Informe a matricula no Formato: AAAA-TTTT-SSSS"/><br />
		<br />
        <label for="Nomen">Nome:</label>
		<input type="text" name="Nomen" id="Nomen" class="textbox"  tabindex="3" value="<? echo $nome3 ?>" onkeypress="return Onlychars(event)" title="Informe o nome do aluno"/><br />
		<br />
        <label for="Datan">Data da Matricula:</label>
		<input type="text" name="Datan" id="Datan" class="textbox2"  tabindex="4" value="<? echo $data ?>" onKeyPress="MascaraData(form1.Datan);"  size="14" maxlength="10" title="Informe a data da matrícula"/><br />
		<br />
        <label for="Anon">Ano Letivo:</label>
         <select name="Anon" id="Anon" class="textbox2" tabindex="5" title="Informe o Ano que o aluno vai estudar">
			<option value="<? echo $ano2 ?>"><? echo $ano ?></option>
            <option value="2011">2011</option>
            <option value="2012">2012</option>
            <option value="2013">2013</option>
            <option value="2014">2014</option>
             <option value="2015">2015</option>
             <option value="2016">2016</option>
             <option value="2017">2017</option>
             <option value="2018">2018</option>
             <option value="2019">2019</option>
             <option value="2020">2020</option>
             <option value="2021">2021</option>
            <option value="2022">2022</option>
            <option value="2023">2023</option>
            <option value="2024">2024</option>
             <option value="2025">2025</option>
             <option value="2026">2026</option>
             <option value="2027">2027</option>
             <option value="2028">2028</option>
             <option value="2029">2029</option>
             <option value="2030">2030</option>
		 </select>
		<br />
        <br />
       	<label for="Nascimenton">Data de Nascimento:</label>
		<input type="text" name="Nascimenton" id="Nascimenton" class="textbox2"  tabindex="6" value="<? echo $nascimento ?>" onKeyPress="MascaraData(form1.Nascimenton);"  size="14" maxlength="10" title="Informe a data de mascimento"/><br />
		<br />
        <label for="Certidaon">N&ordm; Certid&atilde;o:</label>
		<input type="text" name="Certidaon" id="Certidaon" class="textbox2"  tabindex="7" value="<? echo $certidao ?>" onkeypress="return Onlynumbers(event)" title="Informe o nº da certidão de nascimento"/><br />
		<br />
         <label for="Racan">Cor / Ra&ccedil;a:</label>
         <select name="Racan" id="Racan" class="textbox2"  tabindex="8" title="Informe a Raça">
			<option value="<? echo $raca ?>"><? echo $raca ?></option>
            <option value="Branco">Branco</option>
            <option value="Negro">Negro</option>
            <option value="Pardo">Pardo</option>
            <option value="Amarelo">Amarelo</option>
             <option value="Indígena">Ind&iacute;gena</option>
		 </select><br />
		<br />
        <label for="Sexon">Sexo:</label>
		 <select name="Sexon" id="Sexon" class="textbox2"  tabindex="9" title="Informe o tipo sanguineo">
			<option value="<? echo $sexo ?>"><? echo $sexo ?></option>
            <option value="Masculino">Masculino</option>
            <option value="Feminino">Feminino</option>
		 </select><br />
		<br />
         <label for="Sanguen">Tipo Sanguíneo:</label>
        <select name="Sanguen" id="Sanguen" class="textbox2"  tabindex="10" title="Informe o tipo sanguineo">
			<option value="<? echo $sangue ?>"><? echo $sangue ?></option>
            <option value="O Positivo">O Positivo</option>
            <option value="O Negativo">O Negativo</option>
			<option value="A Positivo">A Positivo</option>
			<option value="A Negativo">A Negativo</option>
			<option value="B Positivo">B Positivo</option>
			<option value="B Negativo">B Negativo</option>
			<option value="AB Positivo">AB Positivo</option>
			<option value="AB Negativo">AB Negativo</option>
		</select><br />
		<br />
        <label for="Naturaln">Naturalidade:</label>
		<input type="text" name="Naturaln" id="Naturaln" class="textbox3" value="<? echo $natural ?>" onkeypress="return Onlychars(event)" tabindex="11" title="Informe a naturalidade" /><br />
		<br />
         <label for="Nacionanl">Nacionaliade:</label>
		<input type="text" name="Nacionaln" id="Nacionaln" class="textbox3" value="<? echo $nacional ?>" onkeypress="return Onlychars(event)" tabindex="12" title="Informe a nacionalidade" /><br />
		<br />
		     <!-- Filiação do Aluno -->  
             <center>------------------ Filiação do Aluno --------------------- </center> 
		<label for="Pain">Pai:</label>
		<input type="text" name="Pain" id="Pain" class="textbox" value="<? echo $pai ?>" onkeypress="return Onlychars(event)" tabindex="13" title="Informe o nome do Pai" /><br />
		<br />
         <label for="CelPain">Cel. Pai:</label>
		<input type="text" name="CelPain" id="CelPain" class="textbox2"  tabindex="14" value="<? echo $celpai ?>"  onKeyPress="MascaraCelular(form1.CelPain);" maxlength="15"   title="Informe o Celular do Pai" /><br />
		<br />
        <label for="Profpain">Profiss&atilde;o do Pai</label>
		<input type="text" name="Profpain" id="Profpain" class="textbox"  value="<? echo $profpai ?>" onkeypress="return Onlychars(event)" tabindex="15" title="Informe a profissão do Pai" /><br />
		<br />
		<label for="Maen">M&atilde;e:</label>
		<input type="text" name="Maen" id="Maen" class="textbox" value="<? echo $mae ?>" onkeypress="return Onlychars(event)" tabindex="16" title="Informe o nome da Mae" /><br />
		<br />
        <label for="CelMaen">Cel. Mãe:</label>
		<input type="text" name="CelMaen" id="CelMaen" class="textbox2" value="<? echo $celmae ?>" tabindex="17" onKeyPress="MascaraCelular(form1.CelMaen);" maxlength="15"  title="Informe o Celular da Mãe" /><br />
		<br />
        <label for="Profmaen">Profiss&atilde;o da Mãe:</label>
		<input type="text" name="Profmaen" id="Profmaen" class="textbox" value="<? echo $profmae ?>" onkeypress="return Onlychars(event)" tabindex="18" title="Informe a profissão da Mae" /><br />
		<br />
       <center>------------------ Endereço do Aluno --------------------- </center> 
      <!-- <label for="Foto">Foto:</label>
		<input type="file" name="Foto" id="Foto" tabindex="19"  size="10" title="Clique aqui para inserir a foto" /><br />
		<br /> -->
       <label for="Enderecon">Endere&ccedil;o:</label>
		<input type="text" name="Enderecon" id="Enderecon" class="textbox" value="<? echo $endereco ?>" tabindex="19" title="Informe o endereço" /><br />
		<br />
		<label for="Cepn">CEP:</label>
		<input type="text" name="Cepn" id="Cepn" class="textbox2"  tabindex="20"  value="<? echo $cep ?>" maxlength="9" onKeyPress="MascaraCep(form1.Cepn);" title="Informe o CEP" /><br />
		<br />		
		<label for="Bairron">Bairro:</label>
		<input type="text" name="Bairron" id="Bairron" class="textbox" value="<? echo $bairro ?>" onkeypress="return Onlychars(event)" tabindex="21" title="Informe o bairro" /><br />
		<br />
		<label for="Cidaden">Cidade:</label>
		<input type="text" name="Cidaden" id="Cidaden" class="textbox" value="<? echo $cidade ?>" onkeypress="return Onlychars(event)" tabindex="22" title="Informe a cidade" /><br />
		<br />
        <label for="Estadon">Estado:</label>
        <select name="Estadon" id="Estadon" class="textbox4"  tabindex="23" title="Informe o Estado">
			 <option value="<? echo $estado ?>"><? echo $estado ?></option>
            <option value="RJ">RJ</option>
            <option value="AC">AC</option>
			<option value="AL">AL</option>
			<option value="AM">AM</option>
			<option value="AP">AP</option>
			<option value="BA">BA</option>
			<option value="CE">CE</option>
			<option value="DF">DF</option>
			<option value="ES">ES</option>
			<option value="GO">GO</option>
			<option value="MA">MA</option>
			<option value="MG">MG</option>
			<option value="MS">MS</option>
			<option value="MT">MT</option>
			<option value="PA">PA</option>
			<option value="PB">PB</option>
			<option value="PE">PE</option>
			<option value="PI">PI</option>
			<option value="PR">PR</option>
			<option value="RN">RN</option>
			<option value="RO">RO</option>
			<option value="RR">RR</option>
			<option value="RS">RS</option>
			<option value="SC">SC</option>
			<option value="SE">SE</option>
			<option value="SP">SP</option>
			<option value="TO">TO</option>
		</select><br />
		
		<br />
		<label for="Telefonen">Telefone:</label>
		<input type="text" name="Telefonen" id="Telefonen" class="textbox2" value="<? echo $telefone ?>"  tabindex="24" onKeyPress="MascaraTelefone(form1.Telefonen);" maxlength="14"  onBlur="ValidaTelefone(form1.Telefonen);" /><br />
		<br />
		<label for="Mailn">Email</label>
		<input type="text" name="Emailn" id="Emailn" class="textbox" tabindex="25" value="<? echo $email ?>" onBlur="ValidEmail();" title="Informe um email válido" />
		<br /><br />
        <center>------------------ Dados Gerais --------------------- </center>
        <label for="Inclusaon">Inclus&atilde;o:</label>
        <select name="Transferencian"  class="textbox3" tabindex="26" title="Informe a origem da inclusão">
    		<option value"<? echo $transferencia ?>"><? echo $transferencia ?></option>
    		<option value"Matrícula Inicial">Matr&iacute;cula Inicial</option>
            <option value"Matrícula Renovada">Matr&iacute;cula Renovada</option>
    		<option value"Transferência da Rede Particular">Transfer&ecirc;ncia da Rede Particular</option>
    		<option value"Transferência da Rede Pública">Transfer&ecirc;ncia da Rede P&uacute;blica</option>
    		<option value"Retorno">Retorno</option>
    	</select><br /><br />
         <label for="Turman">Turma:</label><select name="Turman" id="Turman" class="textbox2" tabindex="27" >
           <option value="<? echo $turma ?>"><? echo $turma ?></option>
        				<?php
			            //Busco os estados
						require_once("conexao.php");
						$sql3 = "SELECT Ano FROM turmas";
						$results3 = mysqli_query($conexao, $sql3);
						while ( $row = mysqli_fetch_array($results3) ) {
							echo "<option value='".$row[0]."'>".$row[0]."</option>";
						}
					    ?>
              </select><br /><br />
         <label for="Result">Resultado do Histórico</label>
		<input type="text" name="Result" id="Result" class="textbox" tabindex="28" value="<? echo $result ?>" />

              <label for="Carnen">N&ordm; do Carn&ecirc;:</label>
        <input type="text" name="Carnen" id="Carnen" class="textbox2" value="<? echo $carne ?>" onkeypress="return Onlynumbers(event)" tabindex="28"  title="Informe o nº do Carnê" />
        
        <input type="submit" class="button" name="cadastrar" value="ALTERAR"  />
	</fieldset>
</form>
   </div> 
   </div>
<? }}} ?>     
  
<div id='footer'>
<? include("footer.php"); ?>
</div>
</div>
</center>
</body>
</html>