<?php
include "../viewparts/header_geralCol.php";
include "../back/config.php";
session_start();
if(isset($_SESSION['acess_user'])){
  if($_SESSION['acess_user']['tipo']!="col"){
    header("location: ../pages/clientRegister_admin.php");
    exit();
  }
}else{
  header("location: ../");
  exit();
}
if(isset($_GET['id'])){
	$id_cliente = $_GET['id'];
	$sql_client = "SELECT * FROM cliente WHERE CId = '$id_cliente'";
	$result_cliente = mysqli_query($conn,$sql_client);
	if (mysqli_num_rows($result_cliente) > 0) {
		$row_client = mysqli_fetch_assoc($result_cliente);
		$cliente_enderecoInfo = $row_client['Endereco'];
		$cliente_LocalInfo = $row_client['InfoLocal'];
		$cliente_responsavelTecnico = $row_client['RespTec'];
		$cliente_visita = $row_client['Visita'];
		?>
		<h1 class="mb-3">Cadastro de Clientes</h1>
		<hr/>
		<div class="container">
			<form class="mt-2 row g-3" action="../actionpages/update_cliente.php?idd=<?php echo $id_cliente;?>" method="POST" enctype="multipart/form-data">
				<!--Info dos clientes-->
				<h4>Informações do Cliente</h4>
				<div class="mb-3 col-md-6">
					<label class="form-label">Nome Completo</label>
					<input type="text" class="form-control" name="nome_Completo" value="<?php echo $row_client['Nome'];?>">
				</div>

				<div class="mb-3 col-md-6">
					<label class="form-label">Responsável</label>
					<input type="text" class="form-control" name="Responsavel" value="<?php echo $row_client['Responsavel'];?>">
				</div>

				<?php if($row_client['Tipo'] == "CPF"){?>

					<label class="form-label col-md-4">Tipo de Cliente</label>
					<div class="form-check col-md-4">
						<input class="form-check-input" type="radio" name="Info_Radio" value="CPF" checked>
						<label class="form-check-label">
							CPF
						</label>
					</div>
					<div class="form-check col-md-4">
						<input class="form-check-input" type="radio" name="Info_Radio" value="CNPJ">
						<label class="form-check-label">
							CNPJ
						</label>
					</div>

					<?php
				}else{
					?>
					<label class="form-label col-md-4">Tipo de Cliente</label>
					<div class="form-check col-md-4">
						<input class="form-check-input" type="radio" name="Info_Radio" value="CPF" >
						<label class="form-check-label">
							CPF
						</label>
					</div>
					<div class="form-check col-md-4">
						<input class="form-check-input" type="radio" name="Info_Radio" value="CNPJ" checked>
						<label class="form-check-label">
							CNPJ
						</label>
					</div>
					<?php
				}
				?>



				<div class="mb-3 col-md-4">
					<label class="form-label">CPF/CNPJ</label>
					<input type="text" class="form-control" name="CPF_CNPJ" value="<?php echo $row_client['Documento'];?>">
				</div>

				<div class="mb-3 col-md-4">
					<label class="form-label">Email</label>
					<input type="email" class="form-control" name="Client_Email" value="<?php echo $row_client['Email'];?>">
				</div>

				<div class="mb-3 col-md-4">
					<label class="form-label">Telefone</label>
					<input type="text" class="form-control" name="Client_Phone" value="<?php echo $row_client['Telefone'];?>">
				</div>

				<hr/>
				<!--RESPTEcnico-->
				<h4>Responsável Técnico</h4>
				<?php
				$sql_respTecn = "SELECT * FROM tecnico_responsavel WHERE RId='$cliente_responsavelTecnico'";
				$result_respTecn = mysqli_query($conn,$sql_respTecn);
				$row_respTecn = mysqli_fetch_assoc($result_respTecn);
				?>

				<div class="mb-3 col-md-6">
					<label class="form-label">Empresa</label>
					<input type="text" class="form-control" name="Empresa_Responsavel" value="<?php echo $row_respTecn['Empresa'];?>">
				</div>

				<div class="mb-3 col-md-6">
					<label class="form-label">CNPJ</label>
					<input type="text" class="form-control" name="CNPJ_Responsavel" value="<?php echo $row_respTecn['CNPJ'];?>">
				</div>

				<div class="mb-3 col-md-4">
					<label class="form-label">Responsável</label>
					<input type="text" class="form-control" name="Pessoa_Responsavel" value="<?php echo $row_respTecn['Responsavel'];?>">
				</div>

				<div class="mb-3 col-md-4">
					<label class="form-label">Telefone</label>
					<input type="text" class="form-control" name="Responsavel_Phone" value="<?php echo $row_respTecn['telefone'];?>">
				</div>

				<div class="mb-3 col-md-4">
					<label class="form-label">Email</label>
					<input type="email" class="form-control" name="Responsavel_Mail" value="<?php echo $row_respTecn['email'];?>">
				</div>




				<hr/>

				<!--Endereco-->
				<h4>Endereço</h4>
				<?php
				$sql_endereco = "SELECT * FROM endereco WHERE EId='$cliente_enderecoInfo'";
				$result_endereco = mysqli_query($conn,$sql_endereco);
				$row_endereco = mysqli_fetch_assoc($result_endereco);
				?>
				<div class="mb-3 col-md-3">
					<label class="form-label">CEP</label>
					<input type="text" id="cep" class="form-control" name="CEP" value="<?php echo $row_endereco['CEP'];?>">
				</div>
				<div class="mb-3 col-md-5">
					<label class="form-label">Logradouro</label>
					<input type="text" id="logradouro" class="form-control" name="Logradouro" value="<?php echo $row_endereco['Logradouro'];?>">
				</div>

				<div class="mb-3 col-md-4">
					<label class="form-label">Número</label>
					<input type="text" class="form-control" name="numero_Endereco" value="<?php echo $row_endereco['numero'];?>">
				</div>

				<div class="mb-3 col-md-3">
					<label class="form-label">Complemento</label>
					<input type="text" id="complemento" class="form-control" name="complemento_Endereco" value="<?php echo $row_endereco['Complemento'];?>">
				</div>
				<div class="mb-3 col-md-3">
					<label class="form-label">Bairro</label>
					<input type="text" id="bairro" class="form-control" name="bairro_Endereco" value="<?php echo $row_endereco['Bairro'];?>">
				</div>
				<div class="mb-3 col-md-3">
					<label class="form-label">Cidade</label>
					<input type="text" id="cidade" class="form-control" name="cidade_Endereco" value="<?php echo $row_endereco['Cidade'];?>">
				</div>
				<div class="mb-3 col-md-3">
					<label class="form-label">Estado</label>
					<input type="text" id="uf" class="form-control" name="estado_Endereco" value="<?php echo $row_endereco['Estado'];?>">
				</div>
				<hr/>
				<!--InfoLocias-->
				<h3>Informações Locais</h3>
				<?php
				$sql_localInfo = "SELECT * FROM local_info WHERE LId='$cliente_LocalInfo'";
				$result_localInfo = mysqli_query($conn,$sql_localInfo);
				$row_localInfo = mysqli_fetch_assoc($result_localInfo);
				$info_padraoEntrada = $row_localInfo['Padrao_entrada'];
				$info_localInsta = $row_localInfo['Local_insta'];
				$info_equipamento = $row_localInfo['Equipamento'];

				$sql_padraoEntrada = "SELECT * FROM padrao_entrada WHERE PEId='$info_padraoEntrada'";
				$result_padraoEntrada = mysqli_query($conn,$sql_padraoEntrada);
				$row_padraoEntrada = mysqli_fetch_assoc($result_padraoEntrada);
				?>
				<hr/>
				<h4>Padrão de Entrada</h4>
				<div class="mb-3 col-md-12">
					<label class="form-label">Concessionária</label>
					<input type="text" class="form-control" name="concessionaria" value="<?php echo $row_padraoEntrada['Concessionaria'];?>">
				</div>

				<?php
				if($row_padraoEntrada['Demanda'] == "Sim"){
					?>

					<label class="form-label col-md-3">Demanda Contratada</label>
					<div class="form-check col-md-3">
						<input class="form-check-input" type="radio" name="Demanda_Radio" id="DemandaRadio1" value="Sim" checked>
						<label class="form-check-label">
							Sim
						</label>
					</div>
					<div class="form-check col-md-3">
						<input class="form-check-input" type="radio" name="Demanda_Radio" id="DemandaRadio2" value="Nao">
						<label class="form-check-label">
							Não
						</label>
					</div>

					<?php
				}else{
					?>	
					<label class="form-label col-md-3">Demanda Contratada</label>
					<div class="form-check col-md-3">
						<input class="form-check-input" type="radio" name="Demanda_Radio" id="DemandaRadio1" value="Sim" >
						<label class="form-check-label">
							Sim
						</label>
					</div>
					<div class="form-check col-md-3">
						<input class="form-check-input" type="radio" name="Demanda_Radio" id="DemandaRadio2" value="Nao" checked>
						<label class="form-check-label">
							Não
						</label>
					</div>
					<?php
				}
				?>

				<div class="mb-3 col-md-3">
					<label class="form-label">Valor do Contrato</label>
					<input type="text" class="form-control" name="valor_Contrato" value="<?php echo $row_padraoEntrada['Valor_contrato'];?>">
				</div>
				<div class="mb-3 col-md-3 form-floating">
					<select class="form-select" id="floatingSelect" name="tipo_cliente" aria-label="Floating label select example">
						<option value="<?php echo $row_padraoEntrada['Tipo'];?>" selected><?php echo $row_padraoEntrada['Tipo'];?></option>
						<option value="A1">A1</option>
						<option value="A2">A2</option>
						<option value="A3">A3</option>
						<option value="A4">A4</option>
						<option value="A5">A5</option>
						<option value="B1">B1</option>
						<option value="B2">B2</option>
						<option value="B3">B3</option>
						<option value="B4">B4</option>
					</select>
					<label for="floatingSelect">Tipo de Cliente</label>
				</div>

				<div class="mb-3 col-md-3 form-floating">
					<select class="form-select" name="tipo_ligacao" id="floatingSelect2" aria-label="Floating label select example">
						<option value="<?php echo $row_padraoEntrada['Ligacao'];?>" selected><?php echo $row_padraoEntrada['Ligacao'];?></option>
						<option value="Mono">Monofásico</option>
						<option value="Bi">Bifásico</option>
						<option value="Tri">Trifásico</option>
					</select>
					<label for="floatingSelect2">Tipo de Ligação</label>
				</div>

				<div class="mb-3 col-md-3 form-floating">
					<select class="form-select" name="tesao_nominal" id="floatingSelect3" aria-label="Floating label select example">
						<option value="<?php echo $row_padraoEntrada['Tensao'];?>" selected><?php echo $row_padraoEntrada['Tensao'];?>V</option>
						<option value="220">220V</option>
						<option value="127">127V</option>
					</select>
					<label for="floatingSelect3">Tensão Nominal</label>
				</div>

				<div class="mb-3 col-md-3 form-floating">
					<select class="form-select" name="modelo_medidor" id="floatingSelect4" aria-label="Floating label select example">
						<option value="<?php echo $row_padraoEntrada['Model_medidor'];?>" selected><?php echo $row_padraoEntrada['Model_medidor'];?></option>
						<option value="digital">Digital</option>
						<option value="analogico">Analógico</option>
					</select>
					<label for="floatingSelect4">Modelo do Medidor</label>
				</div>

				<div class="mb-3 col-md-10">
					<label class="form-label">Observação sobre o Medidor</label>
					<input type="textarea" class="form-control" name="observacao_Medidor" value="<?php echo $row_padraoEntrada['Obs_medidor'];?>">
				</div>

				<div class="mb-3 col-md-2">
					<label class="form-label">Corrente do Disjuntor</label>
					<input type="text" class="form-control" name="corrente_Disjuntor" value="<?php echo $row_padraoEntrada['Corrente_Disj'];?>">
				</div>
				<?php
				if($row_padraoEntrada['Aterramento'] == "Sim"){
					?>
					<label class="form-label col-md-2">Existe Aterramento?</label>
					<div class="form-check col-md-2">
						<input class="form-check-input" type="radio" name="Aterramento_Radio" value="Sim" checked>
						<label class="form-check-label" >
							Sim
						</label>
					</div>
					<div class="form-check col-md-2">
						<input class="form-check-input" type="radio" name="Aterramento_Radio" value="Nao">
						<label class="form-check-label">
							Não
						</label>
					</div>
					<?php
				}else{
					?>
					<label class="form-label col-md-2">Existe Aterramento?</label>
					<div class="form-check col-md-2">
						<input class="form-check-input" type="radio" name="Aterramento_Radio" value="Sim">
						<label class="form-check-label" >
							Sim
						</label>
					</div>
					<div class="form-check col-md-2">
						<input class="form-check-input" type="radio" name="Aterramento_Radio" value="Nao" checked>
						<label class="form-check-label">
							Não
						</label>
					</div>
					<?php
				}
				?>
				<div class="mb-3 col-md-6 form-floating">
					<select class="form-select mb-3" id="floatingSelect5" aria-label="Floating label select example" name="condicao_geral">
						<option value="<?php echo $row_padraoEntrada['Condicao'];?>" selected><?php echo $row_padraoEntrada['Condicao'];?></option>
						<option value="boa">Boa</option>
						<option value="adequar">Adequar</option>
					</select>
					<label for="floatingSelect5">Condição da Caixa</label>
				</div>

				<div class="mb-3 col-md-4">
					<label class="form-label">Altura da Caixa</label>
					<input type="text" class="form-control" name="altura_Caixa" value="<?php echo $row_padraoEntrada['altura_caixa'];?>">
				</div>
				<div class="mb-3 col-md-4">
					<label class="form-label">Largura da Caixa</label>
					<input type="text" class="form-control" name="largura_Caixa" value="<?php echo $row_padraoEntrada['largura_caixa'];?>">
				</div>
				<div class="mb-3 col-md-4">
					<label class="form-label">Bitola do Cabo</label>
					<input type="text" class="form-control" name="bitola_Cabo" value="<?php echo $row_padraoEntrada['bitola_cabo'];?>">
				</div>

				<!--<div class="input-group mb-3">
					<label class="input-group-text" >Enviar Imagem</label>
					<input type="file" class="form-control" name="Caixa_images">
				</div>-->

				<hr/>
				<!--Pode ter mais de um LEMBRARRR-->
				<div class="mt-2 row g-3" id="todosQuadros">
					<?php
					$sql_quadros = "SELECT * FROM quadros WHERE ClientId='$id_cliente'";
					$result_quadros = mysqli_query($conn,$sql_quadros);
					if(mysqli_num_rows($result_quadros)>0){
						$contador_quadro = 1;
						while ($row_quadros = mysqli_fetch_assoc($result_quadros)) {
							?>

							<h4>Quadro de Energia <?php echo $contador_quadro;?></h4>
							<div class="mb-3">
								<label  class="form-label">Corrente do Disjuntor</label>
								<input type="text" class="form-control" name="correteDisjQ[<?php echo $contador_quadro;?>]" value="<?php echo $row_quadros['Corrente_Disjuntor'];?>">
							</div>
							<div class="mb-3 col-md-6 form-floating">
								<select class="form-select" name="condGeralQ[<?php echo $contador_quadro;?>]"  id="floatingSelect6<?php echo $contador_quadro;?>" aria-label="Floating label select example">
									<option value="<?php echo $row_quadros['condicoes'];?>" selected><?php echo $row_quadros['condicoes'];?></option>
									<option value="boa">Boa</option>
									<option value="ruim">Ruim</option>
								</select>
								<label for="floatingSelect6<?php echo $contador_quadro;?>">Condição do Quadro</label>
							</div>
							<div class="mb-3 col-md-6 form-floating">
								<select class="form-select" name="espaDispoQ[<?php echo $contador_quadro;?>]" id="floatingSelect7<?php echo $contador_quadro;?>" aria-label="Floating label select example">
									<option value="<?php echo $row_quadros['espaco_disp'];?>" selected><?php echo $row_quadros['espaco_disp'];?></option>
									<option value="Sim">Sim</option>
									<option value="Nao">Não</option>
								</select>
								<label for="floatingSelect7<?php echo $contador_quadro;?>">Espaço Disponível</label>
							</div>
							<div class="mb-3 col-md-6 form-floating">
								<select class="form-select" name="aterramentoQ[<?php echo $contador_quadro;?>]" id="floatingSelect8<?php echo $contador_quadro;?>" aria-label="Floating label select example">
									<option value="<?php echo $row_quadros['aterramento'];?>" selected><?php echo $row_quadros['aterramento'];?></option>
									<option value="Sim">Sim</option>
									<option value="Nao">Não</option>
								</select>
								<label for="floatingSelect8<?php echo $contador_quadro;?>">Aterramento</label>
							</div>
							<div class="mb-3 col-md-6 form-floating">
								<select class="form-select" name="dutoLivreQ[<?php echo $contador_quadro;?>]" id="floatingSelect9<?php echo $contador_quadro;?>" aria-label="Floating label select example">
									<option value="<?php echo $row_quadros['duto_livre'];?>" selected><?php echo $row_quadros['duto_livre'];?></option>
									<option value="Sim">Sim</option>
									<option value="Nao">Não</option>
								</select>
								<label for="floatingSelect9<?php echo $contador_quadro;?>">Dutos Livres</label>
							</div>
							<hr/>
							<?php
							$contador_quadro++;
						}
					}
					?>
				</div>
				<!--<div class="input-group mb-3">
					<label class="input-group-text" >Enviar Imagem</label>
					<input type="file" class="form-control" name="quadro_images">
				</div>-->


				<button type="button" onclick="addQuadro()" class="btn btn-success col-md-2">Incluir outro Quadro</button>


				<hr/>
				<?php
				$sql_localInsta = "SELECT * FROM local_instal WHERE LIId='$info_localInsta'";
				$result_localInsta = mysqli_query($conn,$sql_localInsta);
				$row_localInsta = mysqli_fetch_assoc($result_localInsta);
				?>
				<h4>Local de Instalação</h4>
				<div class="mb-3 form-floating">
					<select class="form-select" name="local_instalacao" id="floatingSelect10" aria-label="Floating label select example">
						<option value="<?php echo $row_localInsta['local'];?>" selected><?php echo $row_localInsta['local'];?></option>
						<option value="Telhado">Telhado</option>
						<option value="Laje">Laje</option>
						<option value="Solo">Solo</option>
					</select>
					<label for="floatingSelect10">Local da Instalação</label>
				</div>

				<div class="mb-3">
					<label class="form-label">Idade</label>
					<input type="text" class="form-control" name="idade_Local" value="<?php echo $row_localInsta['Idade'];?>">
				</div>

				<div class="mb-3 col-md-6 form-floating">
					<select class="form-select" name="material_local" id="floatingSelect11" aria-label="Floating label select example">
						<option value="<?php echo $row_localInsta['Material'];?>" selected><?php echo $row_localInsta['Material'];?></option>
						<option value="madeira">Madeira</option>
						<option value="metalica">Matálica</option>
					</select>
					<label for="floatingSelect11">Material</label>
				</div>
				<div class="mb-3 col-md-6 form-floating">
					<select class="form-select" name="condicao_local" id="floatingSelect12" aria-label="Floating label select example">
						<option value="<?php echo $row_localInsta['condicoes'];?>" selected><?php echo $row_localInsta['condicoes'];?></option>
						<option value="boa">Boa</option>
						<option value="ruim">Ruim</option>
					</select>
					<label for="floatingSelect12">Condição Geral</label>
				</div>
				<div class="mb-3 col-md-6 form-floating">
					<select class="form-select" name="nivel_solo" id="floatingSelect13" aria-label="Floating label select example">
						<option value="<?php echo $row_localInsta['nivel_solo'];?>" selected><?php echo $row_localInsta['nivel_solo'];?></option>
						<option value="plano">Plano</option>
						<option value="inclinado">Inclinado</option>
					</select>
					<label for="floatingSelect13">Nivelamento do Solo</label>
				</div>
				<div class="mb-3 col-md-6 form-floating">
					<select class="form-select" name="tipo_solo" id="floatingSelect14" aria-label="Floating label select example">
						<option value="<?php echo $row_localInsta['tipo_solo'];?>" selected><?php echo $row_localInsta['tipo_solo'];?></option>
						<option value="concretoLoc">Concreto</option>
						<option value="terraLoc">Terra</option>
						<option value="gramadoLoc">Gramado</option>
						<option value="argilosoLoc">Argiloso</option>
						<option value="arenosoLoc">Arenoso</option>
						<option value="pedregulhoLoc">Pedregulho</option>
					</select>
					<label for="floatingSelect14">Tipo de Solo</label>
				</div>
				<!--<div class="input-group mb-3">
					<label class="input-group-text">Enviar Imagem</label>
					<input type="file" class="form-control" id="local_image">
				</div>-->

				<hr/>
				<!--Pode ter mais de um LEMBRARRR-->
				<div id="todosTelhados" class="mt-2 row g-3">
					<?php
					$sql_telhados = "SELECT * FROM telhados WHERE Client_Id='$id_cliente'";
					$result_telhados = mysqli_query($conn,$sql_telhados);
					if(mysqli_num_rows($result_telhados)>0){
						$contador_telhados = 1;
						while ($row_telhados = mysqli_fetch_assoc($result_telhados)) {?>

							<h4>Telhado <?php echo $contador_telhados?></h4>
							<div class="mb-3 col-md-2">
								<label class="form-label">Orientação</label>
								<input type="text" class="form-control" name="orientacaoTel[<?php echo $contador_telhados?>]" value="<?php echo $row_telhados['Orientacao'];?>">
							</div>
							<div class="mb-3 col-md-2">
								<label class="form-label">Inclinação</label>
								<input type="text" class="form-control" name="inclinacaoTel[<?php echo $contador_telhados?>]" value="<?php echo $row_telhados['inclinacao'];?>">
							</div>
							<div class="mb-3 col-md-2">
								<label  class="form-label">Largura</label>
								<input type="text" class="form-control" name="larguraTel[<?php echo $contador_telhados?>]" value="<?php echo $row_telhados['largura'];?>">
							</div>
							<div class="mb-3 col-md-2">
								<label class="form-label">Comprimento</label>
								<input type="text" class="form-control" name="comprimentoTel[<?php echo $contador_telhados?>]" value="<?php echo $row_telhados['comprimento'];?>">
							</div>
							<div class="mb-3 col-md-2">
								<label class="form-label">Altura</label>
								<input type="text" class="form-control" name="alturaTel[<?php echo $contador_telhados?>]" value="<?php echo $row_telhados['altura'];?>">
							</div>
							<div class="mb-3 col-md-2">
								<label class="form-label">Tipo</label>
								<input type="text" class="form-control" name="tipoTel[<?php echo $contador_telhados?>]" value="<?php echo $row_telhados['tipo'];?>">
							</div>

							<div class="mb-3 col-md-3">
								<label class="form-label">Distância das Ripas</label>
								<input type="text" class="form-control" name="ripasTel[<?php echo $contador_telhados?>]" value="<?php echo $row_telhados['dist_ripas'];?>">
							</div>
							<div class="mb-3 col-md-3">
								<label class="form-label">Distância dos Caibos</label>
								<input type="text" class="form-control" name="caibosTel[<?php echo $contador_telhados?>]" value="<?php echo $row_telhados['dist_caibos'];?>">
							</div>
							<div class="mb-3 col-md-3">
								<label class="form-label">Distância das Terças</label>
								<input type="text" class="form-control" name="tercasTel[<?php echo $contador_telhados?>]" value="<?php echo $row_telhados['dist_terca'];?>">
							</div>
							<div class="mb-3 col-md-3">
								<label class="form-label">Distância da Viga</label>
								<input type="text" class="form-control" name="vigaTel[<?php echo $contador_telhados?>]" value="<?php echo $row_telhados['dist_viga'];?>">
							</div>
							<div class="mb-3 form-floating">
								<select class="form-select" name="acessoTel[<?php echo $contador_telhados?>]" id="floatingSelect15<?php echo $contador_telhados?>" aria-label="Floating label select example">
									<option value="<?php echo $row_telhados['acesso'];?>" selected><?php echo $row_telhados['acesso'];?></option>
									<option value="andaimeTel">Andaime</option>
									<option value="escadaTel">Escada</option>
									<option value="plataformaTel">Plataforma</option>
								</select>
								<label for="floatingSelect15<?php echo $contador_telhados?>">Acesso</label>
							</div>
							<hr/>
							<?php
							$contador_telhados++;
						}
					}
					?>
				</div>
				<!--<div class="input-group mb-3">
					<label class="input-group-text">Enviar Imagem</label>
					<input type="file" class="form-control" name="telhado_image">
				</div>-->

				<button type="button" onclick="addTelhado()" class="btn btn-success col-md-2">Incluir outro Telhado</button>
				<hr/>
				<!--Pode ter mais de um LEMBRARRR-->
				<h4>Equipamentos</h4>
				<?php
				$sql_equipamento = "SELECT * FROM equipamento WHERE EQId='$info_equipamento'";
				$result_equipamento = mysqli_query($conn,$sql_equipamento);
				$row_equipamento = mysqli_fetch_assoc($result_equipamento);
				?>
				<div class="mb-3 col-md-6">
					<label class="form-label">Local do Inversor</label>
					<input type="text" class="form-control" name="local_Inversor" value="<?php echo $row_equipamento['Loc_inversor'];?>">
				</div>
				<div class="mb-3 col-md-6">
					<label class="form-label">Local do Stringbox</label>
					<input type="text" class="form-control" name="local_stringbox" value="<?php echo $row_equipamento['loc_stringbox'];?>">
				</div>

				<label class="form-label col-md-4">Ponto de Internet</label>
				<?php
				if($row_equipamento['ponto_internet'] == "Sim"){
					?>
					<div class="form-check col-md-4">
						<input class="form-check-input" type="radio" name="Internet_Radio" value="Sim" checked>
						<label class="form-check-label">
							Sim
						</label>
					</div>
					<div class="form-check col-md-4">
						<input class="form-check-input" type="radio" name="Internet_Radio" value="Nao">
						<label class="form-check-label">
							Não
						</label>
					</div>
					<?php
				}else{
					?>
					<div class="form-check col-md-4">
						<input class="form-check-input" type="radio" name="Internet_Radio" value="Sim">
						<label class="form-check-label">
							Sim
						</label>
					</div>
					<div class="form-check col-md-4">
						<input class="form-check-input" type="radio" name="Internet_Radio" value="Nao" checked>
						<label class="form-check-label">
							Não
						</label>
					</div>
					<?php
				}
				?>
				<div class="form-floating mb-3">
					<select class="form-select  col-md-6" id="floatingSelect16" aria-label="Floating label select example" name="tipo_comunicacao">
						<option value="<?php echo $row_equipamento['tipo_comu'];?>" selected><?php echo $row_equipamento['tipo_comu'];?></option>
						<option value="Cabo">Cabo</option>
						<option value="WIFI">Wi-fi</option>
						<option value="Fibra">Fibra</option>
					</select>
					<label for="floatingSelect16">Acesso</label>
				</div>
				<hr/>
				<h4>Visita</h4>
				<?php
				$sql_visita = "SELECT * FROM visita WHERE VId='$cliente_visita'";
				$result_visita = mysqli_query($conn,$sql_visita);
				$row_visita = mysqli_fetch_assoc($result_visita);
				?>
				<div class="mb-3 col-md-4">
					<label class="form-label">Data da Visita</label>
					<input type="date" class="form-control" name="data_Visita" value="<?php echo $row_visita['Data'];?>">
				</div>
				<div class="mb-3 col-md-4">
					<label class="form-label">Hora da Visita</label>
					<input type="text" class="form-control" name="hora_Visita" value="<?php echo $row_visita['Hora'];?>">
				</div>
				<div class="mb-3 col-md-4">
					<label class="form-label">Engenheiro Responsável da Visita</label>
					<input type="text" class="form-control" name="responsavel_Visita" value="<?php echo $row_visita['Resp'];?>">
				</div>


				<hr/>
				<!--Pode ter mais de um LEMBRARRR-->
				<h4>Situação</h4>
				<select class="form-select mb-3" name="situacao_cliente">
					<option value="<?php echo $row_client['Situacao'];?>" selected><?php echo $row_client['Situacao'];?></option>
					<option value="Operacional">Operante</option>
					<option value="Estudo">Estudo</option>
					<option value="Cancelado">Cancelado</option>
				</select>
				<div class="mb-3">
					<label class="form-label">Descrição</label>
					<input type="textarea" class="form-control" name="situacao_Area" value="<?php echo $row_client['Sit_descr'];?>">
				</div>
				<hr/>
				<!-- SOMENTE NO UPDADTE-->
				<h4>Imagens</h4>
				<table class="table">
					<thead>
						<tr>
							<th scope="col">Id</th>
							<th scope="col">Rotulo</th>
							<th scope="col">Imagem</th>
							<th scope="col">Deletar</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$sql_images = "SELECT * FROM imagens WHERE id_cliente='$id_cliente'";
						$result_images = mysqli_query($conn,$sql_images);
						while($row_images = mysqli_fetch_assoc($result_images)){
							?>

							<tr>
								<td><?php echo $row_images['Id'];?></td>
								<td><?php echo $row_images['rotulo'];?></td>
								<td>
									<img src="../clientsData/<?php echo $row_images['local'];?>" alt="<?php echo $row_images['rotulo'];?>" class="img-thumbnail w-50 fix_img">
								</td>
								<td> <a class="icon-link" href="../actionpages/delete_images.php?id=<?php echo $row_images['Id']; ?>" onclick="return confirm('Deseja realmente excluir essa imagem (essa ação não pode ser desfeita)?')">
									<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
										<path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
									</svg>
								</a></td>
							</tr>
							<?php
						}
						?>
					</tbody>
				</table>
				<div class="input-group mb-3">
					<label class="input-group-text">Enviar Imagem</label>
					<input type="file" class="form-control" name="upload_image[]" multiple>
				</div>


				<button type="submit" class="btn btn-warning col-md-3">Atualizar</button>
			</form>

		</div>

		<script type="text/javascript" src="../scripts/update_admin.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
		<script>
			$("#cep").blur(function(){
				// Remove tudo o que não é número para fazer a pesquisa
				var cep = this.value.replace(/[^0-9]/, "");
				
				// Validação do CEP; caso o CEP não possua 8 números, então cancela
				// a consulta
				if(cep.length != 8){
					return false;
				}
				
				// A url de pesquisa consiste no endereço do webservice + o cep que
				// o usuário informou + o tipo de retorno desejado (entre "json",
				// "jsonp", "xml", "piped" ou "querty")
				var url = "https://viacep.com.br/ws/"+cep+"/json/";
				
				// Faz a pesquisa do CEP, tratando o retorno com try/catch para que
				// caso ocorra algum erro (o cep pode não existir, por exemplo) a
				// usabilidade não seja afetada, assim o usuário pode continuar//
				// preenchendo os campos normalmente
				$.getJSON(url, function(dadosRetorno){
					try{
						// Preenche os campos de acordo com o retorno da pesquisa
						$("#logradouro").val(dadosRetorno.logradouro);
						$("#bairro").val(dadosRetorno.bairro);
						$("#cidade").val(dadosRetorno.localidade);
						$("#uf").val(dadosRetorno.uf);
					}catch(ex){}
				});
			});
		</script>

		<?php
	}
}
include "../viewparts/footer.php";
?>