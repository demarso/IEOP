<div class="container">
  <div class="menu-wrap d-flex align-items-center">
    <span class="d-inline-block d-lg-none"><a href="#" class="text-black site-menu-toggle js-menu-toggle py-5"><span class="icon-menu h3 text-black"></span></a>
    </span>

    <nav class="site-navigation text-left mr-auto d-none d-lg-block" role="navigation">
        <ul class="site-menu main-menu js-clone-nav mr-auto ">
            <li class="active"><a href="index.php" class="nav-link">Home</a></li>
            <li><a class="nav-link  dropdown-toggle" id="navInsc" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Secretearia<span class="sr-only">(current)</span></a>
              <ul class="dropdown-menu" aria-labelledby="navInsc">
                <li class="dropdown-item"><a href="#">Pré-matrícula</a></li>
                <li class="dropdown-item"><a href="#">Boletim</a></li>
                <li class="dropdown-item"><a href="#">Pagamentos</a></li>
              </ul>
            </li>
            <li><a class="nav-link  dropdown-toggle" id="navInsc" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Sala de Aula<span class="sr-only">(current)</span></a>
              <ul class="dropdown-menu" aria-labelledby="navInsc">
                <li class="dropdown-item"><a href="#">Leitura 1</a></li>
                <li class="dropdown-item"><a href="#">Leitura 2</a></li>
                <li class="dropdown-item"><a href="#">Leitura 3</a></li>
              </ul>
            </li>
            <li><a class="nav-link  dropdown-toggle" id="navInsc" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Vídeos<span class="sr-only">(current)</span></a>
              <ul class="dropdown-menu" aria-labelledby="navInsc">
                <li class="dropdown-item"><a href="#">Aula 1</a></li>
                <li class="dropdown-item"><a href="#">Aula 2</a></li>
                <li class="dropdown-item"><a href="#">Aula 3</a></li>
              </ul>
            </li>
            <li><a class="nav-link" id="navInsc" href="#"  aria-haspopup="true" aria-expanded="false">Live<span class="sr-only">(current)</span></a>
            </li>
            <li><a class="nav-link" id="navInsc" href="sair.php"  aria-haspopup="true" aria-expanded="false">SAIR</a>
            </li>
            <li class="nav-link nav-link-right"><font size="2">Aluno:&nbsp;<?php echo $_SESSION['nome']." /  Turma: ".$_SESSION['turma']; ?></font></li>
        </ul>
    </nav>
  </div>
</div>