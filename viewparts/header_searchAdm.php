<!doctype html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SisMeta</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<link rel="icon" type="image/x-icon" href="../img/favicon.ico">
</head>
<body data-bs-theme="dark">

	<nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
		<div class="container-fluid">
			<a class="navbar-brand" href="../pages/clientList_admin.php">
				<img src="../img/metalogo.png" alt="Logo" width="150" height="50" class="d-inline-block align-text-top">
			</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav me-2">
					<!--<li class="nav-item">
						<a class="nav-link disabled" href="../pages/dashboard_admin.php">Dashboard</a>
					</li>-->
					<li class="nav-item">
						<a class="nav-link" href="../pages/clientList_admin.php">Lista de Clientes</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="../pages/clientRegister_admin.php">Cadastro de Clientes</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="../pages/addUser_admin.php">Adicionar Colaborador</a>
					</li>
					<!--<li class="nav-item">
						<a class="nav-link disabled" aria-disabled="true">Cadastro Offline</a>
					</li>-->
				</ul>
				<form class="d-flex me-2" role="search">
					<input class="form-control me-2" id="buscar" type="search" placeholder="Buscar" aria-label="Search">
					<!--<button class="btn btn-outline-primary me-2" type="submit">Buscar</button>-->
				</form>
				<form action="../back/logout.php" method="POST">
					<button class="btn btn-outline-danger mr-2" type="submit">Sair</button>
				</form>

			</div>
		</div>
	</nav>