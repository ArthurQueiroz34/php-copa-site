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
            

	$pagina = filter_input(INPUT_POST, 'pagina', FILTER_SANITIZE_NUMBER_INT);
	$qnt_result_pg = filter_input(INPUT_POST, 'qnt_result_pg', FILTER_SANITIZE_NUMBER_INT);
	//calcular o inicio visualização
	$inicio = ($pagina * $qnt_result_pg) - $qnt_result_pg;

	//consultar no banco de dados
	//filtrar o input get cujo name é user
	$busca_v = filter_input(INPUT_POST, 'pesquisa', FILTER_SANITIZE_SPECIAL_CHARS);
	if(empty($busca_v)) {
			$result_Selecoes = "SELECT * FROM Selecoes ORDER BY id DESC LIMIT $inicio, $qnt_result_pg";
			$resultado_Selecoes = mysqli_query($conexao, $result_Selecoes);
	}
	else {
			$result_Selecoes = "SELECT * FROM Selecoes WHERE pais LIKE '%$busca_v%' ORDER BY id DESC LIMIT $inicio, $qnt_result_pg";
			$resultado_Selecoes = mysqli_query($conexao, $result_Selecoes);
	}

	//Verificar se encontrou resultado na tabela "Selecoes"
	if(($resultado_Selecoes) AND ($resultado_Selecoes->num_rows != 0)){
		?>

        <div class="table-responsive">
		<table class="table table-striped table-bordered table-hover container-lg">
			<thead>
				<tr>
					<th class="align-middle">ID</th>
                    <th class="align-middle">País</th>
                    <th class="align-middle">Sigla</th>
                    <th class="align-middle">Data</th>
					<th class="align-middle text-center">Ação</th>
				</tr>
			</thead>
			<tbody>
				<?php
				while($row_Selecoes = mysqli_fetch_array($resultado_Selecoes)){
					?>
					<tr>
						<th><?php echo $row_Selecoes['id']; ?></th>
                        <td class="col-9"><?php echo $row_Selecoes['pais']; ?></td>
                        <td class="col-9"><?php echo $row_Selecoes['sigla']; ?></td>
						<td class="col-1"><?php echo $row_Selecoes['dtCadastro']; ?></td>
						<td class="text-center"><a class="btn btn-primary" href='selecoes/atualizar_selecao.php?ids=<?=$row_Selecoes['id']?>'> Alterar </a></td>
                        <td class="text-center"><a class="btn btn-danger" href='../php/selecoes/delete-selecao.php?ids=<?=$row_Selecoes['id']?>' 
						onclick="return confirm('Deseja mesmo excluir este registro?');">Apagar</a></td>
					</tr>

				<?php
				} ?>
			</tbody>
		</table>
        </div>

		<?php
		//Paginação - Somar a quantidade de usuários
		$result_pg = "SELECT COUNT(id) AS num_result FROM Selecoes";
		$resultado_pg = mysqli_query($conexao, $result_pg);
		$row_pg = mysqli_fetch_assoc($resultado_pg);

		//Quantidade de pagina
		$quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);

		//Limitar os link antes depois
		$max_links = 2;

		echo '<nav aria-label="paginacao" class="container text-center">';
		echo '<ul class="pagination">';
		echo '<li class="page-item">';
		echo "<span class='page-link'><a href='#' onclick='listar_usuario(1, $qnt_result_pg)'>Primeira</a> </span>";
		echo '</li>';
		for ($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++) {
			if($pag_ant >= 1){
				echo "<li class='page-item'><a class='page-link' href='#' onclick='listar_usuario($pag_ant, $qnt_result_pg)'>$pag_ant </a></li>";
			}
		}
		echo '<li class="page-item active">';
		echo '<span class="page-link">';
		echo "$pagina";
		echo '</span>';
		echo '</li>';

		for ($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++) {
			if($pag_dep <= $quantidade_pg){
				echo "<li class='page-item'><a class='page-link' href='#' onclick='listar_usuario($pag_dep, $qnt_result_pg)'>$pag_dep</a></li>";
			}
		}
		echo '<li class="page-item">';
		echo "<span class='page-link'><a href='#' onclick='listar_usuario($quantidade_pg, $qnt_result_pg)'>Última</a></span>";
		echo '</li>';
		echo '</ul>';
		echo '</nav>';

	}else{
		echo "<div class='container alert alert-danger' role='alert'> Seleção não encontrada!</div>";
	}
	
}
}
?>