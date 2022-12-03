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
            $id = filter_input(INPUT_GET, 'ids', FILTER_SANITIZE_NUMBER_INT);
            if(!empty($id)) {
                mysqli_query($conexao, "DELETE FROM Selecoes WHERE id = ".$id);

                if(mysqli_affected_rows($conexao)) {
                    $_SESSION['msg'] = '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="bx bx-check" ></i> Seleção apagada.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                    header("location:../../admin/selecoes.php");
                }
                else {
                    
                    $_SESSION['msg'] = '<div class="alert alert-danger" role="alert">
                        <i class="bx bx-error-circle" ></i> Erro: a seleção não foi apagada.</div>';
                    header("location:../../admin/selecoes.php");
                }
            } 
            else {	
                $_SESSION['msg'] = '<div class="alert alert-warning" role="alert">
                    <i class="bx bx-error-circle" ></i> Nenhuma seleção foi selecionada.</p>';
                header("location:../../admin/selecoes.php");
            }
        }
    }
?>