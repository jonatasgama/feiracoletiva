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

    <title>Autônomos</title>
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
			<a class="nav-link" href="#servicos">Serviços</a>
		  </li>
		  <li class="nav-item">
			<a class="nav-link" href="#">Quem Somos</a>
		  </li>		  
		  
		</ul>

		<form class="form-inline mr-5 my-lg-0">
			<div class="navbar-nav mr-5 mt-lg-0">
			  <div class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				  <i class="far fa-user"></i> Bem vindo <?=$this->session->userdata('nome');?>
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
				  <a class="dropdown-item" href="#"><i class="far fa-arrow-alt-circle-left"></i> Logout</a>
				  <div class="dropdown-divider"></div>
				  <a class="dropdown-item" href="#"><i class="far fa-address-card"></i> Perfil</a>
				</div>
			  </div>
			</div>
		</form>

		
	  </div>
	</nav>