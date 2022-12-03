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
            //Receber dados do formulário
            $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

            //var_dump($dados);
            //Verificar se os selects não foram preenchidos, pois afetaria o inner join
            
                //Verificar se o usuário clicou no botão
                if(!empty($dados['attHome'])) {

                    include_once "../conexao_pdo.php";

                    //Atualizar a tabela de metadados no BD
                    $result_home = "UPDATE Home SET conteudo=:conteudo WHERE id=:home_id";
                    
                    $update_home = $conn->prepare($result_home);
                    $update_home->bindParam(':conteudo', $dados['conteudo'], PDO::PARAM_STR);
                    $update_home->bindParam(':home_id', $dados['id'], PDO::PARAM_INT);
                    //$update_home->execute();

                    //$update_coordenada->execute();

                    if($update_home->execute()) {
                              
                      $_SESSION['msg'] = '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                                  <i class="bx bx-check" ></i> Home atualizada com sucesso.
                                                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                              </div>';
                      header("Location: ../../admin/home.php");
                        
                    }
                    else {
                      $_SESSION['msg'] = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                              <i class="bx bx-error-circle" ></i> Erro: não foi possível atualizar os dados.
                                              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                          </div>';
                      header("Location: ../../admin/home.php");
                    }

                }
                else {
                  $_SESSION['msg'] =  '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                          <i class="bx bx-error-circle" ></i> Erro: há campos vazios.
                                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                      </div>';
                  header("Location: ../../admin/home.php");
                }
            
        }
    }
?>