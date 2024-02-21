<?php


include "./viewparts/login_header.php";

?>



<section class="vh-100" style="background-color: #f2f2f2;">
	<div class="container py-5 h-100">
		<div class="row d-flex justify-content-center align-items-center h-100">
			<div class="col-12 col-md-8 col-lg-6 col-xl-5">
				<div class="card shadow-2-strong" style="border-radius: 1rem;">
					<div class="card-body p-5 text-center">

						<img src="./img/metalogo.png" alt="Logo" width="300" height="100" class="d-inline-block align-text-top mb-4">
						<form autocomplete="off" action="./back/login.php" method="POST">
							<div class="form-outline mb-4">
								<input type="text"  class="form-control form-control-lg" name="usuario" />
								<label class="form-label" >Usuário</label>
							</div>

							<div class="form-outline mb-4">
								<input type="password" class="form-control form-control-lg" name="senha"/>
								<label class="form-label" >Senha</label>
							</div>
							<input type="submit" class="btn btn-outline-success btn-lg btn-block" name="entrar" value="Entrar">
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>




<?php


include "./viewparts/footer.php";

?>