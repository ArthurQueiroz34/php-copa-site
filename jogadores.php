<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Copa do Mundo - Jogadores</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Eterna - v4.9.1
  * Template URL: https://bootstrapmade.com/eterna-free-multipurpose-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
  <!-- Cabeçalho -->
  <?php include_once("header.php"); ?>
          <!-- ======= Breadcrumbs ======= -->
          <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">
  
          <ol>
            <li><a href="index.php">Início</a></li>
            <li>Jogadores</li>
          </ol>
          <h2><i class='bx bx-football'></i> JOGADORES CONVOCADOS</h2>
  
        </div>
    </section><!-- End Breadcrumbs -->
  <!-- Conteúdo da Home -->
  <?php
    include_once("php/conexao.php");
    $query = "SELECT J.nome, P.posicao, S.pais FROM Jogadores J 
    INNER JOIN Posicoes P ON P.id = J.posicao 
    INNER JOIN Selecoes S ON S.id = J.selecao
    ORDER BY S.pais";
    $query_jogadores = mysqli_query($conexao, $query);

  ?>
  <div class="list-group container text-center">  
        
        <h6><?php 
                echo '<div class="section-title">
                <h2>Jogadores</h2>
              </div>';
              ?>
        </h6>
    <div class="table-responsive mb-3">
		<table class="table table-striped table-bordered table-hover container-lg tb-selecoes">
			<thead class="thead-primary">
				<tr>
                    <th class="align-middle">Jogador</th>
                    <th class="align-middle">Posição</th>
                    <th class="align-middle">Seleção</th>
				</tr>
			</thead>
			<tbody>
				<?php
				while($exibe = mysqli_fetch_array($query_jogadores)){
					?>
					<tr>
                        <td class="col-9 fw-bold">
                            <?=$exibe['nome']?>
                        </td>
                        <td class="fw-bold">
                            <?=$exibe['posicao']?>
                        </td>
                        <td class="fw-bold">
                            <?=$exibe['pais']?>
                        </td>
					</tr>

				<?php
				} ?>
			</tbody>
		</table>
    </div>

            </div>

  <!-- Rodapé -->
  <?php include_once("footer.php"); ?>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>