<?php
	echo "<pre>";
	print_r($autonomos);
	echo "<br>";
	print_r($cats);
	echo "</pre>";
?>
	
	<div id="geral" class="d-flex align-content-start container mb-5">
		<nav class="nav flex-column">
		<h5 class="nav-link">categorias</h5>
			<?php foreach($categorias as $cat){; ?>
				<a class="nav-link active" href="<?=base_url("categoria/$cat->id");?>"><?=$cat->categoria;?></a>
				<div class="dropdown-divider"></div>
			<?php } ;?>

		<h5 class="nav-link">estados</h5>
			<?php foreach($estados as $estado){; ?>
				<a class="nav-link active" href="<?=base_url("usuario/selecionaEstado/$estado->id");?>"><?=$estado->nome;?></a>
				<div class="dropdown-divider"></div>
			<?php } ;?>
		</nav>		
		
		<div class="container" id="autonomos">
		
			<p id="p_autonomos">Autônomos</p>
			<nav aria-label="breadcrumb">
			  <ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="<?=base_url();?>">Início</a></li>
				<li class="breadcrumb-item active" aria-current="page">Estados</li>
				<!--<li class="breadcrumb-item active" aria-current="page"><?=$estados['0']->estado;?></li>-->
			  </ol>
			</nav>
			<div class="row d-flex align-content-start flex-wrap">
				<?php for($at = 0; $at < sizeof($autonomos); $at++){ ;?>
					<div class="card mb-5 col-lg-3" style="width: 16rem;">
					  <img src="<?=base_url("uploads/".$autonomos[$at]->id.".jpg");?>" class="card-img-top" alt="...">
					  <div class="card-body">
						<h5 class="card-title"><?=$autonomos[$at]->nome;?></h5>
						<!--<p class="card-text">Produtos sempre fresquinhos e colhidos com amor e cuidado. Cuide da sua limentação, cuide da sua saúde.</p>-->
						<!--<a href="<?=base_url("usuario/selecionaCategoria/".$autonomos->id);?>" class="btn btn-primary btn-block">Navegar</a>-->
						<ul class="list-group list-group-flush">
							<li class="list-group-item">Atendimento:<br><?=$autonomos[$at]->area_de_cobertura;?></li>
							<li class="list-group-item">Pagamento:<br><?=$autonomos[$at]->forma_de_pagamento;?></li>
							<li class="list-group-item">Telefone:<br><?=$autonomos[$at]->telefone;?></li>
							<li class="list-group-item">Categorias:
								<?php for($i = 0; $i < sizeof($cats[$at]); $i++){;?>
									<br><?php print_r($cats[$at][$i]->categoria) ;?>
								<?php } ;?>
							</li>
						</ul>
					  </div>
					  
					</div>	
				<?php } ;?>
				
			</div>		
		</div>		
		
	</div>