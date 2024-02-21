<?php
	include "../viewparts/header_geralAdm.php";
	session_start();
if(isset($_SESSION['acess_user'])){
  if($_SESSION['acess_user']['tipo']!="col"){
    header("location: ../pages/dashboard_admin.php");
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