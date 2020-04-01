	function envia(){

		let form = new FormData();
		
		form.append("nome", document.getElementById('nome').value);
		form.append("telefone", document.getElementById('telefone').value);
		form.append("forma_de_pagamento", document.getElementById('forma_de_pagamento').value);
		form.append("faz_entrega", document.getElementById('faz_entrega').value);
		form.append("endereco", document.getElementById('endereco').value);
		
		document.getElementById("form").style.display = "none";
		document.getElementById("loaderContainer").style.display = "block";
		
		fetch('<?=base_url()."/admin/cadastrarFeirante");?>',{
			method: "POST",
			body: form
		}).then(function(response){
			if(response.ok){
				response.json().then(function(data){
					document.getElementById("loaderContainer").style.display = "none";
					document.getElementById("form").insertAdjacentHTML("afterend", `<div class="mt-3 alert alert-primary text-center" role="alert">
				${data.msg}</div>`);
				})				
			}else{
				console.log('Ocorreu algum erro de rede');
			}	
		}).catch(function(error){
			console.log(error.message);
		})
	}	