<?php
session_start();
if (!isset($_SESSION['id'])){
header("Location: index.php?erro=1");
exit;
}
date_default_timezone_set('America/Sao_Paulo');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta http-equiv="Content-type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>IEOP-Matr&iacute;cula</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css?version=12">
  <link rel="stylesheet" href="css/navbar.css">

<style type="text/css">
<!--
.style1 {
	font-size: 36px
}
-->
</style>
</head>

<body background="Fundo.png">

<div id="sitemain">
<div id="topo">
<? include("head.php"); ?> 
</div>
 <div id="menubox">
 <? include("menu.php"); ?>
 </div>
<div id="main">

   <div id="palco2">
    <? unset($_SESSION['Matr']); ?>
      <form action="AlunoOK.php" method="post" name="form1" onKeypress="if(event.keyCode == 13) event.returnValue = false;" enctype='multipart/form-data'>
	<fieldset id="forms">
    <!-- Dados do Aluno -->
		<legend>Matr&iacute;cula Inicial de Aluno</legend>
		------------------ Dados do Aluno --------------------- 
<!-- ************************************************************************************************ -->         <div class="form-group row mt-1 mb-1">
            <label class="col-sm-2 col-form-label" for="ID">ID:</label>
            <div class="col-md-2">
              <input type="text" name="Id" id="Id" class="textbox2" tabindex="1" maxlength="12" onkeypress="return Onlynumbers(event)" title="Informe a ID do aluno"/>
            </div>
        
            <label class="col-sm-2 col-form-label" for="Matricula">*N&ordm; de Matr&iacute;cula:</label>
            <div class="col-md-2">
              <input type="text" name="Matricula" id="Matricula" class="textbox2" tabindex="2" onkeypress="formatar_mascara(this, '####-####-####')" onBlur="ajaxGet('processConsultaMatr.php?Matr='+this.value,document.getElementById('Matric'),true);" obrigatorio="1" maxlength="14"  title="Informe a matricula no Formato: AAAA-TTTT-SSSS"/>
      &nbsp;&nbsp;<input type="text" name="Matric" id="Matric" size="30" hidden="true" >
            </div>
        </div>
        <div class="form-group row mt-1 mb-1">
            <label class="col-sm-2 col-form-label" for="MatNomericula">*Nome:</label>
            <div class="col-md-3">
              <input type="text" name="Nome" id="Nome" class="textbox" size="60" tabindex="3" onkeypress="return Onlychars(event)" onBlur="ajaxGet('processConsultaNome.php?Nomm='+this.value,document.getElementById('Nomm'),true);" obrigatorio="1" title="Informe o nome do aluno"/>
		&nbsp;&nbsp;<input type="text" name="Nomm" id="Nomm" size="30" hidden="true" >
            </div>
        </div>
		<div class="form-group row mt-1 mb-1">
            <label class="col-sm-2 col-form-label" for="MatNomericula">*Data da Matr&iacute;cula:</label>
            <div class="col-md-2">
              <input type="date" name="Data" id="Data" class="textbox2"  tabindex="4"  onKeyPress="MascaraData(form1.Data);"  size="14" value="<? echo "$data" ?>" maxlength="10" title="Informe a data da matr?cula"/>
            </div>
        
         <label class="col-sm-2 col-form-label" for="Ano">*Ano Letivo:</label>
         <div class="col-md-2">
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
		  </div>
        
            <label class="col-sm-2 col-form-label" for="MatNomericula">*Data de Nascimento:</label>
            <div class="col-md-2">
              <input type="date" name="Nascimento" id="Nascimento" class="textbox2"  tabindex="6" onKeyPress="MascaraData(form1.Nascimento);"  size="14" maxlength="10" obrigatorio="1" title="Informe a data de mascimento"/>
            </div>
        </div>
       	<div class="form-group row mt-1 mb-1">
            <label class="col-sm-2 col-form-label" for="Certidao">N&ordm; Certid&atilde;o:</label>
            <div class="col-md-2">
              <input type="text" name="Certidao" id="Certidao" class="textbox2"  tabindex="7" onkeypress="return Onlynumbers(event)"  title="Informe o n? da certid?o de nascimento"/>
            </div>
        
            <label class="col-sm-2 col-form-label" for="Raca">Cor / Ra&ccedil;a:</label>
            <div class="col-md-2">
               <select name="Raca" id="Raca" class="textbox2"  tabindex="8" title="Informe a Ra?a">
				<option value="">Selecione</option>
	            <option value="Branco">Branco</option>
	            <option value="Negro">Negro</option>
	            <option value="Pardo">Pardo</option>
	            <option value="Amarelo">Amarelo</option>
             	<option value="Ind?gena">Ind&iacute;gena</option>
		       </select>
            </div>
        
            <label class="col-sm-2 col-form-label" for="Sexo">Sexo:</label>
            <div class="col-md-2">
              <select name="Sexo" id="Sexo" class="textbox2"  tabindex="9" title="Informe o sexo">
				<option value="">Selecione</option>
	            <option value="Masculino">Masculino</option>
	            <option value="Feminino">Feminino</option>
		      </select>
            </div>
        </div> 
        <div class="form-group row mt-1 mb-1">
            <label class="col-sm-2 col-form-label" for="Sexo">Tipo Sangu&iacute;neo:</label>
            <div class="col-md-2">
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
			  </select>
            </div>
        
            <label class="col-sm-2 col-form-label" for="Naturalidade">Naturalidade:</label>
            <div class="col-md-2">
              <input type="text" name="Natural" id="Natural" class="textbox3"  tabindex="11" onkeypress="return Onlychars(event)" title="Informe a naturalidade" />
            </div>
        
            <label class="col-sm-2 col-form-label" for="Nacionaliade">Nacionaliade:</label>
            <div class="col-md-2">
              <input type="text" name="Nacional" id="Nacional" class="textbox3"  tabindex="12" onkeypress="return Onlychars(event)" title="Informe a nacionalidade" />
            </div>
        </div>
       	     <!-- Filia??o do Aluno -->  
        ------------------ Filia&ccedil;&atilde;o do Aluno --------------------- 
		<div class="form-group row mt-1 mb-1">
            <label class="col-sm-2 col-form-label" for="Pai">Pai:</label>
            <div class="col-md-4">
              <input type="text" name="Pai" id="Pai" class="textbox" size="60" tabindex="13" onkeypress="return Onlychars(event)" title="Informe o nome do Pai" />
            </div>
        </div>
		<div class="form-group row mt-1 mb-1">
            <label class="col-sm-2 col-form-label" for="CelPai">Cel. Pai:</label>
            <div class="col-md-4">
              <input type="text" name="CelPai" id="CelPai" class="textbox2"  tabindex="14" onKeyPress="MascaraCelular(form1.CelPai);" maxlength="15"   title="Informe o Celular do Pai" />formato: (00) 00000-0000
            </div>
        </div>
        <div class="form-group row mt-1 mb-1">
            <label class="col-sm-2 col-form-label" for="ProfPai">Profiss&atilde;o do Pai:</label>
            <div class="col-md-4">
              <input type="text" name="Profpai" id="Profpai" class="textbox" size="40"  tabindex="15" onkeypress="return Onlychars(event)" title="Informe a profiss?o do Pai" />
            </div>
        </div>
        <div class="form-group row mt-1 mb-1">
            <label class="col-sm-2 col-form-label" for="Mae">M&atilde;e:</label>
            <div class="col-md-4">
              <input type="text" name="Mae" id="Mae" class="textbox" size="60" tabindex="16" onkeypress="return Onlychars(event)" title="Informe o nome da Mae" />
            </div>
        </div> 
        <div class="form-group row mt-1 mb-1">
            <label class="col-sm-2 col-form-label" for="CelMae">Cel. M&atilde;e:</label>
            <div class="col-md-4">
              <input type="text" name="CelMae" id="CelMae" class="textbox2"  tabindex="17"onKeyPress="MascaraCelular(form1.CelMae);" maxlength="15"  title="Informe o Celular da M?e" />formato: (00) 00000-0000
            </div>
        </div>
		<div class="form-group row mt-1 mb-1">
            <label class="col-sm-2 col-form-label" for="Profmae">Profiss&atilde;o da M&atilde;e:</label>
            <div class="col-md-4">
              <input type="text" name="Profmae" id="Profmae" size="40" class="textbox" tabindex="18" onkeypress="return Onlychars(event)" title="Informe a profiss?o da Mae" />
            </div>
        </div>
        ------------------ Endere&ccedil;o do Aluno --------------------- 
      <!-- <label for="Foto">Foto:</label>
		<input type="file" name="Foto" id="Foto" tabindex="19"  size="10" title="Clique aqui para inserir a foto" /><br />
		<br /> -->
		<div class="form-group row mt-1 mb-1">
            <label class="col-sm-2 col-form-label" for="cep">CEP:</label>
            <div class="col-md-4">
              <input type="text" name="cep" id="cep" class="textbox2"  tabindex="20" maxlength="9" onKeyPress="MascaraCEP(form1.cep);" onblur="pesquisacep(this.value);" title="Informe o CEP" />
            </div>
        </div>
		<div class="form-group row mt-1 mb-1">
            <label class="col-sm-2 col-form-label" for="endereco">Endere&ccedil;o:</label>
            <div class="col-md-4">
              <input type="text" name="endereco" id="endereco" size="60" class="textbox" tabindex="19" title="Informe o endere?o" />
            </div>
        </div>
        <div class="form-group row mt-1 mb-1">
            <label class="col-sm-2 col-form-label" for="bairro">Bairro:</label>
            <div class="col-md-4">
              <input type="text" name="bairro" id="bairro" size="40" class="textbox"  tabindex="21" onkeypress="return Onlychars(event)" title="Informe o bairro" />
            </div>
        </div>
		<div class="form-group row mt-1 mb-1">
            <label class="col-sm-2 col-form-label" for="cidade">Cidade:</label>
            <div class="col-md-4">
              <input type="text" name="cidade" id="cidade" size="40" class="textbox" tabindex="22" onkeypress="return Onlychars(event)" title="Informe a cidade" />
            </div>
        </div>
		<div class="form-group row mt-1 mb-1">
            <label class="col-sm-2 col-form-label" for="estado">Estado:</label>
            <div class="col-md-4">
              <select name="estado" id="estado" class="textbox4"  tabindex="23" title="Informe o Estado">
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
		</select>
            </div>
        </div>
        <div class="form-group row mt-1 mb-1">
            <label class="col-sm-2 col-form-label" for="Telefone">Telefone Res.:</label>
            <div class="col-md-4">
              <input type="text" name="Telefone" id="Telefone" class="textbox2"  tabindex="24" onKeyPress="MascaraTelefone(form1.Telefone);" data-inputmask="'mask': '(99) 9999-9999'" maxlength="14"  title="Informe o telefone residencial" />formato: (00) 0000-0000
            </div>
        </div>
		<div class="form-group row mt-1 mb-1">
            <label class="col-sm-2 col-form-label" for="Email">Email:</label>
            <div class="col-md-4">
              <input type="text" name="Email" id="Email" size="40" class="textbox" tabindex="25" onBlur="ValidEmail();" title="Informe um email v?lido" />
            </div>
        </div>
		------------------ Dados Gerais ---------------------
        <div class="form-group row mt-1 mb-1">
            <label class="col-sm-2 col-form-label" for="Transferencia">Inclus&atilde;o:</label>
            <div class="col-md-4">
              <select name="Transferencia"  class="textbox3" tabindex="26" title="Informe a origem da inclus?o" > 
	    		<option value"">Selecione...</option>
	    		<option value"Matr?cula Inicial">Matr&iacute;cula Inicial</option>
	            <option value"Matr?cula Renovada">Matr&iacute;cula Renovada</option>
	    		<option value"Transfer?ncia da Rede Particular">Transfer&ecirc;ncia da Rede Particular</option>
	    		<option value"Transfer?ncia da Rede P?blica">Transfer&ecirc;ncia da Rede P&uacute;blica</option>
	    		<option value"Retorno">Retorno</option>
    	      </select>
            </div>
        
            <label class="col-sm-2 col-form-label" for="Email">*Turma:</label>
            <div class="col-md-4">
              <select name="Turma" id="Turma" class="textbox2" tabindex="27" >
                   <option value="">Selecione</option>
        				<?php
			            //Busco os estados
						require_once("conexao.php");
						$sql3 = "SELECT Ano FROM turmas";
						$results3 = mysqli_query($conn, $sql3);
						while ( $row = mysqli_fetch_array($results3) ) {
							echo "<option value='".$row[0]."'>".$row[0]."</option>";
						}
					    ?>
              </select>
            </div>
        </div>
        <div class="form-group row mt-1 mb-1">
            <label class="col-sm-2 col-form-label" for="Carne">N&ordm; do Carn&ecirc;:</label>
            <div class="col-md-4">
              <input type="text" name="Carne" id="Carne" class="textbox2" tabindex="28" onkeypress="return Onlynumbers(event)" obrigatorio="1" title="Informe o n? do Carn?" />
            </div>
        </div>
         <div class="form-group mt-5 mb-5">
            <div class="form-row">
              <button class="btn btn-primary btn-block">S A L V A R</button>
            </div>
          </div>
	</fieldset>
  </form>
   </div> 
   </div>
    
  
<div id='footer'>
<? include("footer.php"); ?>
</div>
</div>

    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/navbar.js"></script>
    <script language="javascript" src="js/micoxAjax.js?version=12"></script>
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
        
        $(document).ready(function(){
			$(":input").inputmask();



		$('input').inputmask();

		function ValidaSemPreenchimento(form){
		for (i=0;i<form.length;i++){
		var obg = form[i].obrigatorio;
		if (obg==1){
		if (form[i].value == ""){
		var nome = form[i].name
		alert("O campo " + nome + " ? obrigat?rio.")
		form[i].focus();
		return false
		}
		}
		}
		return true
		}
	</script>
</body>
</html>
