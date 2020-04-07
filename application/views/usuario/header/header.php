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
			<a class="nav-link" href="<?=base_url();?>">Início <span class="sr-only">(current)</span></a>
		  </li>
		  <li class="nav-item">
			<a class="nav-link" href="<?=base_url();?>#categorias">Categorias</a>
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
	
	<div id="principal" data-parallax="scroll" data-image-src="<?=base_url('vendor/twbs/bootstrap/dist/img/arquiteto.jpg');?>">

		<p id="p_principal">Autônomos</p>
		
		<form class="container" method="get" action="<?=base_url("usuario/pesquisa");?>">
		  <div class="form-group">
			<input type="text" class="form-control form-control-lg" name="termo" placeholder="Procurar">
		  </div>
		  <button type="submit" class="btn btn-primary btn-lg">Pesquisar</button>
		</form>

	</div>	