<?php
include "../viewparts/header_geralAdm.php";
include "../back/config.php";
session_start();
if(isset($_SESSION['acess_user'])){
	if($_SESSION['acess_user']['tipo']!="adm"){
		header("location: ../pages/clientRegister.php");
		exit();
	}
}else{
	header("location: ../");
	exit();
}
$sql='SELECT * FROM usuario';
$result = mysqli_query($conn,$sql);
?>


<hr/>
<div class="container">
	<h1 class="mb-3">Cadastro de Colaborador</h1>
	<form class="mt-2 row g-3" action="../actionpages/include_user.php" method="POST">
		<div class="mb-3 col-md-6">
			<label class="form-label">User Name</label>
			<input type="text" class="form-control" name="nome_Completo">
		</div>

		<div class="mb-3 col-md-6">
			<label class="form-label">Senha</label>
			<input type="password" class="form-control" name="Senha">
		</div>

		<button type="submit" class="btn btn-warning col-md-3">Cadastrar</button>
	</form>
</div>

<hr/>

<div class="container">
	<h1 class="mb-3">Colaboradores Cadastrados</h1>
	<table class="table">
		<thead>
			<tr>
				<th scope="col">User</th>
				<th scope="col">Ação</th>
			</tr>
		</thead>
		<tbody>
			<?php
			if (mysqli_num_rows($result) > 0) {
				while ($row = mysqli_fetch_assoc($result)) {
					if($row['tipo']!='adm'){
						?>
						<tr>
							<td><?php echo $row['name']; ?></td>
							<td>
								<a class="icon-link" href="../actionpages/delete_user.php?id=<?php echo $row['UId']; ?>" onclick="return confirm('Deseja realmente excluir esse cliente (essa ação não pode ser desfeita)?')">
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
										<path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
									</svg>
									EXCLUIR
								</a>
							</td>
						</tr>
						<?php
					}
				}
			}

			?>
			
		</tbody>
	</table>
</div>

<?php
include "../viewparts/footer.php";
?>