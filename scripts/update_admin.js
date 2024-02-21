
let contarQuadrosExistentes = document.getElementById("todosQuadros").childElementCount;
let contador = contarQuadrosExistentes/7;
const addQuadro=()=>{
	contador++;
	if(contador>5){
		alert("Valor máximo de quadros atigindo")
	}else{
		const titulo = document.createElement('h4');
		titulo.innerHTML = "Novo Quadro";

		const inputDiv = document.createElement('div');
		const select1Div = document.createElement('div');
		const select2Div = document.createElement('div');
		const select3Div = document.createElement('div');
		const select4Div = document.createElement('div');

		const labelCorrente = document.createElement('label');
		const inputCorrente = document.createElement('input');

		const selectCondicao = document.createElement('select');
		const op1Selected = document.createElement('option');
		const op1Condicao = document.createElement('option');
		const op2Condicao = document.createElement('option');

		const selectEspaco = document.createElement('select');
		const op2Selected = document.createElement('option');
		const op1Espaco = document.createElement('option');
		const op2Espaco = document.createElement('option');

		const selectAterro = document.createElement('select');
		const op3Selected = document.createElement('option');
		const op1Aterro = document.createElement('option');
		const op2Aterro = document.createElement('option');

		const selectDuto = document.createElement('select');
		const op4Selected = document.createElement('option');
		const op1Duto = document.createElement('option');
		const op2Duto = document.createElement('option');

		const linha = document.createElement('hr');

		labelCorrente.setAttribute('class', 'form-label');
		labelCorrente.innerHTML = "Corrente do Disjuntor";
		inputCorrente.setAttribute('type','text');
		inputCorrente.setAttribute('class','form-control');
		inputCorrente.setAttribute('name','correteDisjQ['+contador+']');
		inputDiv.setAttribute('class', 'mb-3');
		inputDiv.appendChild(labelCorrente);
		inputDiv.appendChild(inputCorrente);


		selectCondicao.setAttribute('class', 'form-select');
		selectCondicao.setAttribute('name','condGeralQ['+contador+']');
		op1Selected.setAttribute('selected',true);
		op1Selected.text = "Condição Geral";
		op1Condicao.value = "boa";
		op1Condicao.text = "Boa";
		op2Condicao.value = "ruim";
		op2Condicao.text = "Ruim";
		selectCondicao.add(op1Selected,null);
		selectCondicao.add(op1Condicao,null);
		selectCondicao.add(op2Condicao,null);
		select1Div.setAttribute('class', 'mb-3 col-md-6');
		select1Div.appendChild(selectCondicao);


		selectEspaco.setAttribute('class', 'form-select');
		selectEspaco.setAttribute('name','espaDispoQ['+contador+']');
		op2Selected.setAttribute('selected',true);
		op2Selected.text = "Espaço Disponível";
		op1Espaco.value = "sim";
		op1Espaco.text = "Sim";
		op2Espaco.value = "nao";
		op2Espaco.text = "Não";
		selectEspaco.add(op2Selected,null);
		selectEspaco.add(op1Espaco,null);
		selectEspaco.add(op2Espaco,null);
		select2Div.setAttribute('class', 'mb-3 col-md-6');
		select2Div.appendChild(selectEspaco);


		selectAterro.setAttribute('class', 'form-select');
		selectAterro.setAttribute('name','aterramentoQ['+contador+']');
		op3Selected.setAttribute('selected',true);
		op3Selected.text = "Aterramento";
		op1Aterro.value = "sim";
		op1Aterro.text = "Sim";
		op2Aterro.value = "nao";
		op2Aterro.text = "Não";
		selectAterro.add(op3Selected,null);
		selectAterro.add(op1Aterro,null);
		selectAterro.add(op2Aterro,null);
		select3Div.setAttribute('class', 'mb-3 col-md-6');
		select3Div.appendChild(selectAterro);


		selectDuto.setAttribute('class', 'form-select');
		selectDuto.setAttribute('name','dutoLivreQ['+contador+']');
		op4Selected.setAttribute('selected',true);
		op4Selected.text = "Dutos Livres";
		op1Duto.value = "sim";
		op1Duto.text = "Sim";
		op2Duto.value = "nao";
		op2Duto.text = "Não";
		selectDuto.add(op4Selected,null);
		selectDuto.add(op1Duto,null);
		selectDuto.add(op2Duto,null);
		select4Div.setAttribute('class', 'mb-3 col-md-6');
		select4Div.appendChild(selectDuto);


		const divMaster = document.getElementById('todosQuadros');
		divMaster.appendChild(titulo);
		divMaster.appendChild(inputDiv)
		divMaster.appendChild(select1Div);
		divMaster.appendChild(select2Div);
		divMaster.appendChild(select3Div);
		divMaster.appendChild(select4Div);
		divMaster.appendChild(linha);
	}
}

