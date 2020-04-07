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
				<label for="exampleInputEmail1">Email</label>
				<input type="email" class="form-control" id="email" name="email">
			  </div>
			  <div class="form-group">
				<label for="senha">Senha</label>
				<input type="password" class="form-control" id="senha" name="senha" onblur="criptoSenha(this.value)">
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
	
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="<?=base_url('vendor/twbs/bootstrap/dist/js/bootstrap.bundle.min.js');?>"></script>
	<script src="<?=base_url('vendor/twbs/bootstrap/dist/js/parallax.min.js');?>"></script>
	<script src="<?=base_url('vendor/twbs/bootstrap/dist/js/main.js');?>"></script>
	<script src="<?=base_url('vendor/twbs/bootstrap/dist/js/md5.js');?>"></script>
	<script src="https://kit.fontawesome.com/7d9c1a4234.js" crossorigin="anonymous"></script>
	<script>
		function criptoSenha(senha){
			document.getElementById("senha").value = md5(senha);
		}	
	</script>
  </body>
</html>