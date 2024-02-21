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
	$idIndesejado = $_GET['id'];

	$sql="DELETE FROM usuario WHERE UId='$idIndesejado'";
	if(mysqli_query($conn,$sql)==TRUE){
		echo "DELETADO";
		header('location: ../pages/addUser_admin.php');
	}else{
		echo "Erro ao acessar BD.";
	}
}

?>