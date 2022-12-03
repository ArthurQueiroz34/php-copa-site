<?php
  $page = basename($_SERVER['PHP_SELF']);
?>
<!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex justify-content-between align-items-center">

      <div class="logo">
        <h1><a href="index.php">Copa do mundo 2022</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.php"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="index.php" class="<?=($page == 'index.php') ? 'active' : ''?>">Home</a></li>
          <li><a href="jogadores.php" class="<?=($page == 'jogadores.php') ? 'active' : ''?>">Convocação</a></li>
          <li><a href="selecoes.php" class="<?=($page == 'selecoes.php') ? 'active' : ''?>">Seleções da Copa</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->