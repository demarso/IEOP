<nav class="navbar navbar-expand-lg navbar-light bg-light bg-dark">
  <a class="navbar-brand text-warning" href="index1.php">IEOP</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="nav nav-tabs">
      <li class="nav-item dropdown">
        <a class="nav-link  dropdown-toggle" id="navPROFESSOR" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">PROFESSOR<span class="sr-only">(current)</span></a>
        <ul class="dropdown-menu" aria-labelledby="PROFESSOR">
          <li class="dropdown-item"><a href="Professor.php">Cadastrar</a></li>
          <li class="dropdown-item"><a href="AlteraProfessorAtivo.php">Consultar</a></li>
          <li class="dropdown-item"><a href="AlteraProfessorInativo.php">Alterar</a>
          <li class="dropdown-item"><a href="ExcluiProfessor.php">Excluir</a></li>
        </ul>
      </li>
                        
      <li class="nav-item dropdown">
        <a class="nav-link  dropdown-toggle" id="navALUNO" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">ALUNO<span class="sr-only">(current)</span></a>
        <ul class="dropdown-menu" aria-labelledby="navALUNO">
          <li class="dropdown-item"><a href="Aluno.php">Matrícula Nova</a></li>
          <li class="dropdown-item"><a href="RematriculaAluno.php">Rematricular</a></li>
          <li class="dropdown-item"><a href="ChamadaSelTurma.php">Lança Chamada</a></li>
          <li class="dropdown-item"><a href="ConsultaSelTurma.php">Consulta Ativo</a></li>
          <li class="dropdown-item"><a href="ConsAlunoInativo.php">Consulta Inativo</a></li>
          <li class="dropdown-item"><a href="ConsAlunoLista.php">Lista Completa</a></li>
          <li class="dropdown-item"><a href="ListaCompletaSelTurma.php">Lista Turma</a></li>
          <li class="dropdown-item"><a href="AlteraSelTurma.php">Alterar Dados</a></li>
          <li class="dropdown-item"><a href="AlteraFotoSelTurma.php">Alterar Foto</a></li>
          <li class="dropdown-item"><a href="ExcluiAluno.php">Excluir</a></li>
          <li class="dropdown-item"><a href="AniversarioLista.php">Aniversariantes</a></li>
        </ul>
      </li> 

      <li class="nav-item dropdown">
        <a class="nav-link  dropdown-toggle" id="navPAGAMENTO" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">PAGAMENTO<span class="sr-only">(current)</span></a>
        <ul class="dropdown-menu" aria-labelledby="navPAGAMENTO">
          <li class="dropdown-item"><a href="LancaPgSelTurma.php">Lançar</a></li>
          <li class="dropdown-item"><a href="Inadimplentes.php">Inadimplentes</a></li>
        </ul>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link  dropdown-toggle" id="navNOTAS" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">NOTAS<span class="sr-only">(current)</span></a>
        <ul class="dropdown-menu" aria-labelledby="navNOTAS">
          <li class="dropdown-item"><a href="NotasSelcTurma.php">Lançar</a></li>
          <li class="dropdown-item"><a href="ConsNotasSelTurma.php">Consultar</a></li>
          <li class="dropdown-item"><a href="AlteraNotas.php">Alterar</a></li>
          <li class="dropdown-item"><a href='NotasRecSelcTurma.php'>Recuperção Final</a></li>
          <li class="dropdown-item"><a href='RecupSelTurma.php'>Altera Recuperção</a></li>
          <li class="dropdown-item"><a href="AlteraResSelTurma.php">Altera Resultado Final</a></li>
          <li class="dropdown-item"><a href="BolTurma.php">Notas Por Turma</a></li>
          <li class="dropdown-item dropdown">
            <a class="dropdown-toggle" id="navDEPENDÊNCIA" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">DEPENDÊNCIA</a>
              <ul class="dropdown-menu" aria-labelledby="navDEPENDÊNCIA">
                <li class="dropdown-item"><a href="DependenciaSelTurma.php">Cad. Aluno</a></li>
                <li class="dropdown-item"><a href="NotasDepend.php">Lança Nota</a></li>
                <li class="dropdown-item"><a href="ConsDependenciaLista.php">Lista</a></li>
                <li class="dropdown-item"><a href="ConsNotasDepend1.php">Consulta</a></li>
              </ul>
          </li>
        </ul>
      </li>
      
      <li class="nav-item dropdown">
        <a class="nav-link  dropdown-toggle" id="navIMPRESSÃO" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">IMPRESSÃO<span class="sr-only">(current)</span></a>
        <ul class="dropdown-menu" aria-labelledby="navIMPRESSÃO">
          <li class="dropdown-item"><a href="BoletimSelTurma.php">Boletim</a></li>
          <li class="dropdown-item"><a href="FMSelTurma.php">Ficha de Matrícula</a></li>
          <li class="dropdown-item"><a href="FISelTurma.php">Ficha Individual</a></li>
          <li class="dropdown-item"><a href="RISelTurma.php">Inadimplentes</a></li>
        </ul>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link  dropdown-toggle" id="navIMPRESSÃO" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">PARÂMETROS<span class="sr-only">(current)</span></a>
        <ul class="dropdown-menu" aria-labelledby="navIMPRESSÃO">
          <li class="dropdown-item"><a href="Parametros.php">Dias Letivos</a></li>
          <li class="dropdown-item"><a href="anoLetivo.php">Ano Letivo</a></li>
        </ul>
      </li>


       <li class="nav-item"><a class="nav-link" href='usuario_lista.php'>USUÁRIOS</a></li>
          
      <li class="nav-item">
        <a class="nav-link" href="sair.php">SAIR</a>
      </li>
    </ul>
  </div>
   <li><font class="text-right text-light" size="1">Usu&aacute;rio:&nbsp;<?php echo $_SESSION['nome']; ?></font></li>
</nav>