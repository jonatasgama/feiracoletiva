	<div id="geral" class="container mb-5">
			
			<form class="form-inline col-md-12" method="post" action="<?=base_url("usuario/realizarBuscaRefinada");?>">
			
				<div class="col-12 col-md-4 form-group mb-3">
					<select id="inputCategoria" name="inputCategoria" class="col-md-12 form-control form-control-lg">
						<option selected>Serviço...</option>
						<?php foreach($categorias as $cat){; ?>
							<option value="<?=$cat->id;?>" data-url="<?=base_url("categoria/$cat->id");?>"><?=$cat->categoria;?></option>
						<?php } ;?>
					</select>
				</div>
				<div class="col-12 col-md-4 form-group mb-3">
					<select id="inputEstado" name="inputEstado" class="col-md-12 form-control form-control-lg">
						<option selected>Estado...</option>
						<?php foreach($estados as $estado){; ?>
							<option value="<?=$estado->id;?>" data-url="<?=base_url("usuario/selecionaEstado/$estado->id");?>"><?=$estado->nome;?></option>
						<?php } ;?>
					</select>
				</div>
				
				<div class="col-12 col-md-4 form-group mb-3">
					<input type="text" class="col-md-12 form-control form-control-lg" name="area" placeholder="Área de atendimento">				
				</div>				
				
				<div class="form-group mb-3" style="padding-left:16px;">
					<button type="submit" class="btn btn-primary btn-lg">Buscar</button>
				</div>
			</form>		
		
	</div>
	
	<?php 
	if(isset($autonomos)){ ;?>
	
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
		
			<!--<p id="p_autonomos">Autônomos</p>-->
			<nav aria-label="breadcrumb">
			  <ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="<?=base_url();?>">Início</a></li>
				<li class="breadcrumb-item active" aria-current="page">Busca Refinada</li>
			  </ol>
			</nav>
			
			<?php
			if(!$autonomos){ ;?>
				<h3 class="text-center">Nenhum resultado encontrado</h3>
			<?php } ;?>			
			
			<form class="form-inline" id="filtro">
			
				<div class="col-6 form-group mb-3">
					<select id="inputCategoria" class="form-control" onchange="redireciona(event)">
						<option selected>Categorias...</option>
						<?php foreach($categorias as $cat){; ?>
							<option value="<?=$cat->id;?>" data-url="<?=base_url("categoria/$cat->id");?>"><?=$cat->categoria;?></option>
						<?php } ;?>
					</select>
				</div>
				<div class="col-6 form-group mb-3">
					<select id="inputEstado" class="form-control" onchange="redireciona(event)">
						<option selected>Estado...</option>
						<?php foreach($estados as $estado){; ?>
							<option value="<?=$estado->id;?>" data-url="<?=base_url("usuario/selecionaEstado/$estado->id");?>"><?=$estado->nome;?></option>
						<?php } ;?>
					</select>
				</div>
			
			</form>

			<div class="row d-flex align-content-sm-start flex-wrap">
				<?php for($at = 0; $at < sizeof($autonomos); $at++){ ;?>
					<div class="card mb-5 col-lg-3 col-12" style="width: 16rem;">
					  <img src="<?=base_url("uploads/".$autonomos[$at]->id.".".$autonomos[$at]->ext);?>" class="card-img-top" alt="...">
					  <div class="card-body">
						<h5 class="card-title"><?=$autonomos[$at]->nome;?></h5>
						<!--<p class="card-text">Produtos sempre fresquinhos e colhidos com amor e cuidado. Cuide da sua limentação, cuide da sua saúde.</p>-->
						<!--<a href="<?=base_url("usuario/selecionaCategoria/".$autonomos[$at]->id);?>" class="btn btn-primary btn-block">Navegar</a>-->
						<ul class="list-group list-group-flush">
							<li class="list-group-item">Atendimento:<br><?=$autonomos[$at]->area_de_cobertura;?></li>
							<li class="list-group-item">Pagamento:<br><?=$autonomos[$at]->forma_de_pagamento;?></li>
							<li class="list-group-item">Telefone:<br><?=$autonomos[$at]->telefone;?></li>
							<li class="list-group-item">
								
								<?php for($j = 0; $j < sizeof($avaliacao_media[$at]); $j++){ ;?>									
									<div class="post">
										<div class="post-action">
										<!-- Rating -->
											<select class='rating' id='rating_<?=$autonomos[$at]->id;?>' data-id='rating_<?=$autonomos[$at]->id;?>'>
											<option value="1" >1</option>
											<option value="2" >2</option>
											<option value="3" >3</option>
											<option value="4" >4</option>
											<option value="5" >5</option>
											</select>
										<div style='clear: both;'></div>
										Avaliação : <span id='avgrating_<?=$autonomos[$at]->id;?>'><?=$avaliacao_media[$at][$j]->averageRating;?></span>

										<!-- Set rating -->
										<script type='text/javascript'>
											$(document).ready(function(){
												let id = 'rating_<?=$autonomos[$at]->id;?>';
												let avaliacao = '<?=$avaliacao_media[$at][$j]->averageRating;?>';
												document.getElementById(id).value = avaliacao;
											});
										</script>
										</div>
									</div>									
								<?php } ;?>							
								
							</li>							
						</ul>
					  </div>
					  
					</div>	
				<?php } ;?>
				
			</div>		
		</div>		
		
	</div>		
	<?php };?>