let contarTelhadosExistentes = document.getElementById("todosTelhados").childElementCount;
let contadorT = contarTelhadosExistentes/13;
const addTelhado=()=>{
	contadorT++;
	if(contadorT>5){
		alert("Valor máximo de telhados atigindo")
	}else{
		const titulo = document.createElement('h4');
		titulo.innerHTML = "Novo Telhado";

		const divOrienteacao = document.createElement('div');
		const labelOrientacao = document.createElement('label');
		const inputOrientacao = document.createElement('input');
		labelOrientacao.setAttribute('class','form-label');
		labelOrientacao.innerHTML = "Orientação";
		inputOrientacao.setAttribute('class','form-control');
		inputOrientacao.setAttribute('type','text');
		inputOrientacao.setAttribute('name','orientacaoTel['+contadorT+']');
		divOrienteacao.setAttribute('class','mb-3 col-md-2');
		divOrienteacao.appendChild(labelOrientacao);
		divOrienteacao.appendChild(inputOrientacao);


		const divInclinacao = document.createElement('div');
		const labelInclinacao = document.createElement('label');
		const inputInclinacao = document.createElement('input');
		labelInclinacao.setAttribute('class','form-label');
		labelInclinacao.innerHTML = "Inclinação";
		inputInclinacao.setAttribute('class','form-control');
		inputInclinacao.setAttribute('type','text');
		inputInclinacao.setAttribute('name','inclinacaoTel['+contadorT+']');
		divInclinacao.setAttribute('class','mb-3 col-md-2');
		divInclinacao.appendChild(labelInclinacao);
		divInclinacao.appendChild(inputInclinacao);


		const divLargura = document.createElement('div');
		const labelLagura = document.createElement('label');
		const inputLargura = document.createElement('input');
		labelLagura.setAttribute('class','form-label');
		labelLagura.innerHTML = "Largura";
		inputLargura.setAttribute('class','form-control');
		inputLargura.setAttribute('type','text');
		inputLargura.setAttribute('name','larguraTel['+contadorT+']');
		divLargura.setAttribute('class','mb-3 col-md-2');
		divLargura.appendChild(labelLagura);
		divLargura.appendChild(inputLargura);


		const divComprimento = document.createElement('div');
		const labelComprimento = document.createElement('label');
		const inputComprimento = document.createElement('input');
		labelComprimento.setAttribute('class','form-label');
		labelComprimento.innerHTML = "Comprimento";
		inputComprimento.setAttribute('class','form-control');
		inputComprimento.setAttribute('type','text');
		inputComprimento.setAttribute('name','comprimentoTel['+contadorT+']');
		divComprimento.setAttribute('class','mb-3 col-md-2');
		divComprimento.appendChild(labelComprimento);
		divComprimento.appendChild(inputComprimento);



		const divAltura = document.createElement('div');
		const labelAltura = document.createElement('label');
		const inputAltura = document.createElement('input');
		labelAltura.setAttribute('class','form-label');
		labelAltura.innerHTML = "Altura";
		inputAltura.setAttribute('class','form-control');
		inputAltura.setAttribute('type','text');
		inputAltura.setAttribute('name','alturaTel['+contadorT+']');
		divAltura.setAttribute('class','mb-3 col-md-2');
		divAltura.appendChild(labelAltura);
		divAltura.appendChild(inputAltura);


		const divTipo = document.createElement('div');
		const labelTipo = document.createElement('label');
		const inputTipo = document.createElement('input');
		labelTipo.setAttribute('class','form-label');
		labelTipo.innerHTML = "Tipo";
		inputTipo.setAttribute('class','form-control');
		inputTipo.setAttribute('type','text');
		inputTipo.setAttribute('name','tipoTel['+contadorT+']');
		divTipo.setAttribute('class','mb-3 col-md-2');
		divTipo.appendChild(labelTipo);
		divTipo.appendChild(inputTipo);


		const divRipas = document.createElement('div');
		const labelRipas = document.createElement('label');
		const inputRipas = document.createElement('input');
		labelRipas.setAttribute('class','form-label');
		labelRipas.innerHTML = "Distância das Ripas";
		inputRipas.setAttribute('class','form-control');
		inputRipas.setAttribute('type','text');
		inputRipas.setAttribute('name','ripasTel['+contadorT+']');
		divRipas.setAttribute('class','mb-3 col-md-3');
		divRipas.appendChild(labelRipas);
		divRipas.appendChild(inputRipas);


		const divCaibos = document.createElement('div');
		const labelCaibos = document.createElement('label');
		const inputCaibos = document.createElement('input');
		labelCaibos.setAttribute('class','form-label');
		labelCaibos.innerHTML = "Distância das Caibos";
		inputCaibos.setAttribute('class','form-control');
		inputCaibos.setAttribute('type','text');
		inputCaibos.setAttribute('name','caibosTel['+contadorT+']');
		divCaibos.setAttribute('class','mb-3 col-md-3');
		divCaibos.appendChild(labelCaibos);
		divCaibos.appendChild(inputCaibos);


		const divTercas = document.createElement('div');
		const labelTercas = document.createElement('label');
		const inputTercas = document.createElement('input');
		labelTercas.setAttribute('class','form-label');
		labelTercas.innerHTML = "Distância das Terças";
		inputTercas.setAttribute('class','form-control');
		inputTercas.setAttribute('type','text');
		inputTercas.setAttribute('name','tercasTel['+contadorT+']');
		divTercas.setAttribute('class','mb-3 col-md-3');
		divTercas.appendChild(labelTercas);
		divTercas.appendChild(inputTercas);


		const divViga = document.createElement('div');
		const labelViga = document.createElement('label');
		const inputViga = document.createElement('input');
		labelViga.setAttribute('class','form-label');
		labelViga.innerHTML = "Distância da Viga";
		inputViga.setAttribute('class','form-control');
		inputViga.setAttribute('type','text');
		inputViga.setAttribute('name','vigaTel['+contadorT+']');
		divViga.setAttribute('class','mb-3 col-md-3');
		divViga.appendChild(labelViga);
		divViga.appendChild(inputViga);


		const acesso = document.createElement('select');
		const acessoOp1 = document.createElement('option');
		const acessoOp2 = document.createElement('option');
		const acessoOp3 = document.createElement('option');
		const acessoOp4 = document.createElement('option');
		acesso.setAttribute('class','form-select mb-3');
		acesso.setAttribute('name','acessoTel['+contadorT+']');
		acessoOp1.setAttribute('selected',true);
		acessoOp1.text = "Acesso";
		acessoOp2.text = "Andaime";
		acessoOp2.value = "andaime"
		acessoOp3.text = "Escada";
		acessoOp3.value = "escada"
		acessoOp4.text = "Plataforma";
		acessoOp4.value = "plataforma"
		acesso.add(acessoOp1,null);
		acesso.add(acessoOp2,null);
		acesso.add(acessoOp3,null);
		acesso.add(acessoOp4,null);



		const linha = document.createElement('hr');


		const divMasterT = document.getElementById('todosTelhados');
		divMasterT.appendChild(titulo);
		divMasterT.appendChild(divOrienteacao);
		divMasterT.appendChild(divInclinacao);
		divMasterT.appendChild(divLargura);
		divMasterT.appendChild(divComprimento);
		divMasterT.appendChild(divAltura);
		divMasterT.appendChild(divTipo);
		divMasterT.appendChild(divRipas);
		divMasterT.appendChild(divCaibos);
		divMasterT.appendChild(divTercas);
		divMasterT.appendChild(divViga);
		divMasterT.appendChild(acesso);
		divMasterT.appendChild(Linha);

	}

}