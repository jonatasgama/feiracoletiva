
	
	<div id="geral" class="d-flex align-content-start container mb-5">
		<nav class="nav flex-column">
		<h6 class="nav-link">categorias</h6>
			<?php foreach($categorias as $cat){; ?>
				<a class="nav-link active" href="<?=base_url("categoria/$cat->id/$cat->categoria");?>"><?=$cat->categoria;?></a>
				<div class="dropdown-divider"></div>
			<?php } ;?>
		</nav>
		
		<div class="container" id="autonomos">
		
			<p id="p_autonomos">Autônomos</p>
			<nav aria-label="breadcrumb">
			  <ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="<?=base_url();?>">Início</a></li>
				<li class="breadcrumb-item active" aria-current="page">Categorias</li>
				<li class="breadcrumb-item active" aria-current="page"><?=$autonomos['0']->categoria;?></li>
			  </ol>
			</nav>
			<div class="row d-flex align-content-start flex-wrap">
				<?php foreach($autonomos as $at){ ;?>
					<div class="card mb-5 col-lg-3" style="width: 16rem;">
					  <img src="<?=base_url("uploads/".$at->id.".jpg");?>" class="card-img-top" alt="...">
					  <div class="card-body">
						<h5 class="card-title"><?=$at->nome;?></h5>
						<!--<p class="card-text">Produtos sempre fresquinhos e colhidos com amor e cuidado. Cuide da sua limentação, cuide da sua saúde.</p>-->
						<!--<a href="<?=base_url("usuario/selecionaCategoria/".$at->id);?>" class="btn btn-primary btn-block">Navegar</a>-->
						<ul class="list-group list-group-flush">
							<li class="list-group-item">Atendimento:<br><?=$at->area_de_cobertura;?></li>
							<li class="list-group-item">Pagamento:<br><?=$at->forma_de_pagamento;?></li>
							<li class="list-group-item">Telefone:<br><?=$at->telefone;?></li>
						</ul>
					  </div>
					  
					</div>	
				<?php } ;?>
			</div>
		</div>		
		
	</div>