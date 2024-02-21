<?php

include "../viewparts/header_searchAdm.php";
include "../back/config.php";
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
            <td><a class="link-warning" href="../pages/clientView_admin.php?id=<?php echo $row['CId']; ?>"><?php echo $row['Nome']; ?></a></td>
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
              <a class="icon-link" href="../pages/clientUpdate_admin.php?id=<?php echo $row['CId']; ?>">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                </svg>
                EDITAR
              </a>
              <a class="icon-link" href="../actionpages/delete_client.php?id=<?php echo $row['CId']; ?>" onclick="return confirm('Deseja realmente excluir esse cliente (essa ação não pode ser desfeita)?')">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                  <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                </svg>
                EXCLUIR
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

