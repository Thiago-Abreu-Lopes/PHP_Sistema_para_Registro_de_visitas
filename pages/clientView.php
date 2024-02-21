<?php
include "../viewparts/header_geralCol.php";
include "../back/config.php";
session_start();
if(isset($_SESSION['acess_user'])){
  if($_SESSION['acess_user']['tipo']!="col"){
    header("location: ../pages/clientView_admin.php");
    exit();
  }
}else{
  header("location: ../");
  exit();
}
function Mask($mask,$str){

    $str = str_replace(" ","",$str);

    for($i=0;$i<strlen($str);$i++){
        $mask[strpos($mask,"#")] = $str[$i];
    }

    return $mask;

}
function formatCnpjCpf($value)
{
  $CPF_LENGTH = 11;
  $cnpj_cpf = preg_replace("/\D/", '', $value);
  
  if (strlen($cnpj_cpf) === $CPF_LENGTH) {
    return preg_replace("/(\d{3})(\d{3})(\d{3})(\d{2})/", "\$1.\$2.\$3-\$4", $cnpj_cpf);
  } 
  
  return preg_replace("/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/", "\$1.\$2.\$3/\$4-\$5", $cnpj_cpf);
}
if(isset($_GET['id'])){
	$id_cliente = $_GET['id'];
	$sql_client = "SELECT * FROM cliente WHERE CId = '$id_cliente'";
	$result_cliente = mysqli_query($conn,$sql_client);
	if (mysqli_num_rows($result_cliente) > 0) {
		$row_client = mysqli_fetch_assoc($result_cliente);
		$cliente_enderecoInfo = $row_client['Endereco'];
		$cliente_LocalInfo = $row_client['InfoLocal'];
		$cliente_responsavelTecnico = $row_client['RespTec'];
		$cliente_visita = $row_client['Visita'];
		?>

		<style>
			.fix_img{
				height: 450px;
				background-position: center;
				background-size: cover;
			}
		</style>
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="mb-3 mt-3 col-md-12 text-center bg-warning text-dark">
						<h1>Dados Pessoais</h1>
					</div>
					<div class="mb-3 col-md-12 text-center text-dark bg-light">
						<h3>CID: #<?php echo $row_client['CId'];?></h3>
					</div>
					<div class="mb-3 col-md-12 text-center">
						<h3><?php echo $row_client['Nome'];?></h3>
					</div>
					<?php
					if($row_client['Situacao'] == 'Operacional'){?>
						<div class="mb-3 col-md-12 text-center bg-success">
							<h3>Situação: <?php echo $row_client['Situacao'];?></h3>
						</div>
						<?php
					} else {
						if($row_client['Situacao'] == 'Estudo'){?>
							<div class="mb-3 col-md-12 text-center bg-secondary">
								<h3>Situação: <?php echo $row_client['Situacao'];?></h3>
							</div>
							<?php

						}else{?>
							<div class="mb-3 col-md-12 text-center bg-danger">
								<h3>Situação: <?php echo $row_client['Situacao'];?></h3>
							</div>
							<?php

						}
					}?>
					<?php
					$slq_images = "SELECT * FROM imagens WHERE id_cliente='$id_cliente'";
					$result_images = mysqli_query($conn,$slq_images);
					if(mysqli_num_rows($result_images) > 0){
						$contador_uno = 0;
						$num_imagens = mysqli_num_rows($result_images);?>
						
						<div id="corrasel" class="mb-3">
							<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
								<div class="carousel-inner">
									<?php 
									$contador_dos = 0;
									while ($row_images = mysqli_fetch_assoc($result_images)) {
										if($contador_dos == 0){
											?>
											<div class="carousel-item active">
												<img src="../clientsData/<?php echo $row_images['local'];?>" class="d-block w-100 fix_img" alt="...">
												<div class="carousel-caption d-none d-md-block">
													<h5 class="bg-warning text-dark"><?php echo $row_images['rotulo'];?></h5>
												</div>
											</div>
											<?php
										}else{
											?>
											<div class="carousel-item">
												<img src="../clientsData/<?php echo $row_images['local'];?>" class="d-block w-100 fix_img" alt="...">
												<div class="carousel-caption d-none d-md-block">
													<h5 class="bg-warning text-dark"><?php echo $row_images['rotulo'];?></h5>
												</div>
											</div>
											<?php
										}
										$contador_dos++;
									}?>
								</div>

								
								<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
									<span class="carousel-control-prev-icon" aria-hidden="true"></span>
									<span class="visually-hidden">Previous</span>
								</button>
								<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
									<span class="carousel-control-next-icon" aria-hidden="true"></span>
									<span class="visually-hidden">Next</span>
								</button>
							</div>
						</div>
						<?php
					}?>
					<?php
					if($row_client['Tipo']=='CNPJ'){?>
						<div class="mb-3 col-md-12 text-center bg-light-subtle"><span>CNPJ: <?php echo formatCnpjCpf($row_client['Documento']);?></span></div>
						<?php
					}else{
						?>
						<div class="mb-3 col-md-12 text-center bg-light-subtle"><span>CPF: <?php echo formatCnpjCpf($row_client['Documento']);?></span></div>
						<?php
					}
					?>
					<div class="mb-3 col-md-12 text-center bg-light-subtle"><span>Responsável: <?php echo $row_client['Responsavel'];?></span></div>
					<div class="mb-3 col-md-12 text-center bg-light-subtle"><span>Telefone: <?php echo Mask("(##)#####-####",$row_client['Telefone']);?></span></div>
					<div class="mb-3 col-md-12 text-center bg-light-subtle"><span>Email: <?php echo $row_client['Email'];?></span></div>
				</div>
				<div class="col">
					<div class="accordion mt-3" id="accordionPanelsStayOpenExample">
						<?php
						$sql_endereco = "SELECT * FROM endereco WHERE EId='$cliente_enderecoInfo'";
						$result_endereco = mysqli_query($conn,$sql_endereco);
						if(mysqli_num_rows($result_endereco)>0){
							$row_endereco = mysqli_fetch_assoc($result_endereco);
							?>
							<div class="accordion-item">
								<h2 class="accordion-header" id="panelsStayOpen-headingOne">
									<button class="accordion-button collapsed text-center" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="false" aria-controls="panelsStayOpen-collapseOne">
										<h3>Endereço</h3>
									</button>
								</h2>
								<div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingOne">
									<div class="accordion-body">
										<div class="mb-3 col-md-12 text-center"><span>CEP: <?php echo Mask("#####-###",$row_endereco['CEP']) ;?></span></div>
										<div class="mb-3 col-md-12 text-center"><span>Logradouro: <?php echo $row_endereco['Logradouro'];?></span></div>
										<div class="mb-3 col-md-12 text-center"><span>Número: <?php echo $row_endereco['numero'];?></span></div>
										<?php
										if($row_endereco['Complemento'] != NULL){?>
											<div class="mb-3 col-md-12 text-center bg-light-subtle"><span>Complemento: <?php echo $row_endereco['Complemento'];?></span></div>
											<?php
										}?>
										<div class="mb-3 col-md-12 text-center bg-light-subtle"><span>Bairro: <?php echo $row_endereco['Bairro'];?></span></div>
										<div class="mb-3 col-md-12 text-center bg-light-subtle"><span>Cidade: <?php echo $row_endereco['Cidade'];?></span></div>
										<div class="mb-3 col-md-12 text-center bg-light-subtle"><span>Estado: <?php echo $row_endereco['Estado'];?></span></div>
									</div>
								</div>
							</div>
							<?php
						}
						?>
						<?php
						$sql_respTecn = "SELECT * FROM tecnico_responsavel WHERE RId='$cliente_responsavelTecnico'";
						$result_respTecn = mysqli_query($conn,$sql_respTecn);
						if(mysqli_num_rows($result_respTecn)>0){
							$row_respTecn = mysqli_fetch_assoc($result_respTecn);
							?>
							<div class="accordion-item">
								<h2 class="accordion-header" id="panelsStayOpen-headingTwo">
									<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
										<h3>Responsável Técnico</h3>
									</button>
								</h2>
								<div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
									<div class="accordion-body">
										<div class="mb-3 col-md-12 text-center"><span>Empresa: <?php echo $row_respTecn['Empresa'];?></span></div>
										<div class="mb-3 col-md-12 text-center"><span>CNPJ: <?php echo formatCnpjCpf($row_respTecn['CNPJ']);?></span></div>
										<div class="mb-3 col-md-12 text-center bg-light-subtle"><span>Responsável: <?php echo $row_respTecn['Responsavel'];?></span></div>
										<div class="mb-3 col-md-12 text-center bg-light-subtle"><span>Email: <?php echo $row_respTecn['email'];?></span></div>
										<div class="mb-3 col-md-12 text-center bg-light-subtle"><span>Telefone: <?php echo Mask("(##)#####-####",$row_respTecn['telefone']);?></span></div>
									</div>
								</div>
							</div>
							<?php
						}?>
						<?php
					#=======================================LOCALLL INFOOOO==========================================================
						$sql_localInfo = "SELECT * FROM local_info WHERE LId='$cliente_LocalInfo'";
						$result_localInfo = mysqli_query($conn,$sql_localInfo);
						$row_localInfo = mysqli_fetch_assoc($result_localInfo);
						$info_padraoEntrada = $row_localInfo['Padrao_entrada'];
						$info_localInsta = $row_localInfo['Local_insta'];
						$info_equipamento = $row_localInfo['Equipamento'];

						$sql_padraoEntrada = "SELECT * FROM padrao_entrada WHERE PEId='$info_padraoEntrada'";
						$result_padraoEntrada = mysqli_query($conn,$sql_padraoEntrada);

						if(mysqli_num_rows($result_padraoEntrada)>0){
							$row_padraoEntrada = mysqli_fetch_assoc($result_padraoEntrada);
							?>
							<div class="accordion-item">
								<h2 class="accordion-header" id="panelsStayOpen-headingThree">
									<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
										<h3>Padrão de Entrada</h3>
									</button>
								</h2>
								<div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree">
									<div class="accordion-body">
										<div class="mb-3 col-md-12 text-center"><span>Concessionária: <?php echo $row_padraoEntrada['Concessionaria'];?></span></div>
										<div class="mb-3 col-md-12 text-center"><span>Tipo de Cliente: <?php echo $row_padraoEntrada['Tipo'];?></span></div>
										<div class="mb-3 col-md-12 text-center bg-light-subtle"><span>Demanda Contratada: <?php echo $row_padraoEntrada['Demanda'];?></span></div>
										<div class="mb-3 col-md-12 text-center bg-light-subtle"><span>Valor do Contrato: R$<?php echo $row_padraoEntrada['Valor_contrato'];?></span></div>
										<div class="mb-3 col-md-12 text-center"><span>Tipo de Ligação: <?php echo $row_padraoEntrada['Ligacao'];?></span></div>
										<div class="mb-3 col-md-12 text-center"><span>Tensão nominal: <?php echo $row_padraoEntrada['Tensao'];?>V</span></div>
										<div class="mb-3 col-md-12 text-center"><span>Modelo do medidor: <?php echo $row_padraoEntrada['Model_medidor'];?></span></div>
										<div class="mb-3 col-md-12 text-center bg-light-subtle"><span>Observação sobre Medidor: <?php echo $row_padraoEntrada['Obs_medidor'];?></span></div>
										<div class="mb-3 col-md-12 text-center bg-light-subtle"><span>Corrente do Disjuntor: <?php echo $row_padraoEntrada['Corrente_Disj'];?>A</span></div>
										<div class="mb-3 col-md-12 text-center bg-light-subtle"><span>Possui Aterramento?: <?php echo $row_padraoEntrada['Aterramento'];?></span></div>
										<div class="mb-3 col-md-12 text-center bg-light-subtle"><span>Condição: <?php echo $row_padraoEntrada['Condicao'];?></span></div>
										<div class="mb-3 col-md-12 text-center"><span>Altura da caixa: <?php echo $row_padraoEntrada['altura_caixa'];?>cm</span></div>
										<div class="mb-3 col-md-12 text-center"><span>Lagura da caixa: <?php echo $row_padraoEntrada['largura_caixa'];?>cm</span></div>
										<div class="mb-3 col-md-12 text-center"><span>Bitola do Cabo: <?php echo $row_padraoEntrada['bitola_cabo'];?>mm²</span></div>
									</div>
								</div>
							</div>
							<?php
						}?>
						<!---------------------------------------------------------ATENCAOOOO AQUIIIIII-------------------->
						<?php
						$sql_quadros = "SELECT * FROM quadros WHERE ClientId='$id_cliente'";
						$result_quadros = mysqli_query($conn,$sql_quadros);
						if(mysqli_num_rows($result_quadros)>0){
							$contador_quadro = 1;
							while ($row_quadros = mysqli_fetch_assoc($result_quadros)) {
								?>
								<div class="accordion-item">
									<h2 class="accordion-header" id="panelsStayOpen-headingFour<?php echo $contador_quadro;?>">
										<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFour<?php echo $contador_quadro;?>" aria-expanded="false" aria-controls="panelsStayOpen-collapseFour<?php echo $contador_quadro;?>">
											<h3>Quadro de Energia <?php echo $contador_quadro;?></h3>
										</button>
									</h2>
									<div id="panelsStayOpen-collapseFour<?php echo $contador_quadro;?>" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingFour<?php echo $contador_quadro;?>">
										<div class="accordion-body">
											<div class="mb-3 col-md-12 text-center bg-light-subtle"><span>Corrente do Disjuntor: <?php echo $row_quadros['Corrente_Disjuntor'];?>A</span></div>
											<div class="mb-3 col-md-12 text-center bg-light-subtle"><span>Condição: <?php echo $row_quadros['condicoes'];?></span></div>
											<div class="mb-3 col-md-12 text-center"><span>Espaço Disponível: <?php echo $row_quadros['espaco_disp'];?></span></div>
											<div class="mb-3 col-md-12 text-center"><span>Aterrado?: <?php echo $row_quadros['aterramento'];?></span></div>
											<div class="mb-3 col-md-12 text-center"><span>Possui Dutos Livre?: <?php echo $row_quadros['duto_livre'];?></span></div>
										</div>
									</div>
								</div>
								<?php

								$contador_quadro++;
							}
						}?>
						<?php
						$sql_localInsta = "SELECT * FROM local_instal WHERE LIId='$info_localInsta'";
						$result_localInsta = mysqli_query($conn,$sql_localInsta);
						if(mysqli_num_rows($result_localInsta)>0){
							$row_localInsta = mysqli_fetch_assoc($result_localInsta);
							?>
							<div class="accordion-item">
								<h2 class="accordion-header" id="panelsStayOpen-headingFive">
									<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFive" aria-expanded="false" aria-controls="panelsStayOpen-collapseFive">
										<h3>Local de Instalação</h3>
									</button>
								</h2>
								<div id="panelsStayOpen-collapseFive" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingFive">
									<div class="accordion-body">
										<div class="mb-3 col-md-12 text-center bg-light-subtle"><span>Local: <?php echo $row_localInsta['local'];?></span></div>
										<div class="mb-3 col-md-12 text-center bg-light-subtle"><span>Idade: <?php echo $row_localInsta['Idade'];?> Anos</span></div>
										<div class="mb-3 col-md-12 text-center bg-light-subtle"><span>Material: <?php echo $row_localInsta['Material'];?></span></div>
										<div class="mb-3 col-md-12 text-center"><span>Condição: <?php echo $row_localInsta['condicoes'];?></span></div>
										<div class="mb-3 col-md-12 text-center"><span>Nivelamento do Solo: <?php echo $row_localInsta['nivel_solo'];?></span></div>
										<div class="mb-3 col-md-12 text-center"><span>Tipo de Solo: <?php echo $row_localInsta['tipo_solo'];?></span></div>
										<div class="mb-3 col-md-12 text-center"><span>Dimensao: <?php echo $row_localInsta['dimensao'];?>m²</span></div>
									</div>
								</div>
							</div>
							<?php
						}?>
						<!---------------------------------------------------------ATENCAOOOO AQUIIIIII-------------------->
						<?php
						$sql_telhados = "SELECT * FROM telhados WHERE Client_Id='$id_cliente'";
						$result_telhados = mysqli_query($conn,$sql_telhados);
						if(mysqli_num_rows($result_telhados)>0){
							$contador_telhados = 1;
							while ($row_telhados = mysqli_fetch_assoc($result_telhados)) {
								?>
								<div class="accordion-item">
									<h2 class="accordion-header" id="panelsStayOpen-headingSix<?php echo $contador_telhados;?>">
										<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseSix<?php echo $contador_telhados;?>" aria-expanded="false" aria-controls="panelsStayOpen-collapseSix<?php echo $contador_telhados;?>">
											<h3>Telhado <?php echo $contador_telhados;?></h3>
										</button>
									</h2>
									<div id="panelsStayOpen-collapseSix<?php echo $contador_telhados;?>" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingSix<?php echo $contador_telhados;?>">
										<div class="accordion-body">
											<div class="mb-3 col-md-12 text-center bg-light-subtle"><span>Orientação: <?php echo $row_telhados['Orientacao'];?></span></div>
											<div class="mb-3 col-md-12 text-center bg-light-subtle"><span>Inclinação: <?php echo $row_telhados['inclinacao'];?> graus</span></div>
											<div class="mb-3 col-md-12 text-center bg-light-subtle"><span>Largura: <?php echo $row_telhados['largura'];?>m</span></div>
											<div class="mb-3 col-md-12 text-center bg-light-subtle"><span>Comprimento: <?php echo $row_telhados['comprimento'];?>m</span></div>
											<div class="mb-3 col-md-12 text-center bg-light-subtle"><span>Tipo: <?php echo $row_telhados['tipo'];?></span></div>
											<div class="mb-3 col-md-12 text-center"><span>Distância das Ripas: <?php echo $row_telhados['dist_ripas'];?>cm</span></div>
											<div class="mb-3 col-md-12 text-center"><span>Distância dos Caibos: <?php echo $row_telhados['dist_caibos'];?>cm</span></div>
											<div class="mb-3 col-md-12 text-center"><span>Distância das Terças: <?php echo $row_telhados['dist_terca'];?>cm</span></div>
											<div class="mb-3 col-md-12 text-center"><span>Distância da Viga: <?php echo $row_telhados['dist_viga'];?>cm</span></div>
											<div class="mb-3 col-md-12 text-center"><span>Altura: <?php echo $row_telhados['altura'];?>m</span></div>
											<div class="mb-3 col-md-12 text-center"><span>Acesso: <?php echo $row_telhados['acesso'];?></span></div>
										</div>
									</div>
								</div>
								<?php

								$contador_telhados++;
							}
						}?>
						<?php
						$sql_equipamento = "SELECT * FROM equipamento WHERE EQId='$info_equipamento'";
						$result_equipamento = mysqli_query($conn,$sql_equipamento);
						if(mysqli_num_rows($result_equipamento)>0){
							$row_equipamento = mysqli_fetch_assoc($result_equipamento);
							?>
							<div class="accordion-item">
								<h2 class="accordion-header" id="panelsStayOpen-headingSeven">
									<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseSeven" aria-expanded="false" aria-controls="panelsStayOpen-collapseSeven">
										<h3>Equipamento</h3>
									</button>
								</h2>
								<div id="panelsStayOpen-collapseSeven" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingSeven">
									<div class="accordion-body">
										<div class="mb-3 col-md-12 text-center bg-light-subtle"><span>Local do Inversor: <?php echo $row_equipamento['Loc_inversor'];?></span></div>
										<div class="mb-3 col-md-12 text-center bg-light-subtle"><span>Local do Stringbox: <?php echo $row_equipamento['loc_stringbox'];?></span></div>
										<div class="mb-3 col-md-12 text-center bg-light-subtle"><span>Ponto de Internet: <?php echo $row_equipamento['ponto_internet'];?></span></div>
										<div class="mb-3 col-md-12 text-center bg-light-subtle"><span>Tipo de Comunicação: <?php echo $row_equipamento['tipo_comu'];?></span></div>
									</div>
								</div>
							</div>
							<?php
						}?>
						<?php
						$sql_visita = "SELECT * FROM visita WHERE VId='$cliente_visita'";
						$result_visita = mysqli_query($conn,$sql_visita);
						if(mysqli_num_rows($result_visita)>0){
							$row_visita = mysqli_fetch_assoc($result_visita);
							?>
							<div class="accordion-item">
								<h2 class="accordion-header" id="panelsStayOpen-headingEight">
									<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseEight" aria-expanded="false" aria-controls="panelsStayOpen-collapseEight">
										<h3>Visita</h3>
									</button>
								</h2>

								<div id="panelsStayOpen-collapseEight" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingEight">
									<div class="accordion-body">
										<div class="mb-3 col-md-12 text-center bg-light-subtle"><span>Data: <?php echo date("d/m/Y", strtotime($row_visita['Data']));?></span></div>
										<div class="mb-3 col-md-12 text-center bg-light-subtle"><span>Hora: <?php echo $row_visita['Hora'];?></span></div>
										<div class="mb-3 col-md-12 text-center bg-light-subtle"><span>Responsável: <?php echo $row_visita['Resp'];?></span></div>
										<div class="mb-3 col-md-12 text-center bg-light-subtle"><span>Situação: <?php echo $row_client['Sit_descr'];?></span></div>
									</div>
								</div>
							</div>
							<?php
						}?>
					</div>

				</div>
			</div>
			<!-- <button type="submit" class="btn btn-danger col-md-3" disabled>Gerar PDF</button>-->
		</div>


		<?php

	}
}
include "../viewparts/footer.php";
?>