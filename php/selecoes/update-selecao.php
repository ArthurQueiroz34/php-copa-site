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
            $id = filter_var($_POST['id'], FILTER_VALIDATE_INT);
            $pais = filter_input(INPUT_POST, 'pais');
            $sigla = filter_input(INPUT_POST, 'sigla');
            
            if(!empty($id) && !empty($pais) && !empty($sigla)) {
                $query_update = "UPDATE Selecoes SET pais = '$pais', sigla = '$sigla' WHERE id = ". $id;
                $result = mysqli_query($conexao, $query_update);
                if($result) {
                    echo true;
                }
                else {
                    echo false;
                }
            } 
            else {	
                $_SESSION['msg'] = '<div class="alert alert-warning" role="alert">
                    <i class="bx bx-error-circle" ></i> Nenhuma seleção foi selecionada. </div>';
            }
        }

    }
?>