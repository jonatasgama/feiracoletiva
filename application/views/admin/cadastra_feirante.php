

<div class="container">
	<div class="col-12">

	  <!-- Basic Card Example -->
	  <div class="card shadow mb-4">
		<div class="card-header py-3">
		  <h6 class="m-0 font-weight-bold text-primary">Cadastrar Feirante</h6>
		</div>
		<div class="card-body">

			<form id="form" enctype="multipart/formdata">
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
					<input type="text" class="form-control" id="forma_de_pagamento" name="forma_de_pagamento">
				  </div>
				  
				  <div class="form-group col-3">
					  <div class="form-group">
						<label for="faz_entrega">Faz Entrega?</label>
						<select class="form-control" id="faz_entrega" name="faz_entrega">
						  <option value="sim">sim</option>
						  <option value="não">não</option>
						</select>
					  </div>
				  </div>
				  
				</div>
			  <div class="form-group">
				<label for="endereco">Endereço</label>
				<textarea class="form-control" id="endereco" name="endereco" rows="3"></textarea>
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
		form.append("faz_entrega", document.getElementById('faz_entrega').value);
		form.append("endereco", document.getElementById('endereco').value);
		form.append("foto", foto.files[0]);
		
		document.getElementById("form").style.display = "none";
		document.getElementById("loaderContainer").style.display = "block";
		
		fetch('<?=base_url()."/admin/cadastrarFeirante";?>',{
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
				})				
			}else{
				console.log('Ocorreu algum erro de rede');
			}	
		}).catch(function(error){
			console.log(error.message);
		})
	}
</script>