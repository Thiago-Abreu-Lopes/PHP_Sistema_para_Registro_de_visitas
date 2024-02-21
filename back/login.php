<?php 

include ('config.php');
session_start();

if(empty($_POST["usuario"])||empty($_POST["senha"])){
	header("location: ../");
	exit();
}else{
	$usuario = $_POST["usuario"];
	$senha = md5($_POST["senha"]);

	$sql="SELECT * FROM usuario WHERE name ='$usuario'and password = '$senha'";
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
	if(mysqli_num_rows($result) <= 0){
		echo "<script language='javascript' type='text/javascript'>alert('Login e/ou senha incorretos');window.location.href='../';</script>";
	}else{
		$_SESSION['acess_user'] = $row;
		if($_SESSION['acess_user']['tipo']=="adm"){
			header("location: ../pages/clientList_admin.php");
			exit();
		}else{
			header("location: ../pages/clientList.php");
			exit();
		}

	}
	

}

?>