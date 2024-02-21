<?php
include ("../back/config.php");

if(isset($_GET['id'])){
	$idImagemIndesejado = $_GET['id'];
	$caminho = "../clientsData/";
	$sqlBusca = "SELECT * FROM imagens WHERE Id = '$idImagemIndesejado'";
	$resultBusca = mysqli_query($conn,$sqlBusca);
	$row_imagens = mysqli_fetch_assoc($resultBusca);

	$caminho_imagem = $caminho.$row_imagens['local']; 
	echo $caminho_imagem;
	if(unlink($caminho_imagem)){
		$sql="DELETE FROM imagens WHERE Id='$idImagemIndesejado'";
		if(mysqli_query($conn,$sql)==TRUE){
			echo "DELETADO";
			header('location: ../pages/addUser_admin.php');
		}else{
			echo "Erro ao acessar BD.";
		}
	}else{
		echo "deu ruim!";
	}
	header('location: ../pages/clientList_admin.php');
}

?>