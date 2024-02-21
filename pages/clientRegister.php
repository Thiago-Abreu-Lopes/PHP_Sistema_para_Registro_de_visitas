<?php
include "../viewparts/header_geralCol.php";
session_start();
if(isset($_SESSION['acess_user'])){
  if($_SESSION['acess_user']['tipo']!="col"){
    header("location: ../pages/clientRegister_admin.php");
    exit();
  }
}else{
  header("location: ../");
  exit();
}
?>


<h1 class="mb-3">Cadastro de Clientes</h1>
<hr/>
<div class="container">
	<form class="mt-2 row g-3" action="../actionpages/include_clientes.php" method="POST" enctype="multipart/form-data">
		<!--Info dos clientes-->
		<h4>Informações do Cliente</h4>
		<div class="mb-3 col-md-6">
			<label class="form-label">Nome Completo</label>
			<input type="text" class="form-control" name="nome_Completo" required>
		</div>

		<div class="mb-3 col-md-6">
			<label class="form-label">Responsável</label>
			<input type="text" class="form-control" name="Responsavel">
		</div>
		

		<label class="form-label col-md-4">Tipo de Cliente</label>
		<div class="form-check col-md-4">
			<input class="form-check-input" type="radio" name="Info_Radio" value="CPF" checked>
			<label class="form-check-label">
				CPF
			</label>
		</div>
		<div class="form-check col-md-4">
			<input class="form-check-input" type="radio" name="Info_Radio" value="CNPJ">
			<label class="form-check-label">
				CNPJ
			</label>
		</div>

		

		<div class="mb-3 col-md-4">
			<label class="form-label">CPF/CNPJ</label>
			<input type="text" class="form-control" name="CPF_CNPJ">
		</div>

		<div class="mb-3 col-md-4">
			<label class="form-label">Email</label>
			<input type="email" class="form-control" name="Client_Email">
		</div>

		<div class="mb-3 col-md-4">
			<label class="form-label">Telefone</label>
			<input type="text" class="form-control" name="Client_Phone">
		</div>

		<hr/>
		<!--RESPTEcnico-->
		<h4>Responsável Técnico</h4>

		<div class="mb-3 col-md-6">
			<label class="form-label">Empresa</label>
			<input type="text" class="form-control" name="Empresa_Responsavel">
		</div>

		<div class="mb-3 col-md-6">
			<label class="form-label">CNPJ</label>
			<input type="text" class="form-control" name="CNPJ_Responsavel">
		</div>

		<div class="mb-3 col-md-4">
			<label class="form-label">Responsável</label>
			<input type="text" class="form-control" name="Pessoa_Responsavel">
		</div>

		<div class="mb-3 col-md-4">
			<label class="form-label">Telefone</label>
			<input type="text" class="form-control" name="Responsavel_Phone">
		</div>

		<div class="mb-3 col-md-4">
			<label class="form-label">Email</label>
			<input type="email" class="form-control" name="Responsavel_Mail">
		</div>




		<hr/>

		<!--Endereco-->
		<h4>Endereço</h4>
		<div class="mb-3 col-md-3">
			<label class="form-label">CEP</label>
			<input type="text" id="cep" class="form-control" name="CEP">
		</div>
		<div class="mb-3 col-md-5">
			<label class="form-label">Logradouro</label>
			<input type="text" id="logradouro" class="form-control" name="Logradouro">
		</div>

		<div class="mb-3 col-md-4">
			<label class="form-label">Número</label>
			<input type="text" class="form-control" name="numero_Endereco">
		</div>

		<div class="mb-3 col-md-3">
			<label class="form-label">Complemento</label>
			<input type="text" id="complemento" class="form-control" name="complemento_Endereco">
		</div>
		<div class="mb-3 col-md-3">
			<label class="form-label">Bairro</label>
			<input type="text" id="bairro" class="form-control" name="bairro_Endereco">
		</div>
		<div class="mb-3 col-md-3">
			<label class="form-label">Cidade</label>
			<input type="text" id="cidade" class="form-control" name="cidade_Endereco">
		</div>
		<div class="mb-3 col-md-3">
			<label class="form-label">Estado</label>
			<input type="text" id="uf" class="form-control" name="estado_Endereco">
		</div>
		<hr/>
		<!--InfoLocias-->
		<h3>Informações Locais</h3>
		<hr/>
		<h4>Padrão de Entrada</h4>
		<div class="mb-3 col-md-12">
			<label class="form-label">Concessionária</label>
			<input type="text" class="form-control" name="concessionaria">
		</div>

		<label class="form-label col-md-3">Demanda Contratada</label>
		<div class="form-check col-md-3">
			<input class="form-check-input" type="radio" name="Demanda_Radio" id="DemandaRadio1" value="Sim" checked>
			<label class="form-check-label">
				Sim
			</label>
		</div>
		<div class="form-check col-md-3">
			<input class="form-check-input" type="radio" name="Demanda_Radio" id="DemandaRadio2" value="Nao">
			<label class="form-check-label">
				Não
			</label>
		</div>

		<div class="mb-3 col-md-3">
			<label class="form-label">Valor do Contrato</label>
			<input type="text" class="form-control" name="valor_Contrato">
		</div>
		<div class="mb-3 col-md-3">
			<select class="form-select" name="tipo_cliente">
				<option selected>Tipo de Cliente</option>
				<option value="A1">A1</option>
				<option value="A2">A2</option>
				<option value="A3">A3</option>
				<option value="A4">A4</option>
				<option value="A5">A5</option>
				<option value="B1">B1</option>
				<option value="B2">B2</option>
				<option value="B3">B3</option>
				<option value="B4">B4</option>
			</select>
		</div>
		
		<div class="mb-3 col-md-3">
			<select class="form-select" name="tipo_ligacao">
				<option selected>Tipo de Ligação</option>
				<option value="mono">Monofásico</option>
				<option value="bi">Bifásico</option>
				<option value="tri">Trifásico</option>
			</select>
		</div>

		<div class="mb-3 col-md-3">
			<select class="form-select" name="tesao_nominal">
				<option selected>Tensão Nominal</option>
				<option value="220">220V</option>
				<option value="127">127V</option>
			</select>
		</div>

		<div class="mb-3 col-md-3">
			<select class="form-select" name="modelo_medidor">
				<option selected>Modelo do Medidor</option>
				<option value="digital">Digital</option>
				<option value="analogica">Analógico</option>
			</select>
		</div>

		<div class="mb-3 col-md-10">
			<label class="form-label">Observação sobre o Medidor</label>
			<input type="textarea" class="form-control" name="observacao_Medidor">
		</div>

		<div class="mb-3 col-md-2">
			<label class="form-label">Corrente do Disjuntor</label>
			<input type="text" class="form-control" name="corrente_Disjuntor">
		</div>

		<label class="form-label col-md-2">Existe Aterramento?</label>
		<div class="form-check col-md-2">
			<input class="form-check-input" type="radio" name="Aterramento_Radio" value="Sim" checked>
			<label class="form-check-label" >
				Sim
			</label>
		</div>
		<div class="form-check col-md-2">
			<input class="form-check-input" type="radio" name="Aterramento_Radio" value="Nao">
			<label class="form-check-label">
				Não
			</label>
		</div>
		<div class="mb-3 col-md-6">
			<select class="form-select mb-3" name="condicao_geral">
				<option selected>Condição Geral</option>
				<option value="boa">Boa</option>
				<option value="adequar">Adequar</option>
			</select>
		</div>

		<div class="mb-3 col-md-4">
			<label class="form-label">Altura da Caixa</label>
			<input type="text" class="form-control" name="altura_Caixa">
		</div>
		<div class="mb-3 col-md-4">
			<label class="form-label">Largura da Caixa</label>
			<input type="text" class="form-control" name="largura_Caixa">
		</div>
		<div class="mb-3 col-md-4">
			<label class="form-label">Bitola do Cabo</label>
			<input type="text" class="form-control" name="bitola_Cabo">
		</div>

		<div class="input-group mb-3">
			<label class="input-group-text" >Enviar Imagem</label>
			<input type="file" class="form-control" name="Caixa_images[]" multiple>
		</div>


		<hr/>
		<!--Pode ter mais de um LEMBRARRR-->
		<div class="mt-2 row g-3" id="todosQuadros">
			<h4>Quadro de Energia 1</h4>
			<div class="mb-3">
				<label  class="form-label">Corrente do Disjuntor</label>
				<input type="text" class="form-control" name="correteDisjQ[1]">
			</div>
			<div class="mb-3 col-md-6">
				<select class="form-select" name="condGeralQ[1]">
					<option selected>Condição Geral</option>
					<option value="boa">Boa</option>
					<option value="ruim">Ruim</option>
				</select>
			</div>
			<div class="mb-3 col-md-6">
				<select class="form-select" name="espaDispoQ[1]">
					<option selected>Espaço Disponível</option>
					<option value="sim">Sim</option>
					<option value="nao">Não</option>
				</select>
			</div>
			<div class="mb-3 col-md-6">
				<select class="form-select" name="aterramentoQ[1]">
					<option selected>Aterramento</option>
					<option value="sim">Sim</option>
					<option value="nao">Não</option>
				</select>
			</div>
			<div class="mb-3 col-md-6">
				<select class="form-select" name="dutoLivreQ[1]">
					<option selected>Dutos Livres</option>
					<option value="sim">Sim</option>
					<option value="nao">Não</option>
				</select>
			</div>
			<hr/>
		</div>
		<div class="input-group mb-3">
			<label class="input-group-text" >Enviar Imagem</label>
			<input type="file" class="form-control" name="quadro_images[]" multiple>
		</div>

		<button type="button" onclick="addQuadro()" class="btn btn-success col-md-2">Incluir outro Quadro</button>


		<hr/>
		<h4>Local de Instalação</h4>
		<select class="form-select mb-3" name="local_instalacao">
			<option selected>Local</option>
			<option value="telhado">Telhado</option>
			<option value="laje">Laje</option>
			<option value="solo">Solo</option>
		</select>

		<div class="mb-3">
			<label class="form-label">Idade</label>
			<input type="text" class="form-control" name="idade_Local">
		</div>

		<div class="mb-3 col-md-6">
			<select class="form-select" name="material_local">
				<option selected>Material</option>
				<option value="madeira">Madeira</option>
				<option value="metalica">Matálica</option>
			</select>
		</div>
		<div class="mb-3 col-md-6">
			<select class="form-select" name="condicao_local">
				<option selected>Condição Geral</option>
				<option value="boa">Boa</option>
				<option value="ruim">Ruim</option>
			</select>
		</div>
		<div class="mb-3 col-md-6">
			<select class="form-select" name="nivel_solo">
				<option selected>Nivelamento do Solo</option>
				<option value="plano">Plano</option>
				<option value="inclinado">Inclinado</option>
			</select>
		</div>
		<div class="mb-3 col-md-6">
			<select class="form-select" name="tipo_solo">
				<option selected>Tipo de Solo</option>
				<option value="concreto">Concreto</option>
				<option value="terra">Terra</option>
				<option value="gramado">Gramado</option>
				<option value="argiloso">Argiloso</option>
				<option value="arenoso">Arenoso</option>
				<option value="pedregulho">Pedregulho</option>
			</select>
		</div>
		<div class="input-group mb-3">
			<label class="input-group-text">Enviar Imagem</label>
			<input type="file" class="form-control" name="local_image[]" multiple>
		</div>

		<hr/>
		<!--Pode ter mais de um LEMBRARRR-->
		<div id="todosTelhados" class="mt-2 row g-3">
			<h4>Telhado 1</h4>
			<div class="mb-3 col-md-2">
				<label class="form-label">Orientação</label>
				<input type="text" class="form-control" name="orientacaoTel[1]">
			</div>
			<div class="mb-3 col-md-2">
				<label class="form-label">Inclinação</label>
				<input type="text" class="form-control" name="inclinacaoTel[1]">
			</div>
			<div class="mb-3 col-md-2">
				<label  class="form-label">Largura</label>
				<input type="text" class="form-control" name="larguraTel[1]">
			</div>
			<div class="mb-3 col-md-2">
				<label class="form-label">Comprimento</label>
				<input type="text" class="form-control" name="comprimentoTel[1]">
			</div>
			<div class="mb-3 col-md-2">
				<label class="form-label">Altura</label>
				<input type="text" class="form-control" name="alturaTel[1]">
			</div>
			<div class="mb-3 col-md-2">
				<label class="form-label">Tipo</label>
				<input type="text" class="form-control" name="tipoTel[1]">
			</div>

			<div class="mb-3 col-md-3">
				<label class="form-label">Distância das Ripas</label>
				<input type="text" class="form-control" name="ripasTel[1]">
			</div>
			<div class="mb-3 col-md-3">
				<label class="form-label">Distância dos Caibos</label>
				<input type="text" class="form-control" name="caibosTel[1]">
			</div>
			<div class="mb-3 col-md-3">
				<label class="form-label">Distância das Terças</label>
				<input type="text" class="form-control" name="tercasTel[1]">
			</div>
			<div class="mb-3 col-md-3">
				<label class="form-label">Distância da Viga</label>
				<input type="text" class="form-control" name="vigaTel[1]">
			</div>

			<select class="form-select mb-3" name="acessoTel[1]">
				<option selected>Acesso</option>
				<option value="andaime">Andaime</option>
				<option value="escada">Escada</option>
				<option value="plataforma">Plataforma</option>
			</select>
			<hr/>
		</div>
		<div class="input-group mb-3">
			<label class="input-group-text">Enviar Imagem</label>
			<input type="file" class="form-control" name="telhado_image[]" multiple>
		</div>
		
		<button type="button" onclick="addTelhado()" class="btn btn-success col-md-2">Incluir outro Telhado</button>
		<hr/>
		<!--Pode ter mais de um LEMBRARRR-->
		<h4>Equipamentos</h4>
		<div class="mb-3 col-md-6">
			<label class="form-label">Local do Inversor</label>
			<input type="text" class="form-control" name="local_Inversor">
		</div>
		<div class="mb-3 col-md-6">
			<label class="form-label">Local do Stringbox</label>
			<input type="text" class="form-control" name="local_stringbox">
		</div>

		<label class="form-label col-md-4">Ponto de Internet</label>
		<div class="form-check col-md-4">
			<input class="form-check-input" type="radio" name="Internet_Radio" value="sim" checked>
			<label class="form-check-label">
				Sim
			</label>
		</div>
		<div class="form-check col-md-4">
			<input class="form-check-input" type="radio" name="Internet_Radio" value="nao">
			<label class="form-check-label">
				Não
			</label>
		</div>

		<select class="form-select mb-3 col-md-6" name="tipo_comunicacao">
			<option selected>Tipo de Comunicação</option>
			<option value="Cabo">Cabo</option>
			<option value="WIFI">Wi-fi</option>
			<option value="Fibra">Fibra</option>
		</select>

		<hr/>
		<h4>Visita</h4>
		<div class="mb-3 col-md-4">
			<label class="form-label">Data da Visita</label>
			<input type="date" class="form-control" name="data_Visita">
		</div>
		<div class="mb-3 col-md-4">
			<label class="form-label">Hora da Visita</label>
			<input type="text" class="form-control" name="hora_Visita">
		</div>
		<div class="mb-3 col-md-4">
			<label class="form-label">Engenheiro Responsável da Visita</label>
			<input type="text" class="form-control" name="responsavel_Visita">
		</div>


		<hr/>
		<!--Pode ter mais de um LEMBRARRR-->
		<h4>Situação</h4>
		<select class="form-select mb-3" name="situacao_cliente">
			<option selected>Situação</option>
			<option value="Operacional">Operante</option>
			<option value="Estudo">Estudo</option>
			<option value="Cancelado">Cancelado</option>
		</select>
		<div class="mb-3">
			<label class="form-label">Descrição</label>
			<input type="textarea" class="form-control" name="situacao_Area">
		</div>


		<button type="submit" class="btn btn-warning col-md-3">Cadastrar</button>
	</form>

