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
            
            $posicao = filter_input(INPUT_POST, 'posicao');
            if(!empty($posicao)) {
                mysqli_query($conexao, "INSERT INTO Posicoes(posicao, dtCadastro) VALUES('$posicao', NOW())");

                /*if(mysqli_insert_id($conexao)) {
                    echo true;
                }
                else {
                    
                    $_SESSION['msg'] = '<div class="alert alert-danger" role="alert">
                        <i class="bx bx-error-circle" ></i> Erro: a notícia não foi cadastrada.</div>';
                    //header("location:../../biblioteca_adm/cadastrar_noticia.php");
                }*/
            } 
            else {	
                echo "Há campos vazios.";
            }

            if(mysqli_insert_id($conexao)) {
                echo true;
            }
            else {
                echo false;
            }
        }

    }
?>