<?php
    if(!isset($_SESSION)) {
        session_start();
    }
	include_once "../../php/conexao.php";

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

  <title>Editar seleção</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
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
</head>

<body>

  <!-- cabecalho -->
  <?php include("../header_path.php"); ?>


  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="../../index.php">Início</a></li>
          <li><a href="../administracao.php">Administração</a></li>
          <li><a href="../selecoes.php">Seleções</a></li>
        </ol>
        <h2><i class="bi bi-pencil-square"></i> ADMINISTRAÇÃO - EDITAR SELEÇÃO</h2>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="form_cadastro">
      <div class="container">
              

        <div class="row">
          <div class="col-lg-12">
            <form action="" method="post" role="form" id="attSel" name="form2" class="form_cadastro shadow p-5 mb-6 bg-white rounde" enctype="multipart/form-data">
              <?php
                if(isset($_SESSION['msg'])){
				          echo $_SESSION['msg'];
				          unset($_SESSION['msg']);
			          }

                $id = filter_input(INPUT_GET, 'ids', FILTER_SANITIZE_URL);
                $query = mysqli_query($conexao, "SELECT * FROM Selecoes WHERE id = ".$id);
                $exibe = mysqli_fetch_array($query);
              ?>
              <div class="alert alert-danger" role="alert" style="display: none;" id="cadastro_erro"></div>
              <span id="msgAlerta"></span>
              <span id="msg-error"></span>
              <div class="row">
                <div class="form-group col-lg-2">
                  <label for="id" class="form-label"><i class="bi bi-123"></i> ID da seleção</label>
                  <input type="text" name="id" class="form-control" id="id" placeholder="Digite o ID..." value="<?=$id?>" readonly="readonly" required>
                </div>
                <div class="form-group mt-3">
                    <label for="pais" class="form-label"><i class="bi bi-fonts"></i> País </label>
                    <input type="text" name="pais" class="form-control" id="pais" placeholder="Nome..." value="<?=$exibe['pais']?>" required>
                </div>
                <div class="form-group mt-3">
                    <label for="sigla" class="form-label"><i class="bi bi-fonts"></i> Sigla (ex: CBF) </label>
                    <input type="text" name="sigla" class="form-control" id="sigla" placeholder="Sigla..." value="<?=$exibe['sigla']?>" required>
                </div>
              </div>
                
              <div class="my-3"></div>
              
              <div class="row">
                <div class="col-md-6 mb-3">
                  <div class="text-center">
                    <button type="submit" id="btn_enviar" class="btn btn-success btn_cadastrar"><i class="bi bi-repeat"></i> Atualizar seleção</button>
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

        <!-- Modal de mensagem de sucesso -->
        <div class="modal fade" id="visuMsgSucesso" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Adicionar seleção</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body text-success">
                A seleção foi atualizada com sucesso.
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Fechar</button>
              </div>
            </div>
          </div>
        </div>
        <!-- Fim Modal de mensagem de sucesso -->

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="../../assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../../assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="../../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="../../assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="../../assets/vendor/waypoints/noframework.waypoints.js"></script>

  <script type="text/javascript" language="javascript">
    $(document).ready(function() {

      $('#attSel').on('submit', function(event){
        event.preventDefault();
		    if($('#pais').val() == "") {

			    $("#msg-error").html('<div class="alert alert-danger" role="alert"><i class="bi bi-x"></i> Preencha o campo do nome.</div>');
          $("#pais").addClass('erro_campo');		
		    }
        else if($('#sigla').val() == ""){

          $("#msg-error").html('<div class="alert alert-danger" role="alert"><i class="bi bi-x"></i> Selecione uma posição.</div>');
          $("#sigla").addClass('erro_campo');		
        }
        else {

            //Receber os dados do formulário
            var dados = $("#attSel").serialize();
            $.post("../../php/selecoes/update-selecao.php", dados, function (retorna){
                if(retorna == 1){
                    console.log(retorna);
                    //Limpar os campos do form
                    $('#attSel')[0].reset();
                        
                    //Mensagem de cadastro com sucesso (abre o modal)
                    $('#visuMsgSucesso').modal('show');
                        
                    //Limpar mensagem de erro
                    $("#msg-error").html('');	

                    //limpar campos com erro
                    $("input").removeClass('erro_campo');
                    $("textarea").removeClass('erro_campo');
                        
                } 
                else {
                    $("#msg-error").html('<div class="alert alert-danger" role="alert"><i class="bi bi-x"></i> Erro ao atualizar: '+ retorna +'</div>');
                }
            });
        }
	  });

      //Botão cancelar para limpar campos
      $('#a_cancel').click(function () {
        $("input").val("");
        $("textarea").val("");
        $("select").val("0");
      });

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