</div>

<script type="text/javascript" src="../scripts/register_admin.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
<script>
	$("#cep").blur(function(){
				// Remove tudo o que não é número para fazer a pesquisa
				var cep = this.value.replace(/[^0-9]/, "");
				
				// Validação do CEP; caso o CEP não possua 8 números, então cancela
				// a consulta
				if(cep.length != 8){
					return false;
				}
				
				// A url de pesquisa consiste no endereço do webservice + o cep que
				// o usuário informou + o tipo de retorno desejado (entre "json",
				// "jsonp", "xml", "piped" ou "querty")
				var url = "https://viacep.com.br/ws/"+cep+"/json/";
				
				// Faz a pesquisa do CEP, tratando o retorno com try/catch para que
				// caso ocorra algum erro (o cep pode não existir, por exemplo) a
				// usabilidade não seja afetada, assim o usuário pode continuar//
				// preenchendo os campos normalmente
				$.getJSON(url, function(dadosRetorno){
					try{
						// Preenche os campos de acordo com o retorno da pesquisa
						$("#logradouro").val(dadosRetorno.logradouro);
						$("#bairro").val(dadosRetorno.bairro);
						$("#cidade").val(dadosRetorno.localidade);
						$("#uf").val(dadosRetorno.uf);
					}catch(ex){}
				});
			});
		</script>
<?php
include "../viewparts/footer.php";
?>