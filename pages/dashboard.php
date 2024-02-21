<?php
include "../viewparts/header_geralCol.php"
session_start();
if(isset($_SESSION['acess_user'])){
	if($_SESSION['acess_user']['tipo']!="adm"){
		header("location: ../pages/dashboard.php");
		exit();
	}
}else{
	header("location: ../");
	exit();
}
?>
?>

<h1>Teste</h1>

<?php
include "../viewparts/footer.php"
?>