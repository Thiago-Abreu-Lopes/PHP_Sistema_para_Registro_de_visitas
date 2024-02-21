<?php
include ("../back/config.php");
session_start();
if(isset($_SESSION['acess_user'])){
	if($_SESSION['acess_user']['tipo']!="adm"){
		header("location: ../pages/clientList.php");
		exit();
	}
}else{
	header("location: ../");
	exit();
}

if(isset($_GET['id'])){
	$idClienteExcluido = $_GET['id'];

	$sqlbusca = "SELECT * FROM cliente WHERE CId = '$idClienteExcluido'";

	$result_cliente = mysqli_query($conn,$sqlbusca);
	$row_client = mysqli_fetch_assoc($result_cliente);
	$client_nome = $row_client['Nome'];
	$client_document = $row_client['Documento'];
	$cliente_enderecoInfo = $row_client['Endereco'];
	$cliente_LocalInfo = $row_client['InfoLocal'];
	$cliente_responsavelTecnico = $row_client['RespTec'];
	$cliente_visita = $row_client['Visita'];
	
	$fileLocal = $idClienteExcluido . $client_nome . $client_document;

	$sqlbusca2 = "SELECT * FROM local_info WHERE LId = '$cliente_LocalInfo'";
	$result_localInfo = mysqli_query($conn,$sqlbusca2);
	$row_localInfo = mysqli_fetch_assoc($result_localInfo);
	$padrao = $row_localInfo['Padrao_entrada'];
	$local = $row_localInfo['Local_insta'];
	$equipamento = $row_localInfo['Equipamento'];

	$sql_padrao="DELETE FROM padrao_entrada WHERE PEId='$padrao'";

	if(mysqli_query($conn,$sql_padrao)==TRUE){
		echo "DELETADO";
	}else{
		echo "Erro ao acessar BD Padrao.";
	}

	$sql_local="DELETE FROM local_instal WHERE LIId='$local'";

	if(mysqli_query($conn,$sql_local)==TRUE){
		echo "DELETADO";
	}else{
		echo "Erro ao acessar BD local.";
	}

	$sql_equipamento="DELETE FROM equipamento WHERE EQId='$equipamento'";

	if(mysqli_query($conn,$sql_equipamento)==TRUE){
		echo "DELETADO";
	}else{
		echo "Erro ao acessar BD equipamento.";
	}

	$sql_Info="DELETE FROM local_info WHERE LId='$cliente_LocalInfo'";

	if(mysqli_query($conn,$sql_Info)==TRUE){
		echo "DELETADO";
	}else{
		echo "Erro ao acessar BD Info.";
	}


	$sql_endereco="DELETE FROM endereco WHERE EId='$cliente_enderecoInfo'";

	if(mysqli_query($conn,$sql_endereco)==TRUE){
		echo "DELETADO";
	}else{
		echo "Erro ao acessar BD endereco.";
	}

	$sql_resp="DELETE FROM tecnico_responsavel WHERE RId='$cliente_responsavelTecnico'";

	if(mysqli_query($conn,$sql_resp)==TRUE){
		echo "DELETADO";
	}else{
		echo "Erro ao acessar BD RespTec.";
	}

	$sql_visita="DELETE FROM visita WHERE VId='$cliente_visita'";

	if(mysqli_query($conn,$sql_visita)==TRUE){
		echo "DELETADO";
	}else{
		echo "Erro ao acessar BD Visita.";
	}

	$sql_quadros="DELETE FROM quadros WHERE ClientId='$idClienteExcluido'";

	if(mysqli_query($conn,$sql_quadros)==TRUE){
		echo "DELETADO";
	}else{
		echo "Erro ao acessar BD quadros.";
	}

	$sql_telhados="DELETE FROM telhados WHERE Client_id='$idClienteExcluido'";

	if(mysqli_query($conn,$sql_telhados)==TRUE){
		echo "DELETADO";
	}else{
		echo "Erro ao acessar BD telhados.";
	}

	if (is_dir('../clientsData/'. $fileLocal)) {
		$objects = scandir('../clientsData/'. $fileLocal);
		foreach ($objects as $object) {

			if ($object != "." && $object != "..") {

				if (filetype('../clientsData/'. $fileLocal."/".$object) == "dir") rrmdir('../clientsData/'. $fileLocal."/".$object); else unlink('../clientsData/'. $fileLocal."/".$object);

			}

		}
		reset($objects);

		rmdir('../clientsData/'. $fileLocal);
		echo "arquivos removidos com sucesso.";
	}

	$sql_imgs="DELETE FROM imagens WHERE id_cliente='$idClienteExcluido'";

	if(mysqli_query($conn,$sql_imgs)==TRUE){
		echo "DELETADO";
	}else{
		echo "Erro ao acessar BD imgs.";
	}

	$sql="DELETE FROM cliente WHERE CId = '$idClienteExcluido'";

	if(mysqli_query($conn,$sql)==TRUE){
		echo "DELETADO";
	}else{
		echo "Erro ao acessar BD cliente.";
	}



}
header('location: ../pages/clientList_admin.php');

?>