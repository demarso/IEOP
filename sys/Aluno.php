<?php
session_start();
require("include/arruma_link.php");
if (! isset($_SESSION['id'])){
header("Location: index.php?erro=1");
exit;

}
if($_SESSION[AnoLetivo] <> date('Y')){
   echo "<script>alert('O ano Letivo não é o ano atual!'); history.back(-1); </script>";}

$ano = $_SESSION["AnoLetivo"];
$data = date("d/m/Y"); 
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8" />
<title></title>
<link href="style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="include/jquery-1.6.1.min.js"></script>
<script type="text/javascript" src="include/jquery.maskedinput.js"/></script>
<script language="javascript" src="include/micoxAjax.js"></script>
<script type="text/javascript">
$(document).ready(function(){
		$("#Matricula").mask("9999-9999-9999");
		$("#Telefone").mask("(99)9999-9999");
		$("#CelMae").mask("(99)99999-9999");
		$("#CelPai").mask("(99)99999-9999");
		$("#cpf").mask("999.999.999-99");
		$("#cep").mask("99999-999");
		$("#data").mask("99/99/9999");
	});

function ValidaSemPreenchimento(form){
for (i=0;i<form.length;i++){
var obg = form[i].obrigatorio;
if (obg==1){
if (form[i].value == ""){
var nome = form[i].name
alert("O campo " + nome + " é obrigatório.")
form[i].focus();
return false
}
}
}
return true
}
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
 <? include("menu.html"); ?>
 </div>
