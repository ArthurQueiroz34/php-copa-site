<?php
$erro_show = '';
include("../php/conexao.php");
if(isset($_POST['usuario']) || isset($_POST['senha'])) {
  
  if(strlen($_POST['usuario']) == 0) {
    $erro_show = '<div class="alert alert-danger" role="alert" style="display: block;" id="msg_erro">
                        <i class="bx bxs-message-alt-x"></i> Preencha seu usuário.
                  </div>';
  } 
  else if(strlen($_POST['senha']) == 0) {
    $erro_show = '<div class="alert alert-danger" role="alert" style="display: block;" id="msg_erro">
                    <i class="bx bxs-message-alt-x"></i> Preencha sua senha.
                  </div>';
  } 
  else {
    $login = mysqli_real_escape_string($conexao, $_POST['usuario']);
    $senha = mysqli_real_escape_string($conexao, $_POST['senha']);

    $sql_code = "SELECT * FROM Admin WHERE usuario = '$login' AND senha = '$senha' LIMIT 1";
    $sql_exec = mysqli_query($conexao, $sql_code) or die("Falha na conexão");

    $quantidade = $sql_exec->num_rows;

    if($quantidade == 1) {
      $usuario = $sql_exec->fetch_assoc();
      
      //se não houver uma nova sessão, começo uma
      if(!isset($_SESSION)) {
        session_start();
      }

      $_SESSION['id'] = $usuario['id'];

      header("location:administracao.php");
      
    }

    else {
      $erro_show = '<div class="alert alert-danger" role="alert" style="display: block;" id="msg_erro">
                      <i class="bx bxs-message-alt-x"></i> Erro ao fazer login: usuario ou senha incorretos.
                    </div>';
    }
  }

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Login</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../assets/img/favicon.png" rel="icon">
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
  * Template Name: Eterna - v4.9.1
  * Template URL: https://bootstrapmade.com/eterna-free-multipurpose-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>
<body>
<?php 
    include_once("header_path.php"); 
?>

<main id="main">

  <!-- ======= Breadcrumbs ======= -->
  <section id="breadcrumbs" class="breadcrumbs">
    <div class="container">
      <h2>LOGIN NO PAINEL DE ADMINISTRADOR</h2>
    </div>
  </section><!-- End Breadcrumbs -->

<!-- LOGIN -->

  <section class="vh-50">
    <div class="container col-lg-6">
      <form action="" method="POST">
        <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
          <p class="lead fw-bold mb-0 me-3">Login como administrador</p>
        </div>
        <?php echo $erro_show ?>

        <!-- usuario input -->
        <div class="form-outline mb-4">
          <input type="usuario" id="form3Example3" name="usuario" class="form-control form-control-lg"
            placeholder="Usuário" />
          <!--label class="form-label" for="form3Example3">usuario</label -->
        </div>
        
        <!-- Password input -->
        <div class="form-outline mb-3">
          <input type="password" id="form3Example4" name="senha" class="form-control form-control-lg"
            placeholder="Senha" />
          <!--label class="form-label" for="form3Example4">Senha</label -->
        </div>

        <div class="d-flex justify-content-between align-items-center">
          <button type="submit" class="btn btn-primary btn-lg" id="btn_logar">Logar</button>
        </div>
      </form>
    </div>
  </section>

<!-- FIM LOGIN -->
</main><!-- End #main -->
</body>
</html>