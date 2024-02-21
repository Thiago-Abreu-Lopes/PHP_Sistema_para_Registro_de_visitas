<?php

include "../viewparts/header_searchCol.php";
include "../back/config.php";
session_start();
if(isset($_SESSION['acess_user'])){
  if($_SESSION['acess_user']['tipo']!="col"){
    header("location: ../pages/clientList_admin.php");
    exit();
  }
}else{
  header("location: ../");
  exit();
}
$sql='SELECT * FROM cliente';
$result = mysqli_query($conn,$sql);
?>
<div class="container">
  <table class="table">
    <thead>
      <tr>
        <th scope="col">CID</th>
        <th scope="col">Nome</th>
        <th scope="col">CPF/CNPJ</th>
        <th scope="col">Situação</th>
        <th scope="col">Ação</th>
      </tr>
    </thead>
    <tbody id="searchResult">
      <?php
      if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
          ?>
          <tr>
            <th scope="row"><?php echo $row['CId']; ?></th>
            <td><a class="link-warning" href="../pages/clientView.php?id=<?php echo $row['CId']; ?>"><?php echo $row['Nome']; ?></a></td>
            <td><?php echo $row['Documento']; ?></td>
            <?php
              if($row['Situacao'] == 'Operacional'){
                ?><td class="bg-success text-white"><?php echo $row['Situacao']; ?></td><?php
              }else{
                if($row['Situacao'] == 'Cancelado'){
                  ?><td class="bg-danger text-white"><?php echo $row['Situacao']; ?></td><?php
                }else{
                  ?><td class="bg-secondary text-white"><?php echo $row['Situacao']; ?></td><?php
                }
              }
            ?>
            <td>
              <a class="icon-link" href="../pages/clientUpdate.php?id=<?php echo $row['CId']; ?>">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                </svg>
                EDITAR
              </a>
            </td>
          </tr>


          <?php
        }
      }
      ?>

    </tbody>
  </table>

  <!--<div id="resultadoBusca"></div>-->
</div>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>

<script type="text/javascript">
  $(document).ready(function(){
    $("#buscar").on("keyup",function(){
      var input = $(this).val();
      //alert(input);
      $.ajax({
        method:'POST',
        url: '../actionpages/buscaViva.php',
        data:{data:input},
        success:function(response){
          $("#searchResult").html(response);
        }
      });
    });
  });
</script>
<?php

include "../viewparts/footer.php"

?>

