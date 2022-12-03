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

  <title>Editar jogador</title>
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
          <li><a href="../jogadores.php">Jogadores</a></li>
        </ol>
        <h2><i class="bi bi-pencil-square"></i> ADMINISTRAÇÃO - EDITAR JOGADOR</h2>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="form_cadastro">
      <div class="container">
              

        <div class="row">
          <div class="col-lg-12">
            <form action="" method="post" role="form" id="attJog" name="form2" class="form_cadastro shadow p-5 mb-6 bg-white rounde" enctype="multipart/form-data">
              <?php
                if(isset($_SESSION['msg'])){
				          echo $_SESSION['msg'];
				          unset($_SESSION['msg']);
			          }
                
                $id = filter_input(INPUT_GET, 'idj', FILTER_SANITIZE_URL);
                $query = mysqli_query($conexao, "SELECT * FROM Jogadores WHERE id = ".$id);
                $exibe = mysqli_fetch_array($query);
              ?>
              <div class="alert alert-danger" role="alert" style="display: none;" id="cadastro_erro"></div>
              <span id="msgAlerta"></span>
              <span id="msg-error"></span>
              <div class="row">
                <div class="form-group col-lg-2">
                  <label for="id" class="form-label"><i class="bi bi-123"></i> ID do jogador</label>
                  <input type="text" name="id" class="form-control" id="id" placeholder="Digite o ID..." value="<?=$id?>" readonly="readonly" required>
                </div>
                <div class="form-group mt-3">
                    <label for="nome" class="form-label"><i class="bi bi-fonts"></i> Nome </label>
                    <input type="text" name="nome" class="form-control" id="nome" placeholder="Nome..." value="<?=$exibe['nome']?>" required>
                </div>
                <div class="form-group mt-3">
                    <label for="posicao" class="form-label"><i class="bi bi-tags"></i> Posição </label>
                    <select class="form-control form-select" name="posicao" id="posicao" required>
                      <option value="0" selected>Selecione uma posição...</option>
                      <?php
                        $query = mysqli_query($conexao, "SELECT id, posicao FROM Posicoes ORDER BY id");
                        while($exibe_posicao = mysqli_fetch_array($query)) {
                          //compara se o campo do registro é o mesmo campo da option para aparecer como selecionado
                          $selecionado = $exibe_posicao["id"] == $exibe['posicao'] ? 'selected' : '';
                          ?>
                          <option value="<?=$exibe_posicao["id"]?>" <?=$selecionado?>> <?=$exibe_posicao["posicao"]?> </option>    
                      <?php }
                      ?>
                    </select>
                </div>
                <div class="form-group mt-3">
                    <label for="posicao" class="form-label"><i class="bi bi-tags"></i> Seleção </label>
                    <select class="form-control form-select" name="selecao" id="selecao" required>
                      <option value="0" selected>Selecione uma seleção...</option>
                      <?php
                        $query = mysqli_query($conexao, "SELECT id, pais FROM Selecoes ORDER BY id");
                        while($exibe_posicao = mysqli_fetch_array($query)) {
                          //compara se o campo do registro é o mesmo campo da option para aparecer como selecionado
                          $selecionado = $exibe_posicao["id"] == $exibe['selecao'] ? 'selected' : '';
                          ?>
                          <option value="<?=$exibe_posicao["id"]?>" <?=$selecionado?>> <?=$exibe_posicao["pais"]?> </option>    
                      <?php }
                      ?>
                    </select>
                </div>
              </div>
                
              <div class="my-3"></div>
              
              <div class="row">
                <div class="col-md-6 mb-3">
                  <div class="text-center">
                    <button type="submit" id="btn_enviar" class="btn btn-success btn_cadastrar"><i class="bi bi-repeat"></i> Atualizar jogador</button>
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
                <h1 class="modal-title fs-5" id="exampleModalLabel">Adicionar jogador</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body text-success">
                O jogador foi atualizado com sucesso.
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

      $('#attJog').on('submit', function(event){
        event.preventDefault();
		    if($('#nome').val() == "") {

			    $("#msg-error").html('<div class="alert alert-danger" role="alert"><i class="bi bi-x"></i> Preencha o campo do nome.</div>');
          $("#nome").addClass('erro_campo');		
		    }
        else if($('#selecao').val() == 0) {
            
		      $("#msg-error").html('<div class="alert alert-danger" role="alert"><i class="bi bi-x"></i> Selecione uma seleção.</div>');
          $("#selecao").addClass('erro_campo');		
		    }
        else if($('#posicao').val() == 0){

          $("#msg-error").html('<div class="alert alert-danger" role="alert"><i class="bi bi-x"></i> Selecione uma posição.</div>');
          $("#posicao").addClass('erro_campo');		
        }
        else {

            //Receber os dados do formulário
            var dados = $("#attJog").serialize();
            $.post("../../php/jogadores/update-jogador.php", dados, function (retorna){
                if(retorna == 1){
                    console.log(retorna);
                    //Limpar os campos do form
                    $('#attJog')[0].reset();
                        
                    //Mensagem de cadastro com sucesso (abre o modal)
                    $('#visuMsgSucesso').modal('show');
                        
                    //Limpar mensagem de erro
                    $("#msg-error").html('');	

                    //limpar campos com erro
                    $("input").removeClass('erro_campo');
                    $("textarea").removeClass('erro_campo');
                        
                } 
                else {
                    $("#msg-error").html('<div class="alert alert-danger" role="alert"><i class="bi bi-x"></i> Erro ao atualizar o jogador: '+ retorna +'</div>');
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