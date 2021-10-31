	<!-- Modal Login-->
	<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="exampleModalCenterTitle">Login</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <div class="modal-body">
			<form method="post" action="<?=base_url('/login');?>">
			  <div class="form-group">
				<label for="loginEmail">Email</label>
				<input type="email" class="form-control" id="loginEmail" name="loginEmail">
			  </div>
			  <div class="form-group">
				<label for="loginSenha">Senha</label>
				<input type="password" class="form-control" id="loginSenha" name="loginSenha">
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
				<button type="submit" class="btn btn-primary">Login</button>
			  </div>			  
			</form>
		  </div>

		</div>
	  </div>
	</div>
	
	<!-- Modal Cadastro-->
	<div class="modal fade" id="cadastro" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="exampleModalCenterTitle">Cadastro</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <div class="modal-body">
			<form method="post" name="formCadastro" action="<?=base_url('usuario/cadastrar');?>">
			  <div class="form-group">
				<label for="nome">Nome</label>
				<input type="text" class="form-control" id="nome" name="nome">
			  </div>
			  
			  <div class="form-group">
				<label for="email">Email</label>
				<input type="email" class="form-control" id="email" name="email" onblur="verificaEmail(this.value)" onfocus="tiraClasse()">
				<div class="invalid-feedback" id="msg"></div>
			  </div>
			  
			  <div class="form-group">
				<label for="telefone">Telefone</label>
				<input type="text" class="form-control" id="telefone" name="telefone" data-mask="(00) 0 0000-0000">
			  </div>			  
			  
			  <div class="form-group">
				<label for="senha">Senha</label>
				<input type="password" class="form-control" id="senha" name="senha"  required>
			  </div>
			  
			  <div class="form-group">
				<label for="confirmaSenha">Confirme a Senha</label>
				<input type="password" class="form-control" id="confirmaSenha" name="confirmaSenha"  required>
			  </div>
			  
			  <div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
				<button type="button" class="btn btn-primary" onclick="validarSenha()">Cadastrar</button>
			  </div>			  
			</form>
		  </div>

		</div>
	  </div>
	</div>	
    <script src="<?=base_url('vendor/twbs/bootstrap/dist/js/bootstrap.bundle.min.js');?>"></script>
	<script src="<?=base_url('vendor/twbs/bootstrap/dist/js/parallax.min.js');?>"></script>
	<script src="<?=base_url('vendor/twbs/bootstrap/dist/js/main.js');?>"></script>
	<script src="<?=base_url('vendor/twbs/bootstrap/dist/js/md5.js');?>"></script>
	<script src="<?=base_url('vendor/twbs/bootstrap/dist/js/jquery.barrating.min.js');?>"></script>
	<script src="<?=base_url('vendor/twbs/bootstrap/dist/js/toastr.min.js');?>"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
	<script src="https://kit.fontawesome.com/7d9c1a4234.js" crossorigin="anonymous"></script>
	<script>
		function criptoSenha(senha, formId){
			event.target.value = md5(senha);
			console.log(event.target.value = md5(senha));
		}			
		
		$(function() {
		 $('.rating').barrating({
		  theme: 'css-stars',
		  onSelect: function(value, text, event) {
		   // Get element id by data-id attribute
		   let result = isLogado('<?=$this->session->userdata('id');?>');
		   if(result != false){
			   var el = this;
			   var el_id = el.$elem.data('id');

			   // rating was selected by a user
			   if (typeof(event) !== 'undefined') {
			 
				 var split_id = el_id.split("_");
				 var id_autonomo = split_id[1]; // postid

				 // AJAX Request
				 $.ajax({
				   url: '<?=base_url("usuario/avaliacaoAjax");?>',
				   type: 'post',
				   data: {id_autonomo:id_autonomo,avaliacao:value},
				   dataType: 'json',
				   success: function(data){
					 // Update average
					 var average = data['0'].averageRating;
					 $('#avgrating_'+id_autonomo).text(average);
				   }
				 });
			   }			   
		   }

		  }
		 });
		});		
		
		function isLogado(id){
			if(id == ""){
				toastr["info"]("É preciso estar logado para avaliar.")
			
				toastr.options = {
				  "closeButton": true,
				  "debug": false,
				  "newestOnTop": false,
				  "progressBar": false,
				  "positionClass": "toast-top-right",
				  "preventDuplicates": true,
				  "onclick": null,
				  "showDuration": "500",
				  "hideDuration": "1000",
				  "timeOut": "5000",
				  "extendedTimeOut": "1000",
				  "showEasing": "swing",
				  "hideEasing": "linear",
				  "showMethod": "fadeIn",
				  "hideMethod": "fadeOut"
				}
				
				return false;
			}else{
				return true;
			}
		}
		
		function validarSenha(){
			let senha 			= document.getElementById('senha').value;
			let confirmaSenha 	= document.getElementById('confirmaSenha').value;
		   if(senha != confirmaSenha){
			   alert("As senhas não são iguais!");
			   console.log(senha);
			   console.log(confirmaSenha);
		   }else{
			   document.formCadastro.submit();
		   }
		}	

		function redireciona(e){
			let idx = e.target.options.selectedIndex;
			let url = e.target.options[idx].getAttribute('data-url');
			if (url) window.location = url;
		}
	
		function verificaEmail(email){
			
			 $.ajax({
			   url: '<?=base_url("usuario/verificaEmail");?>',
			   type: 'post',
			   data: {email:email},
			   dataType: 'json',
			   success: function(data){
				 if(data){
					 var msg = data.msg;
					$('#msg').text(msg);	
					$('#email').addClass("is-invalid");
				 }
			   }
			 });			
		}
		
		function tiraClasse(){
			$('#email').removeClass("is-invalid");
		}
	</script>
  </body>
</html>