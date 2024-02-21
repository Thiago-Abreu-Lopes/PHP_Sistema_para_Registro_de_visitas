<?php
include "../back/config.php";
if(!empty($_POST['nome_Completo']) && !empty($_POST['Senha'])){
	$nomeUsuario = $_POST['nome_Completo'];
	$senha = md5($_POST['Senha']);
	$sql1="INSERT INTO usuario (name,password,tipo) VALUES ('$nomeUsuario','$senha','col')"; 
	#$result1 = mysqli_query($conn,$sql1);
	if (mysqli_query($conn,$sql1) == TRUE) {

		echo "New record created successfully.";

	}else{

		echo "Error:". $sql1 . "<br>". $conn->error;

	} 
	header('location:../pages/addUser_admin.php');
}
?>