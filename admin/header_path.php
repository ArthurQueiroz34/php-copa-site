<?php
  if(!isset($_SESSION)) {
    session_start();
  }
  $page = basename($_SERVER['PHP_SELF']);
?>
<!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex justify-content-between align-items-center">

      <div class="logo">
        <h1><a href="index.html">Copa do mundo 2022</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="../index.php" class="<?=($page == 'index.php') ? 'active' : ''?>">Home</a></li>
          <li><a href="../jogadores.php" class="<?=($page == 'jogadores.php') ? 'active' : ''?>">Convocação</a></li>
          <li><a href="../selecoes.php">Seleções da Copa</a></li>
          <?php 
            if(isset($_SESSION['id']) && !empty($_SESSION['id'])) { 
              $usuario_sessao = $_SESSION['id'];
              $query_busca_adm = "SELECT usuario FROM Admin WHERE id = '$usuario_sessao'";
              $query = mysqli_query($conexao, $query_busca_adm);
              $exibe_nivel = mysqli_fetch_array($query);
              //verifica se é administrador
              if($exibe_nivel['usuario'] == 'admin') {
          ?>
                <li class="dropdown">
                  <a class="<?=($page == 'administracao.php') ? 'active' : ''?>" href="administracao.php">Administração <i class="bi bi-chevron-down"></i></a>
                  <ul>
                    <li><a href="logout.php">Sair</a></li>
                  </ul>
                </li>
          <?php }
            } ?>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->