<div id="main">

   <div id="palco2">
    <? unset($_SESSION['Matr']); ?>
      <form action="AlunoOK.php" method="post" enctype="multipart/form-data"  name="form1" onSubmit="return ValidaSemPreenchimento(this)">
	<fieldset id="forms">
    <!-- Dados do Aluno -->
		<legend>Matr&iacute;cula Inicial de Aluno</legend>
		<center>------------------ Dados do Aluno --------------------- </center>
        <label for="Id">ID:</label>
		<input type="text" name="Id" id="Id" class="textbox2" tabindex="1" maxlength="12" onkeypress="return Onlynumbers(event)" title="Informe a ID do aluno"/><br />
		<br />
		<label for="Matricula">*N&ordm; de Matr&iacute;cula:</label>
		<input type="text" name="Matricula" id="Matricula" class="textbox2" tabindex="2" onkeypress="formatar_mascara(this, '####-####-####')" onBlur="ajaxGet('processConsultaMatr.php?Matr='+this.value,document.getElementById('Matric'),true);" obrigatorio="1" maxlength="14"  title="Informe a matricula no Formato: AAAA-TTTT-SSSS"/>
      &nbsp;&nbsp;<input type="text" name="Matric" id="Matric" size="30" hidden="true" >
        <br />
		<br />
        <label for="Nome">*Nome:</label>
		<input type="text" name="Nome" id="Nome" class="textbox"  tabindex="3" onkeypress="return Onlychars(event)" onBlur="ajaxGet('processConsultaNome.php?Nomm='+this.value,document.getElementById('Nomm'),true);" obrigatorio="1" title="Informe o nome do aluno"/>
		&nbsp;&nbsp;<input type="text" name="Nomm" id="Nomm" size="30" hidden="true" ><br />
		<br />
        <label for="Data">*Data da Matr&iacute;cula:</label>
		<input type="text" name="Data" id="Data" class="textbox2"  tabindex="4"  onKeyPress="MascaraData(form1.Data);"  size="14" value="<? echo "$data" ?>" maxlength="10" title="Informe a data da matrícula"/><br />
		<br />
        <label for="Ano">*Ano Letivo:</label>
         <select name="Ano" id="Ano" class="textbox2" tabindex="5" obrigatorio="1" title="Informe o Ano que o aluno vai estudar">
			<option value="<? echo "$ano" ?>"><? echo "$ano" ?></option>
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
       	<label for="Nascimento">*Data de Nascimento:</label>
		<input type="text" name="Nascimento" id="Nascimento" class="textbox2"  tabindex="6" onKeyPress="MascaraData(form1.Nascimento);"  size="14" maxlength="10" obrigatorio="1" title="Informe a data de mascimento"/><br />
		<br />
        <label for="Certidao">N&ordm; Certid&atilde;o:</label>
		<input type="text" name="Certidao" id="Certidao" class="textbox2"  tabindex="7" onkeypress="return Onlynumbers(event)"  title="Informe o nº da certidão de nascimento"/><br />
		<br />
         <label for="Raca">Cor / Ra&ccedil;a:</label>
         <select name="Raca" id="Raca" class="textbox2"  tabindex="8" title="Informe a Raça">
			<option value="">Selecione</option>
            <option value="Branco">Branco</option>
            <option value="Negro">Negro</option>
            <option value="Pardo">Pardo</option>
            <option value="Amarelo">Amarelo</option>
             <option value="Indígena">Ind&iacute;gena</option>
		 </select><br />
		<br />
        <label for="Sexo">Sexo:</label>
		 <select name="Sexo" id="Sexo" class="textbox2"  tabindex="9" title="Informe o tipo sanguineo">
			<option value="">Selecione</option>
            <option value="Masculino">Masculino</option>
            <option value="Feminino">Feminino</option>
		 </select><br />
		<br />
         <label for="Sangue">Tipo Sangu&iacute;neo:</label>
        <select name="Sangue" id="Sangue" class="textbox2"  tabindex="10" title="Informe o tipo sanguineo">
			<option value="">Selecione</option>
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
        <label for="Natural">Naturalidade:</label>
		<input type="text" name="Natural" id="Natural" class="textbox3"  tabindex="11" onkeypress="return Onlychars(event)" title="Informe a naturalidade" /><br />
		<br />
         <label for="Nacional">Nacionaliade:</label>
		<input type="text" name="Nacional" id="Nacional" class="textbox3"  tabindex="12" onkeypress="return Onlychars(event)" title="Informe a nacionalidade" /><br />
		<br />
		     <!-- Filiação do Aluno -->  
             <center>------------------ Filia&ccedil;&atilde;o do Aluno --------------------- </center> 
		<label for="Pai">Pai:</label>
		<input type="text" name="Pai" id="Pai" class="textbox"  tabindex="13" onkeypress="return Onlychars(event)" title="Informe o nome do Pai" /><br />
		<br />
         <label for="CelPai">Cel. Pai:</label>
		<input type="text" name="CelPai" id="CelPai" class="textbox2"  tabindex="14" onKeyPress="MascaraCelular(form1.CelPai);" maxlength="15"   title="Informe o Celular do Pai" />formato: (00) 00000-0000<br />
		<br />
        <label for="Profpai">Profiss&atilde;o do Pai</label>
		<input type="text" name="Profpai" id="Profpai" class="textbox"   tabindex="15" onkeypress="return Onlychars(event)" title="Informe a profissão do Pai" /><br />
		<br />
		<label for="Mae">M&atilde;e:</label>
		<input type="text" name="Mae" id="Mae" class="textbox" tabindex="16" onkeypress="return Onlychars(event)" title="Informe o nome da Mae" /><br />
		<br />
        <label for="CelMae">Cel. M&atilde;e:</label>
		<input type="text" name="CelMae" id="CelMae" class="textbox2"  tabindex="17"onKeyPress="MascaraCelular(form1.CelMae);" maxlength="15"  title="Informe o Celular da Mãe" />formato: (00) 00000-0000<br />
		<br />
        <label for="Profmae">Profiss&atilde;o da M&atilde;e:</label>
		<input type="text" name="Profmae" id="Profmae" class="textbox" tabindex="18" onkeypress="return Onlychars(event)" title="Informe a profissão da Mae" /><br />
		<br />
       <center>------------------ Endereço do Aluno --------------------- </center> 
      <!-- <label for="Foto">Foto:</label>
		<input type="file" name="Foto" id="Foto" tabindex="19"  size="10" title="Clique aqui para inserir a foto" /><br />
		<br /> -->
       <label for="Endereco">Endere&ccedil;o:</label>
		<input type="text" name="Endereco" id="Endereco" class="textbox" tabindex="19" title="Informe o endereço" /><br />
		<br />
		<label for="Cep">CEP:</label>
		<input type="text" name="Cep" id="Cep" class="textbox2"  tabindex="20" maxlength="9" onKeyPress="MascaraCep(form1.Cep);" title="Informe o CEP" /><br />
		<br />		
		<label for="Bairro">Bairro:</label>
		<input type="text" name="Bairro" id="Bairro" class="textbox"  tabindex="21" onkeypress="return Onlychars(event)" title="Informe o bairro" /><br />
		<br />
		<label for="Cidade">Cidade:</label>
		<input type="text" name="Cidade" id="Cidade" class="textbox" tabindex="22" onkeypress="return Onlychars(event)" title="Informe a cidade" /><br />
		<br />
        <label for="Estado">Estado:</label>
        <select name="Estado" id="Estado" class="textbox4"  tabindex="23" title="Informe o Estado">
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
		<label for="Telefone">Telefone Res.:</label>
		<input type="text" name="Telefone" id="Telefone" class="textbox2"  tabindex="24" onKeyPress="MascaraTelefone(form1.Telefone);" maxlength="14"  itle="Informe o telefone residencial" />formato: (00) 0000-0000<br />
		<br />
		<label for="Mail">Email</label>
		<input type="text" name="Email" id="Email" class="textbox" tabindex="25" onBlur="ValidEmail();" title="Informe um email válido" />
		<br /><br />
        <center>------------------ Dados Gerais --------------------- </center>
        <label for="Inclusao">Inclus&atilde;o:</label>
        <select name="Transferencia"  class="textbox3" tabindex="26" title="Informe a origem da inclusão">
    		<option value"">Selecione...</option>
    		<option value"Matrícula Inicial">Matr&iacute;cula Inicial</option>
            <option value"Matrícula Renovada">Matr&iacute;cula Renovada</option>
    		<option value"Transferência da Rede Particular">Transfer&ecirc;ncia da Rede Particular</option>
    		<option value"Transferência da Rede Pública">Transfer&ecirc;ncia da Rede P&uacute;blica</option>
    		<option value"Retorno">Retorno</option>
    	</select><br /><br />
         <label for="Turma">*Turma:</label>
         <select name="Turma" id="Turma" class="textbox2" tabindex="27" >
           <option value="">Selecione</option>
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
              <label for="Carne">N&ordm; do Carn&ecirc;:</label>
        <input type="text" name="Carne" id="Carne" class="textbox2" tabindex="28" onkeypress="return Onlynumbers(event)" obrigatorio="1" title="Informe o nº do Carnê" />
        
        <input type="submit" class="button" name="cadastrar" value="Matricular"  />
	</fieldset>
</form>
   </div> 
   </div>
    
  
<div id='footer'>
<? include("footer.php"); ?>
</div>
</div>
</center>
</body>
</html>
