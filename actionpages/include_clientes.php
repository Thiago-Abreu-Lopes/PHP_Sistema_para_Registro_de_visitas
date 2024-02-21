<?php
include('../back/config.php');

$dataClients_directory = "C:/xampp/htdocs/SisMeta/clientsData/";
$allowTypes = array('jpg','png','jpeg','gif'); 

if(!empty($_POST['nome_Completo'])){

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

	$sql_responsavel = "INSERT INTO tecnico_responsavel (Empresa,CNPJ,Responsavel,email,telefone) VALUES ('$empresa_Responsavel','$CNPJ_Responsavel','$pessoa_Responsavel','$mail_Responsavel','$phone_Responsavel')";
	if (mysqli_query($conn,$sql_responsavel) == TRUE) {
		echo "Responsavel cadastrado com sucesso";
	}else{
		echo "Erro:". $sql_responsavel . "<br>". mysqli_error($conn);
	}

	$last_id = mysqli_insert_id($conn);
	$responsavel_id = $last_id;

	$logradouro = $_POST['Logradouro'];
	$numero_Endereco = $_POST['numero_Endereco'];
	$complemento_Endereco = $_POST['complemento_Endereco'];
	$bairro_Endereco = $_POST['bairro_Endereco'];
	$cidade_Endereco = $_POST['cidade_Endereco'];
	$estado_Endereco = $_POST['estado_Endereco'];
	$cep_Endereco = $_POST['CEP'];

	$sql_endereco = "INSERT INTO endereco (Logradouro,numero,Complemento,Bairro,Cidade,Estado,CEP) VALUES ('$logradouro','$numero_Endereco','$complemento_Endereco','$bairro_Endereco','$cidade_Endereco','$estado_Endereco','$cep_Endereco')";
	if (mysqli_query($conn,$sql_endereco) == TRUE) {
		echo "Endereco cadastrado com sucesso";
	}else{
		echo "Erro:". $sql_endereco . "<br>". mysqli_error($conn);
	}

	$last_id = mysqli_insert_id($conn);
	$endereco_id = $last_id;

	$data_visita = $_POST['data_Visita'];
	$hora_visita = $_POST['hora_Visita'];
	$responsavel_visita = $_POST['responsavel_Visita'];

	$sql_visita = "INSERT INTO visita (Data,Hora,Resp) VALUES ('$data_visita','$hora_visita','$responsavel_visita')";
	if (mysqli_query($conn,$sql_visita) == TRUE) {
		echo "Visista cadastrado com sucesso";
	}else{
		echo "Erro:". $sql_visita . "<br>". mysqli_error($conn);
	}

	$last_id = mysqli_insert_id($conn);
	$visita_id = $last_id;

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

	$sql_entrada = "INSERT INTO padrao_entrada (Concessionaria,Tipo,Demanda,Valor_contrato,Ligacao,Tensao,Model_medidor,Obs_medidor,Corrente_Disj,Aterramento,Condicao,altura_caixa,largura_caixa,bitola_cabo) VALUES ('$concessionaria','$tipo_cliente','$demanda','$valor_contrato','$tipo_ligacao','$tensao_nominal','$modelo_medidor','$obs_medidor','$corrente_disjunto','$aterramento','$condicao','$altura_caixa','$largura_caixa','$bitola_cabo')";
	if (mysqli_query($conn,$sql_entrada) == TRUE) {
		echo "Padrao de entrada cadastrado com sucesso";
	}else{
		echo "Erro:". $sql_entrada . "<br>". mysqli_error($conn);
	}

	$last_id = mysqli_insert_id($conn);
	$entrada_id = $last_id;

	$local_instalacao = $_POST['local_instalacao'];
	$idade_local = $_POST['idade_Local'];
	$material_local = $_POST['material_local'];
	$condicao_local = $_POST['condicao_local'];
	$nivel_solo = $_POST['nivel_solo'];
	$tipo_solo = $_POST['tipo_solo'];

	$sql_localInstalacao = "INSERT INTO local_instal (local,Idade,Material,condicoes,nivel_solo,tipo_solo) VALUES ('$local_instalacao','$idade_local','$material_local','$condicao_local','$nivel_solo','$tipo_solo')";
	if (mysqli_query($conn,$sql_localInstalacao) == TRUE) {
		echo "Local de Instalacao cadastrado com sucesso";
	}else{
		echo "Erro:". $sql_localInstalacao . "<br>". mysqli_error($conn);
	}

	$last_id = mysqli_insert_id($conn);
	$localInstalacao_id = $last_id;

	$local_inversor = $_POST['local_Inversor'];
	$local_strigbox = $_POST['local_stringbox'];
	$internet = $_POST['Internet_Radio'];
	$tipo_comunicacao = $_POST['tipo_comunicacao'];

	$sql_equipamento = "INSERT INTO equipamento (Loc_inversor,loc_stringbox,ponto_internet,tipo_comu) VALUES ('$local_inversor','$local_strigbox','$internet','$tipo_comunicacao')";
	if (mysqli_query($conn,$sql_equipamento) == TRUE) {
		echo "Equipamento cadastrado com sucesso";
	}else{
		echo "Erro:". $sql_equipamento . "<br>". mysqli_error($conn);
	}

	$last_id = mysqli_insert_id($conn);
	$equipamento_id = $last_id;


	$sql_localInfor = "INSERT INTO local_info (Padrao_entrada, Local_insta,Equipamento) VALUES ('$entrada_id','$localInstalacao_id',$equipamento_id)";
	if (mysqli_query($conn,$sql_localInfor) == TRUE) {
		echo "Informacoes locais cadastrados com sucesso";
	}else{
		echo "Erro:". $sql_localInfor . "<br>". mysqli_error($conn);
	}

	$last_id = mysqli_insert_id($conn);
	$localInfor_id = $last_id;

	$sql_cliente = "INSERT INTO cliente (Tipo,Documento,Nome,Responsavel,Email,Telefone,Situacao,Sit_descr,Endereco,InfoLocal,RespTec,Visita) VALUES ('$tipo_clienteDoc','$documento_cliente','$nome_Completo','$responsavel_cliente','$client_Email','$client_Phone','$situacao_cliente','$situacao_Area','$endereco_id','$localInfor_id','$responsavel_id','$visita_id')";
	if (mysqli_query($conn,$sql_cliente) == TRUE) {
		echo "Cliente cadastrado com sucesso";
	}else{
		echo "Erro:". $sql_cliente . "<br>". mysqli_error($conn);
	}

	$last_id = mysqli_insert_id($conn);
	$cliente_id = $last_id;

	#==========================================================================================================================
	#Imagens =======================================================================================================
	#==========================================================================================================================
	$nomeDirClienteAtual = $cliente_id . str_replace(' ','',$_POST['nome_Completo']) . $_POST['CPF_CNPJ'].'/';
	$diretorioCompleto = "../clientsData/".$nomeDirClienteAtual;
	if(!is_dir($diretorioCompleto)){
		mkdir($diretorioCompleto, 0755);
	}
	#PADRAO DE ENTRADA +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	//$padraoEntradaNumber = count(array_filter($_FILES['Caixa_images']['tmp_name']));
	$padraoEntradaNumber = count(array_filter($_FILES['Caixa_images']['name']));
	if($padraoEntradaNumber != 0){ 
		$insertValuesSQL = "";
		for($iPE = 0;$iPE < $padraoEntradaNumber;$iPE++){
			$padraoEntradaName = basename($_FILES['Caixa_images']['name'][$iPE]);
			$targetFilePath = $diretorioCompleto . $padraoEntradaName;
			$fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
			if(in_array($fileType, $allowTypes)){
				if(move_uploaded_file($_FILES["Caixa_images"]["tmp_name"][$iPE], $targetFilePath)){
					$diretorioFinal = $nomeDirClienteAtual . $padraoEntradaName;
					$sql_img = "INSERT INTO imagens (local, rotulo, id_cliente) VALUES ('$diretorioFinal','Padrao de Entrada','$cliente_id')";
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
	#Quadros +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	$quadroImagesNumber = count($_FILES['quadro_images']['name']);
	if($quadroImagesNumber != 0){ 
		for($iQ = 0;$iQ < $quadroImagesNumber;$iQ++){
			$quadroImagesName = basename($_FILES['quadro_images']['name'][$iQ]);
			$targetFilePath = $diretorioCompleto . $quadroImagesName;
			$fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
			$insertValuesSQLq ="";
			if(in_array($fileType, $allowTypes)){
				if(move_uploaded_file($_FILES["quadro_images"]["tmp_name"][$iQ], $targetFilePath)){
					$diretorioFinalq = $nomeDirClienteAtual . $quadroImagesName;
					$sql_img = "INSERT INTO imagens (local, rotulo, id_cliente) VALUES ('$diretorioFinalq','Quadro','$cliente_id')";
					if(mysqli_query($conn,$sql_img)){ 
						echo "Imagens do quadro traferidos"; 
					}else{ 
						echo "erro ao enviar imagem do quadro para o banco mane"; 
					} 
				}else{
					echo  "error uploado";
				}
			}else{
				echo  "error tipo";
			}
		}
	}
	#LOCAL DA INSTALACAO +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	$localInstalNumber = count($_FILES['local_image']['name']);
	if($localInstalNumber != 0){ 
		for($iLI = 0;$iLI < $localInstalNumber;$iLI++){
			$localInstalName = basename($_FILES['local_image']['name'][$iLI]);
			$targetFilePath = $diretorioCompleto . $localInstalName;
			$fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
			$insertValuesSQLl="";
			if(in_array($fileType, $allowTypes)){
				if(move_uploaded_file($_FILES["local_image"]["tmp_name"][$iLI], $targetFilePath)){
					$diretorioFinalL = $nomeDirClienteAtual . $localInstalName;
					$sql_img = "INSERT INTO imagens (local, rotulo, id_cliente) VALUES ('$diretorioFinalL','Local de Instalação','$cliente_id')";
					if(mysqli_query($conn,$sql_img)){ 
						echo "Imagens do local de instalacao traferidos"; 
					}else{ 
						echo "erro ao enviar imagem do local para o banco mane"; 
					}
				}else{
					echo  "error uploado";
				}
			}else{
				echo  "error tipo";
			}
		}
	}
	#TELHADO +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	$telhadoNumber = count($_FILES['telhado_image']['name']);
	if($telhadoNumber != 0){ 
		for($iT = 0;$iT < $telhadoNumber;$iT++){
			$telhadoName = basename($_FILES['telhado_image']['name'][$iT]);
			$targetFilePath = $diretorioCompleto . $telhadoName;
			$fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
			$insertValuesSQLt = "";
			if(in_array($fileType, $allowTypes)){
				if(move_uploaded_file($_FILES["telhado_image"]["tmp_name"][$iT], $targetFilePath)){
					$diretorioFinalT = $nomeDirClienteAtual . $telhadoName;
					$sql_img = "INSERT INTO imagens (local, rotulo, id_cliente) VALUES ('$diretorioFinalT','Telhado','$cliente_id')";
					if(mysqli_query($conn,$sql_img)){ 
						echo "Imagens do telhado traferidos"; 
					}else{ 
						echo "erro ao enviar imagem do telhado para o banco mane"; 
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
	$quadros_corrente = $_POST['correteDisjQ'];
	$quadros_condicao = $_POST['condGeralQ'];
	$quadros_espaco = $_POST['espaDispoQ'];
	$quadros_aterro = $_POST['aterramentoQ'];
	$quadros_duto = $_POST['dutoLivreQ'];
	$qnt_quadros = count($quadros_corrente);
	while($contador_quadros<=$qnt_quadros){
		
		if($qnt_quadros > 0){
			$correte_quadro = $quadros_corrente[$contador_quadros];
			$condicao_quadro = $quadros_condicao[$contador_quadros];
			$espaco_quadro = $quadros_espaco[$contador_quadros];
			$aterramento_quadro = $quadros_aterro[$contador_quadros];
			$duto_quadro = $quadros_duto[$contador_quadros];

			$sql_quadro = "INSERT INTO quadros (ClientId,Corrente_Disjuntor,condicoes,espaco_disp,aterramento,duto_livre) VALUES ('$cliente_id','$correte_quadro','$condicao_quadro','$espaco_quadro','$aterramento_quadro','$duto_quadro')";

			if (mysqli_query($conn,$sql_quadro) == TRUE) {
				echo "Quadro ".$contador_quadros." cadastrado com sucesso";
			}else{
				echo "Erro:". $sql_quadro . "<br>". mysqli_error($conn);
			}
		}
		$contador_quadros++;
	}


	$contador_telhados = 1;
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
	while($contador_telhados<6){
		if($contador_telhados<=$qnt_telhados){
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
			$sql_telhado = "INSERT INTO telhados (Client_id,Orientacao,inclinacao,largura,comprimento,tipo,dist_ripas,dist_caibos,dist_terca,dist_viga,altura,acesso) VALUES ('$cliente_id','$orientacao_telhado','$inclinacao_telhado','$largura_telhado','$comprimento_telhado','$tipo_telhado','$ripas_telhado','$caibos_telhado','$tercas_telhado','$vigas_telhado','$altura_telhado','$acesso_telhado')";
			if (mysqli_query($conn,$sql_telhado) == TRUE) {
				echo "Telhado ".$contador_telhados." cadastrado com sucesso";
			}else{
				echo "Erro:". $sql_telhado. "<br>". mysqli_error($conn);
			}
		}
		$contador_telhados++;
	}
	header('location: ../pages/clientList_admin.php');
}
?>