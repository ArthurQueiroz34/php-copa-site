<?php
    if(!isset($_SESSION)) {
        session_start();
    }
    include("../php/conexao.php");

    if(isset($_SESSION['id']) && !empty($_SESSION['id'])) {
          
        $usuario_sessao = $_SESSION['id'];
        $query_busca_adm = "SELECT usuario FROM Admin WHERE id = '$usuario_sessao'";
        $query = mysqli_query($conexao, $query_busca_adm);
        $exibe_nivel = mysqli_fetch_array($query);
        //verifica se é administrador
        if($exibe_nivel['usuario'] != 'admin') {
          echo 'Acesso negado';
        }
        else {
            ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Equipe - SIG-RB</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../assets/img/logo-sigrb.png" rel="icon">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Eterna - v4.8.1
  * Template URL: https://bootstrapmade.com/eterna-free-multipurpose-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>

<body>
  <!-- cabecalho -->
  <?php include("header_path.php"); ?>

    <main id="main">
    <?php      
      setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
      date_default_timezone_set('America/Sao_Paulo');    
    ?>

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">
          <ol>
            <li><a href="../index.php">Início</a></li>
            <li><a href="administracao.php">Administração</a></li>
          </ol>
          <h2><i class='bx bxs-cog'></i> PAINEL - ADMINISTRAÇÃO - EDITAR CONTEÚDO DA HOME</h2>
        </div>
    </section><!-- End Breadcrumbs -->
      
    <div class="container-fluid">
        <div class="section-title">
			<h2>Home do site</h2>
        </div>
        

        <!-- Busca -->
        <div class="container" data-aos="fade-up">
            <form action="home/listar_home.php" method="POST">
                <div class="row center mb-4">
                    <div class="col-lg-12">
                        <input type="text" class="form-control" name="pesquisa" id="pesquisa" placeholder="Pesquisar" aria-label="Search" aria-describedby="search-addon" />
                    </div>  
                </div>
            </form>
            <?php
              if(isset($_SESSION['msg'])){
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
              }
            ?>
        </div>
        <!-- Fim Busca -->
        
        <span id="conteudo"></span><br><br><br>
	</div>
		
		<script>
			var qnt_result_pg = 10; //quantidade de registro por página
			var pagina = 1; //página inicial
 
            $(document).ready(function () {
				listar_usuario(pagina, qnt_result_pg); //Chamar a função para listar os registros
			});
			
			function listar_usuario(pagina, qnt_result_pg){
                    var dados = {
                        pagina: pagina,
                        qnt_result_pg: qnt_result_pg,
                    }
                    $.post('home/listar_home.php', dados , function(retorna){
                        //Subtitui o valor no seletor id="conteudo"
                        $("#conteudo").html(retorna);
                    });
			}


            $(function() {
                $("#pesquisa").keyup(function() {
                    //recuperar valor do campo
                    var pesquisa = $(this).val();
                    if(pesquisa != '') {
                        var dados = {
                            pesquisa: pesquisa,
                            pagina: pagina,
                            qnt_result_pg: qnt_result_pg
                        }
                        $.post('home/listar_home.php', dados, function(retorna) {
                            //msotra resultados 
                            $("#conteudo").html(retorna);
                        });
                    }
                    else {
                        var dados = {
                            pagina: pagina,
                            qnt_result_pg: qnt_result_pg
                        }
                        $.post('home/listar_home.php', dados, function(retorna) {
                            //msotra resultados 
                            $("#conteudo").html(retorna);
                        });
                    }
                });
            });
		</script>
    
    </main>
    
    <?php include("php/rodape.php"); ?>

      <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
    
      <!-- Vendor JS Files -->
      <script src="../assets/vendor/purecounter/purecounter_vanilla.js"></script>
      <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
      <script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
      <script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
      <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>
      <script src="../assets/vendor/waypoints/noframework.waypoints.js"></script>
    
      <!-- Template Main JS File -->
      <script src="../assets/js/main.js"></script>
</body>
</html>
<?php
        }
    }
?>