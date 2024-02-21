<?php
include('../back/config.php');

$dataClients_directory = "C:/xampp/htdocs/SisMeta/clientsData/";
$allowTypes = array('jpg','png','jpeg','gif'); 

if(!empty($_POST['nome_Completo'])){
	var_dump($_POST);

	echo "<hr>";

	var_dump($_FILES);

	echo "<hr>";

	var_dump($_GET);

	echo "<hr>";
	
	echo $_POST['Info_Radio'];

}
?>