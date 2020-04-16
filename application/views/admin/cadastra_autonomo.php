

<div class="container">
	<div class="col-12">

	  <!-- Basic Card Example -->
	  <div class="card shadow mb-4">
		<div class="card-header py-3">
		  <h6 class="m-0 font-weight-bold text-primary">Cadastrar Autônomo</h6>
		</div>
		<div class="card-body">

			<form id="form">
				<div class="row">
				  <div class="form-group col-6">
					<label for="nome">Nome</label>
					<input type="text" class="form-control" id="nome" name="nome">
				  </div>
				  
				  <div class="form-group col-6">
					<label for="telefone">Telefone</label>
					<input type="text" class="form-control" id="telefone" name="telefone">
				  </div>			  
				</div>
				
				<div class="row">
				  <div class="form-group col-9">
					<label for="forma_de_pagamento">Formas de Pagamento</label>
					<input type="text" class="form-control" id="forma_de_pagamento" name="forma_de_pagamento" placeholder="Preencher utilizando a barra(/) para vários formas de pamagamento. Ex: Dinheiro / Débito / Crédito">
				  </div>
				  
				  <div class="form-group col-3">
					  <div class="form-group">
						<label for="id_categoria">Estado</label>
						<select class="form-control" id="id_estado" name="id_estado">
							<?php foreach($estados as $estado){ ?>
								<option value="<?=$estado->id?>"><?=$estado->nome?></option>
							<?php } ?>
						</select>
					  </div>
				  </div>				  
				  
				</div>
				
			  <div class="form-group">
				<label for="area_de_cobertura">Área de Cobertura</label>
				<textarea class="form-control" id="area_de_cobertura" name="area_de_cobertura" rows="3" placeholder="Preencher utilizando a barra(/) para vários locais. Ex: Zona Sul / Centro / Barra"></textarea>
			  </div>		  
			  
			  <div class="row">
				  <div class="form-group col-12">
					  <div class="form-group">
						<label for="id_categoria">Categoria</label>
						<select multiple class="form-control js-example-basic-multiple" id="id_categoria" name="id_categoria" onchange="seleciona(this)">
							<?php foreach($categorias as $cat){ ?>
								<option value="<?=$cat->id?>"><?=$cat->categoria?></option>
							<?php } ?>
						</select>
					  </div>
				  </div>
			  </div>	  
				  
			  <div class="custom-file">
				<input type="file" class="custom-file-input" name="foto" id="foto" required>
				<label class="custom-file-label" for="foto">Selecionar foto...</label>
			  </div>			  
					
			  <button type="button" onclick="envia()" class="btn btn-primary mt-3">Salvar</button>
			</form>
			
			<div id="loaderContainer" style="display:none;">
				<div class="mt-3 text-center">
					Enviando...
				</div>
				<div class="loader col-3 offset-5" id="loader"></div>
			</div>
		</div>
	  </div>

	</div>
</div>



<script>
	function envia(){

		let form = new FormData();
		
		var foto = document.querySelector('input[type="file"]')
		
		form.append("nome", document.getElementById('nome').value);
		form.append("telefone", document.getElementById('telefone').value);
		form.append("forma_de_pagamento", document.getElementById('forma_de_pagamento').value);
		form.append("id_categoria", seleciona(document.getElementById('id_categoria')));
		form.append("id_estado", seleciona(document.getElementById('id_estado')));
		form.append("area_de_cobertura", document.getElementById('area_de_cobertura').value);
		form.append("foto", foto.files[0]);
		
		document.getElementById("form").style.display = "none";
		document.getElementById("loaderContainer").style.display = "block";
		
		fetch('<?=base_url()."admin/cadastrarautonomo";?>',{
			method: "POST",
			body: form
		}).then(function(response){
			if(response.ok){
				response.json().then(function(data){
					document.getElementById("loaderContainer").style.display = "none";
					document.getElementById("form").insertAdjacentHTML("afterend", `<div class="mt-3 alert alert-primary text-center" role="alert">
				${data.msg}</div>`);
					document.getElementById("form").reset();
					document.getElementById("form").style.display = "block";
					document.getElementById("foto").innerHTML = "Selecionar foto";
				})				
			}else{
				console.log('Ocorreu algum erro de rede');
			}	
		}).catch(function(error){
			console.log(error.message);
		})
	}
	
	function seleciona(sel){
		
		let values = $(sel).val();
		return values;
	}
	
	$(document).ready(function(){
		$('.js-example-basic-multiple').select2({
			language:{
				noResults: function(){
					return "Nenhum resultado encontrado";
				}
			}
		});
	});	
</script>