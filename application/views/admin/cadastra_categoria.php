

<div class="container">
	<div class="col-12">

	  <!-- Basic Card Example -->
	  <div class="card shadow mb-4">
		<div class="card-header py-3">
		  <h6 class="m-0 font-weight-bold text-primary">Cadastrar Categoria</h6>
		</div>
		<div class="card-body">

			<form id="form">
				
				<div class="row">
				  <div class="form-group col-12">
					<label for="categoria">Categoria</label>
					<input type="text" class="form-control" id="categoria" name="categoria">
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
		
		form.append("categoria", document.getElementById('categoria').value);
		form.append("foto", foto.files[0]);
		
		document.getElementById("form").style.display = "none";
		document.getElementById("loaderContainer").style.display = "block";
		
		fetch('<?=base_url()."admin/cadastrarcategoria";?>',{
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