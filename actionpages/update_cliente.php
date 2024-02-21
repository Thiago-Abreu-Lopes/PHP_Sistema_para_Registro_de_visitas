<?php
include('../back/config.php');

$dataClients_directory = "C:/xampp/htdocs/SisMeta/clientsData/";
$allowTypes = array('jpg','png','jpeg','gif'); 

if(!empty($_POST['nome_Completo'])){
	$id_clieteFixo = $_GET['idd'];
	$sql_clienteBusca = "SELECT * FROM cliente WHERE CId = '$id_clieteFixo'";
	$result_clienteBusca = mysqli_query($conn,$sql_clienteBusca);
	$row_clienteBusca = mysqli_fetch_assoc($result_clienteBusca);
	$id_endereco = $row_clienteBusca['Endereco'];
	$id_InfoLocal = $row_clienteBusca['InfoLocal'];
	$id_RespTec = $row_clienteBusca['RespTec'];
	$id_visita = $row_clienteBusca['Visita'];


	$nome_Completo=$_POST['nome_Completo'];
	$responsavel_cliente=$_POST['Responsavel'];
	$tipo_clienteDoc=$_POST['Info_Radio'];
	$documento_cliente=$_POST['CPF_CNPJ'];
	$client_Email = $_POST['Client_Email'];
	$client_Phone = $_POST['Client_Phone'];
	$situacao_cliente = $_POST['situacao_cliente'];
	$situacao_Area = $_POST['situacao_Area'];

	$empresa_Responsavel = $_POST['Empresa_Responsavel'];
	$CNPJ_Responsavel = $_POST['CNPJ_Responsavel'];
	$pessoa_Responsavel = $_POST['Pessoa_Responsavel'];
	$phone_Responsavel = $_POST['Responsavel_Phone'];
	$mail_Responsavel = $_POST['Responsavel_Mail'];

	$sql_responsavelUpdate = "UPDATE tecnico_responsavel SET Empresa = '$empresa_Responsavel', CNPJ = '$CNPJ_Responsavel', Responsavel = '$pessoa_Responsavel', email = '$mail_Responsavel', telefone = '$phone_Responsavel' WHERE RId = '$id_RespTec'";
	if (mysqli_query($conn,$sql_responsavelUpdate) == TRUE) {
		echo "Responsavel cadastrado com sucesso";
	}else{
		echo "Erro:". $sql_responsavelUpdate . "<br>". mysqli_error($conn);
	}

	$logradouro = $_POST['Logradouro'];
	$numero_Endereco = $_POST['numero_Endereco'];
	$complemento_Endereco = $_POST['complemento_Endereco'];
	$bairro_Endereco = $_POST['bairro_Endereco'];
	$cidade_Endereco = $_POST['cidade_Endereco'];
	$estado_Endereco = $_POST['estado_Endereco'];
	$cep_Endereco = $_POST['CEP'];

	$sql_enderecoUpdate = "UPDATE endereco SET Logradouro = '$logradouro', numero = '$numero_Endereco', Complemento = '$complemento_Endereco', Bairro = '$bairro_Endereco', Cidade = '$cidade_Endereco', Estado = '$estado_Endereco', CEP = '$cep_Endereco' WHERE EId = '$id_endereco'";
	if (mysqli_query($conn,$sql_enderecoUpdate) == TRUE) {
		echo "Endereco cadastrado com sucesso";
	}else{
		echo "Erro:". $sql_enderecoUpdate . "<br>". mysqli_error($conn);
	}

	$data_visita = $_POST['data_Visita'];
	$hora_visita = $_POST['hora_Visita'];
	$responsavel_visita = $_POST['responsavel_Visita'];

	$sql_visitaUpdate = "UPDATE visita SET Data = '$data_visita', Hora = '$hora_visita', Resp = '$responsavel_visita' WHERE VId = '$id_visita'";
	if (mysqli_query($conn,$sql_visitaUpdate) == TRUE) {
		echo "Visista cadastrado com sucesso";
	}else{
		echo "Erro:". $sql_visitaUpdate . "<br>". mysqli_error($conn);
	}

	$sql_InfoLocalBusca = "SELECT * FROM local_info WHERE LId = '$id_InfoLocal'";
	$result_InfoLocalBusca = mysqli_query($conn,$sql_InfoLocalBusca);
	$row_InfoLocalBusca = mysqli_fetch_assoc($result_InfoLocalBusca);
	$id_padraoEntrada = $row_InfoLocalBusca['Padrao_entrada'];
	$id_LocalInsta = $row_InfoLocalBusca['Local_insta'];
	$id_equipamento = $row_InfoLocalBusca['Equipamento'];

	$concessionaria = $_POST['concessionaria'];
	$demanda = $_POST['Demanda_Radio'];
	$valor_contrato = $_POST['valor_Contrato'];
	$tipo_cliente = $_POST['tipo_cliente'];
	$tipo_ligacao = $_POST['tipo_ligacao'];
	$tensao_nominal = $_POST['tesao_nominal'];
	$modelo_medidor = $_POST['modelo_medidor'];
	$obs_medidor = $_POST['observacao_Medidor'];
	$corrente_disjunto = $_POST['corrente_Disjuntor'];
	$aterramento = $_POST['Aterramento_Radio'];
	$condicao = $_POST['condicao_geral'];
	$altura_caixa = $_POST['altura_Caixa'];
	$largura_caixa = $_POST['largura_Caixa'];
	$bitola_cabo = $_POST['bitola_Cabo'];

	$sql_entradaUpdate = "UPDATE padrao_entrada SET Concessionaria = '$concessionaria', Tipo = '$tipo_cliente', Demanda = '$demanda', Valor_contrato = '$valor_contrato', Ligacao = '$tipo_ligacao', Tensao = '$tensao_nominal', Model_medidor = '$modelo_medidor', Obs_medidor = '$obs_medidor', Corrente_Disj = '$corrente_disjunto', Aterramento = '$aterramento', Condicao = '$condicao', altura_caixa = '$altura_caixa', largura_caixa = '$largura_caixa', bitola_cabo = '$bitola_cabo' WHERE PEId = '$id_padraoEntrada'";
	if (mysqli_query($conn,$sql_entradaUpdate) == TRUE) {
		echo "Padrao de entrada cadastrado com sucesso";
	}else{
		echo "Erro:". $sql_entradaUpdate . "<br>". mysqli_error($conn);
	}


	$local_instalacao = $_POST['local_instalacao'];
	$idade_local = $_POST['idade_Local'];
	$material_local = $_POST['material_local'];
	$condicao_local = $_POST['condicao_local'];
	$nivel_solo = $_POST['nivel_solo'];
	$tipo_solo = $_POST['tipo_solo'];

	$sql_localInstalacaoUpdate = "UPDATE local_instal SET local = '$local_instalacao', Idade = '$idade_local', Material = '$material_local', condicoes = '$condicao_local', nivel_solo = '$nivel_solo', tipo_solo = '$tipo_solo' WHERE LIId = '$id_LocalInsta'";
	if (mysqli_query($conn,$sql_localInstalacaoUpdate) == TRUE) {
		echo "Local de Instalacao cadastrado com sucesso";
	}else{
		echo "Erro:". $sql_localInstalacaoUpdate . "<br>". mysqli_error($conn);
	}


	$local_inversor = $_POST['local_Inversor'];
	$local_strigbox = $_POST['local_stringbox'];
	$internet = $_POST['Internet_Radio'];
	$tipo_comunicacao = $_POST['tipo_comunicacao'];

	$sql_equipamentoUpdate = "UPDATE equipamento SET Loc_inversor = '$local_inversor', loc_stringbox = '$local_strigbox', ponto_internet = '$internet', tipo_comu = '$tipo_comunicacao' WHERE EQId = '$id_equipamento'";
	if (mysqli_query($conn,$sql_equipamentoUpdate) == TRUE) {
		echo "Equipamento cadastrado com sucesso";
	}else{
		echo "Erro:". $sql_equipamentoUpdate . "<br>". mysqli_error($conn);
	}

	$sql_clienteUpdate = "UPDATE cliente SET Tipo = '$tipo_clienteDoc', Documento = '$documento_cliente', Nome = '$nome_Completo', Responsavel = '$responsavel_cliente', Email = '$client_Email', Telefone = '$client_Phone', Situacao = '$situacao_cliente', Sit_descr = '$situacao_Area' WHERE CId='$id_clieteFixo'";
	if (mysqli_query($conn,$sql_clienteUpdate) == TRUE) {
		echo "Cliente cadastrado com sucesso";
	}else{
		echo "Erro:". $sql_clienteUpdate . "<br>". mysqli_error($conn);
	}

	#==========================================================================================================================
	#Imagens =======================================================================================================
	#==========================================================================================================================
	$nomeDirClienteAtual = $id_clieteFixo . str_replace(' ','',$_POST['nome_Completo']) . $_POST['CPF_CNPJ'].'/';
	$diretorioCompleto = "../clientsData/".$nomeDirClienteAtual;
	if(!is_dir($diretorioCompleto)){
		mkdir($diretorioCompleto, 0755);
	}
	#PADRAO DE ENTRADA +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	//$padraoEntradaNumber = count(array_filter($_FILES['Caixa_images']['tmp_name']));
	$updateImageNumber = count(array_filter($_FILES['upload_image']['name']));
	if($updateImageNumber != 0){ 
		$insertValuesSQL = "";
		for($iPE = 0;$iPE < $updateImageNumber;$iPE++){
			$padraoEntradaName = basename($_FILES['upload_image']['name'][$iPE]);
			$targetFilePath = $diretorioCompleto . $padraoEntradaName;
			$fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
			if(in_array($fileType, $allowTypes)){
				if(move_uploaded_file($_FILES["upload_image"]["tmp_name"][$iPE], $targetFilePath)){
					$diretorioFinal = $nomeDirClienteAtual . $padraoEntradaName;
					$sql_img = "INSERT INTO imagens (local, rotulo, id_cliente) VALUES ('$diretorioFinal','Update','$id_clieteFixo')";
					if(mysqli_query($conn,$sql_img)){ 
						echo "Imagens do padrao de entrada traferidos"; 
					}else{ 
						echo "erro ao enviar imagem do padrao de entrada para o banco mane"; 
					} 
				}else{
					echo  "error uploado";
				}
			}else{
				echo  "error tipo";
			}
		}

	}
	#==========================================================================================================================
	#QUADROS E TELHADOS =======================================================================================================
	#==========================================================================================================================
	$contador_quadros = 1;
	$sql_contagemQuadros = "SELECT COUNT(*) AS 'totalQ' FROM quadros WHERE ClientId = '$id_clieteFixo'";
	$resultsContagemQ = mysqli_query($conn,$sql_contagemQuadros);
	$dataQ=mysqli_fetch_assoc($resultsContagemQ);
	echo $dataQ['totalQ'];
	$quadros_existentes = $dataQ['totalQ'];

	$quadros_corrente = $_POST['correteDisjQ'];
	$quadros_condicao = $_POST['condGeralQ'];
	$quadros_espaco = $_POST['espaDispoQ'];
	$quadros_aterro = $_POST['aterramentoQ'];
	$quadros_duto = $_POST['dutoLivreQ'];
	$qnt_quadros = count($quadros_corrente);
	$sql_listaQuadros = "SELECT * FROM quadros WHERE ClientId = '$id_clieteFixo'";
	$result_listaQuadro = mysqli_query($conn,$sql_listaQuadros);

	while($row_quadros = mysqli_fetch_assoc($result_listaQuadro)){
		
		$correte_quadro = $quadros_corrente[$contador_quadros];
		$condicao_quadro = $quadros_condicao[$contador_quadros];
		$espaco_quadro = $quadros_espaco[$contador_quadros];
		$aterramento_quadro = $quadros_aterro[$contador_quadros];
		$duto_quadro = $quadros_duto[$contador_quadros];
		$id_agoraQ = $row_quadros['QId'];

		$sql_quadro = "UPDATE quadros SET ClientId = '$id_clieteFixo', Corrente_Disjuntor = '$correte_quadro', condicoes = '$condicao_quadro', espaco_disp = '$espaco_quadro', aterramento = '$aterramento_quadro', duto_livre = '$duto_quadro' WHERE QId = '$id_agoraQ'";

		if (mysqli_query($conn,$sql_quadro) == TRUE) {
			echo "Quadro ".$contador_quadros." atualizado com sucesso";
		}else{
			echo "Erro:". $sql_quadro . "<br>". mysqli_error($conn);
		}
		$contador_quadros++;
	}

	$contador_quadros = $quadros_existentes + 1;
	echo $contador_quadros;
	echo $qnt_quadros;
	while($contador_quadros<=$qnt_quadros){
		
		if($qnt_quadros > 0){
			$correte_quadro = $quadros_corrente[$contador_quadros];
			$condicao_quadro = $quadros_condicao[$contador_quadros];
			$espaco_quadro = $quadros_espaco[$contador_quadros];
			$aterramento_quadro = $quadros_aterro[$contador_quadros];
			$duto_quadro = $quadros_duto[$contador_quadros];

			$sql_quadro = "INSERT INTO quadros (ClientId,Corrente_Disjuntor,condicoes,espaco_disp,aterramento,duto_livre) VALUES ('$id_clieteFixo','$correte_quadro','$condicao_quadro','$espaco_quadro','$aterramento_quadro','$duto_quadro')";

			if (mysqli_query($conn,$sql_quadro) == TRUE) {
				echo "Quadro ".$contador_quadros." cadastrado com sucesso";
			}else{
				echo "Erro:". $sql_quadro . "<br>". mysqli_error($conn);
			}
		}
		$contador_quadros++;
	}


	$contador_telhados = 1;
	$sql_contagemTelhados = "SELECT COUNT(*) AS 'totalT' FROM telhados WHERE Client_id = '$id_clieteFixo'";
	$resultsContagemT = mysqli_query($conn,$sql_contagemTelhados);
	$dataT=mysqli_fetch_assoc($resultsContagemT);
	$telhados_existentes = $dataT['totalT'];

	$telhado_orientacao = $_POST['orientacaoTel'];
	$telhado_inclinacao = $_POST['inclinacaoTel'];
	$telhado_largura = $_POST['larguraTel'];
	$telhado_comprimento = $_POST['comprimentoTel'];
	$telhado_altura = $_POST['alturaTel'];
	$telhado_tipo = $_POST['tipoTel'];
	$telhado_ripas = $_POST['ripasTel'];
	$telhado_caibos = $_POST['caibosTel'];
	$telhado_tercas = $_POST['tercasTel'];
	$telhado_vigas = $_POST['vigaTel'];
	$telhado_acesso = $_POST['acessoTel'];
	$qnt_telhados = count($telhado_orientacao);
	$sql_listaTelhados = "SELECT * FROM telhados WHERE Client_id = '$id_clieteFixo'";
	$result_listaTelhados = mysqli_query($conn,$sql_listaTelhados);

	while($row_telhados = mysqli_fetch_assoc($result_listaTelhados)){
		if($qnt_telhados > 0){
			$orientacao_telhado = $telhado_orientacao[$contador_telhados];
			$inclinacao_telhado = $telhado_inclinacao[$contador_telhados];
			$largura_telhado = $telhado_largura[$contador_telhados];
			$comprimento_telhado = $telhado_comprimento[$contador_telhados];
			$altura_telhado = $telhado_altura[$contador_telhados];
			$tipo_telhado = $telhado_tipo[$contador_telhados];
			$ripas_telhado = $telhado_ripas[$contador_telhados];
			$caibos_telhado = $telhado_caibos[$contador_telhados];
			$tercas_telhado = $telhado_tercas[$contador_telhados];
			$vigas_telhado = $telhado_vigas[$contador_telhados];
			$acesso_telhado = $telhado_acesso[$contador_telhados];
			$vigas_telhado = $telhado_vigas[$contador_telhados];
			$id_agoraT = $row_telhados['TId'];
			$sql_telhado = "UPDATE telhados SET Client_id = '$id_clieteFixo', Orientacao = '$orientacao_telhado', inclinacao = '$inclinacao_telhado', largura = '$largura_telhado', comprimento = '$comprimento_telhado', tipo = '$tipo_telhado', dist_ripas = '$ripas_telhado', dist_caibos = '$caibos_telhado', dist_terca = '$tercas_telhado', dist_viga = '$vigas_telhado',altura = '$altura_telhado', acesso = '$acesso_telhado' WHERE TId = '$id_agoraT'";
			if (mysqli_query($conn,$sql_telhado) == TRUE) {
				echo "Telhado ".$contador_telhados." atualizado com sucesso";
			}else{
				echo "Erro:". $sql_telhado. "<br>". mysqli_error($conn);
			}
		}
		$contador_telhados++;
	}
	$contador_telhados = $telhados_existentes + 1;
	while($contador_telhados<=$qnt_telhados){
		
		
		$orientacao_telhado = $telhado_orientacao[$contador_telhados];
		$inclinacao_telhado = $telhado_inclinacao[$contador_telhados];
		$largura_telhado = $telhado_largura[$contador_telhados];
		$comprimento_telhado = $telhado_comprimento[$contador_telhados];
		$altura_telhado = $telhado_altura[$contador_telhados];
		$tipo_telhado = $telhado_tipo[$contador_telhados];
		$ripas_telhado = $telhado_ripas[$contador_telhados];
		$caibos_telhado = $telhado_caibos[$contador_telhados];
		$tercas_telhado = $telhado_tercas[$contador_telhados];
		$vigas_telhado = $telhado_vigas[$contador_telhados];
		$acesso_telhado = $telhado_acesso[$contador_telhados];
		$sql_telhado = "INSERT INTO telhados (Client_id,Orientacao,inclinacao,largura,comprimento,tipo,dist_ripas,dist_caibos,dist_terca,dist_viga,altura,acesso) VALUES ('$id_clieteFixo','$orientacao_telhado','$inclinacao_telhado','$largura_telhado','$comprimento_telhado','$tipo_telhado','$ripas_telhado','$caibos_telhado','$tercas_telhado','$vigas_telhado','$altura_telhado','$acesso_telhado')";
		if (mysqli_query($conn,$sql_telhado) == TRUE) {
			echo "Telhado ".$contador_telhados." cadastrado com sucesso";
		}else{
			echo "Erro:". $sql_telhado. "<br>". mysqli_error($conn);
		}
		
		$contador_telhados++;
	}

	header('location: ../pages/clientList_admin.php');
}
?>