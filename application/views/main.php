<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?=base_url('vendor/twbs/bootstrap/dist/css/bootstrap.min.css');?>">
	<link rel="stylesheet" href="<?=base_url('vendor/twbs/bootstrap/dist/css/main.css');?>">
	<link rel="stylesheet" href="<?=base_url('vendor/twbs/bootstrap/dist/css/responsive.css');?>">
	<link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">

    <title>Feira Coletiva</title>
  </head>
  
  <body>
	<nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light" id="menu">
	  <a class="navbar-brand" href="#" id="logo">Autônomos</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	  </button>

	  <div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto mt-lg-0">
		  <li class="nav-item active">
			<a class="nav-link" href="#">Início <span class="sr-only">(current)</span></a>
		  </li>
		  <li class="nav-item">
			<a class="nav-link" href="#categorias">Categorias</a>
		  </li>
		  <li class="nav-item">
			<a class="nav-link" href="#">Quem Somos</a>
		  </li>		  
		  
		</ul>

    <form class="form-inline mr-5 my-lg-0">
		<div class="navbar-nav mr-5 mt-lg-0">
		  <div class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			  <i class="far fa-user"></i> Login
			</a>
			<div class="dropdown-menu" aria-labelledby="navbarDropdown">
			  <button type="button" class="dropdown-item" data-target="#login" data-toggle="modal"><i class="fas fa-sign-in-alt" data-target="login"></i> Entrar</button>
			  <div class="dropdown-divider"></div>
			  <button type="button" class="dropdown-item" data-target="#cadastro" data-toggle="modal"><i class="far fa-address-card"></i> Criar conta</button>
			</div>
		  </div>
		</div>
    </form>

		
	  </div>
	</nav>
	
	<div id="principal" data-parallax="scroll" data-image-src="vendor/twbs/bootstrap/dist/img/arquiteto.jpg">

		<p id="p_principal">Autônomos</p>
		
		<form class="container">
		  <div class="form-group">
			<input type="text" class="form-control form-control-lg" placeholder="Procurar">
		  </div>
		  <button type="button" class="btn btn-primary btn-lg">Pesquisar</button>
		</form>

	</div>
	
	<div class="container mt-5" id="categorias">
	
		<p id="p_servicos">Categorias</p>
		
		<div class="row d-flex align-content-start flex-wrap">
			<?php foreach($categorias as $cat){ ;?>
				<div class="card mb-5 col-lg-3" style="width: 16rem;">
				  <img src="<?=base_url("uploads/categorias/".$cat->id.".jpg");?>" class="card-img-top" alt="...">
				  <div class="card-body">
					<h5 class="card-title"><?=$cat->categoria;?></h5>
					<!--<p class="card-text">Produtos sempre fresquinhos e colhidos com amor e cuidado. Cuide da sua limentação, cuide da sua saúde.</p>-->
					<a href="<?=base_url("usuario/selecionaCategoria/".$cat->id);?>" class="btn btn-primary btn-block">Navegar</a>
				  </div>
				</div>	
			<?php } ;?>
		</div>
	</div>
	
	<div id="geral" class="d-flex align-content-start container mb-5">
		<!--<nav class="nav flex-column">
		  <a class="nav-link active" href="#">Active</a>
		  <div class="dropdown-divider"></div>
		  <a class="nav-link" href="#">Link</a>
		  <div class="dropdown-divider"></div>
		  <a class="nav-link" href="#">Link</a>
		  <div class="dropdown-divider"></div>
		  <a class="nav-link" href="#">Link</a>
		  <div class="dropdown-divider"></div>
		  <a class="nav-link" href="#">Link</a>
		</nav>-->

		<div class="d-flex align-content-start flex-wrap">
			<div class="row">
			  <div class="col-sm-6">
				<div class="card">
				  <div class="card-body">
					<h5 class="card-title">Special title treatment</h5>
					<p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
					<a href="#" class="btn btn-primary">Go somewhere</a>
				  </div>
				</div>
			  </div>
			  <div class="col-sm-6">
				<div class="card">
				  <div class="card-body">
					<h5 class="card-title">Special title treatment</h5>
					<p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
					<a href="#" class="btn btn-primary">Go somewhere</a>
				  </div>
				</div>
			  </div>
			</div>			
		</div>		
	</div>
	
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