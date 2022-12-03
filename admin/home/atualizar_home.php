<?php
    if(!isset($_SESSION)) {
        session_start();
    }
    include("../../php/conexao.php");

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

  <title>Editar conteúdo da Home - SIG-RB</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../../assets/img/logo-sigrb.png" rel="icon">
  <link href="../../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../../assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="../../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../../assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Eterna - v4.8.1
  * Template URL: https://bootstrapmade.com/eterna-free-multipurpose-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <!-- Richtext css -->
  <link rel="stylesheet" href="../../assets/dist/ui/trumbowyg.min.css">
  <link rel="stylesheet" href="../../assets/dist/plugins/emoji/ui/trumbowyg.emoji.min.css">
</head>

<body>

  <!-- cabecalho -->
  <?php include("../header_path.php"); ?>

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="../index.php">Início</a></li>
          <li><a href="../administracao.php">Administração</a></li>
          <li><a href="../home.php">Home</a></li>
        </ol>
        <h2><i class="bi bi-pencil-square"></i> ADMINISTRAÇÃO - EDITAR CONTEÚDO DA HOME</h2>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="form_cadastro">
      <div class="container">
              

        <div class="row">
          <div class="col-lg-12">
            <form action="../../php/home/update-home.php" method="post" role="form" id="attHome" name="attHome" class="form_cadastro shadow p-5 mb-6 bg-white rounde" enctype="multipart/form-data">
              <?php
                if(isset($_SESSION['msg'])){
				          echo $_SESSION['msg'];
				          unset($_SESSION['msg']);
			          }
                
                $id = filter_input(INPUT_GET, 'idh', FILTER_SANITIZE_URL);
                $query = mysqli_query($conexao, "SELECT * FROM Home WHERE id = ". $id);
                $exibe = mysqli_fetch_array($query);
              ?>
              <div class="alert alert-danger" role="alert" style="display: none;" id="cadastro_erro"></div>
              <span id="msgAlerta"></span>
              <span id="msg-error"></span>
              <div class="row">
                <div class="form-group col-lg-2">
                  <label for="id" class="form-label"><i class="bi bi-123"></i> ID </label>
                  <input type="text" name="id" class="form-control" id="id" placeholder="Digite o ID..." value="<?=$id?>" readonly="readonly" required>
                </div>
                <div class="form-group mt-3">
                    <label for="conteudo" class="form-label"><i class="bi bi-card-text"></i> Conteúdo</label>
                    <textarea class="form-control" name="conteudo" id="trumbowyg-editor" rows="5" placeholder="Digite o conteúdo..." required><?=$exibe['conteudo']?></textarea>
                </div>
              <div class="my-3"></div>
              <div class="row">
                <div class="col-md-6 mb-3">
                  <div class="text-center">
                   <input type="submit" id="btn_enviar" name="attHome" value="Atualizar Home" class="btn btn-success btn_cadastrar">
                  </div>
                </div>
                <div class="col-md-6 mb-3">
                  <div class="text-center">
                    <a class="btn btn-danger pull-right" id="a_cancel"><i class="bi bi-eraser"></i> Limpar</a>
                  </div>
                </div>
              </div>

            </form>
          </div>
        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Richtext -->
  <script src="../../assets/dist/trumbowyg.min.js"></script>
  <script src="../../assets/dist/langs/pt_br.min.js"></script>
  <script src="../../assets/dist/plugins/emoji/trumbowyg.emoji.min.js"></script>
  <script>
        $('#trumbowyg-editor').trumbowyg({
            lang: 'pt_br',
            btns: [
                ['viewHTML'],
                ['undo', 'redo'], // Only supported in Blink browsers
                ['formatting'],
                ['strong', 'em', 'del'],
                ['superscript', 'subscript'],
                ['link'],
                ['insertImage'],
                ['justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull'],
                ['unorderedList', 'orderedList'],
                ['horizontalRule'],
                ['removeformat'],
                ['fullscreen'],
                ['emoji']
            ],
            autogrow: true
        });
  </script>
  
  <!-- Vendor JS Files -->
  <script src="../../assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../../assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="../../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="../../assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="../../assets/vendor/waypoints/noframework.waypoints.js"></script>

  <script type="text/javascript" language="javascript">
    //Botão cancelar para limpar campos
    $('#a_cancel').click(function () {
      $("#titulo").val("");
      $("textarea").val("");
    });
  </script>

  <!-- Template Main JS File -->
  <script src="../../assets/js/main.js"></script>

</body>

</html>
<?php
        }
    }
?>