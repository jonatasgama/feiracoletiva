
	
	<div id="geral" class="d-flex align-content-start container mb-5">
		<nav class="nav flex-column">
		<h5 class="nav-link">categorias</h5>
			<?php foreach($categorias as $cat){; ?>
				<a class="nav-link active" href="<?=base_url("usuario/selecionaCategoria/".$cat->id."/".$cat->categoria);?>"><?=$cat->categoria;?></a>
				<div class="dropdown-divider"></div>
			<?php } ;?>
			
		<h5 class="nav-link">estados</h5>
			<?php foreach($estados as $estado){; ?>
				<a class="nav-link active" href="<?=base_url("usuario/selecionaEstado/$estado->id");?>"><?=$estado->nome;?></a>
				<div class="dropdown-divider"></div>
			<?php } ;?>			
		</nav>
		
		<div class="container" id="autonomos">
		
			<p id="p_autonomos">Resultados</p>
			<nav aria-label="breadcrumb">
			  <ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="<?=base_url();?>">Início</a></li>
				<li class="breadcrumb-item active" aria-current="page">Pesquisa</li>
				<li class="breadcrumb-item active" aria-current="page"><?=$termo;?></li>
			  </ol>
			</nav>
			
			<?php if(!$resultado){ ;?>
				<h3 class="text-center">Nenhum resultado encontrado</h3>	
			<?php } ;?>
			<div class="row d-flex align-content-start flex-wrap">
				<?php for($at = 0; $at < sizeof($resultado); $at++){ ;?>
					<div class="card mb-5 col-lg-3 col-12" style="width: 16rem;">
					  <img src="<?=base_url("uploads/".$resultado[$at]->id.".".$resultado[$at]->ext);?>" class="card-img-top" alt="...">
					  <div class="card-body">
						<h5 class="card-title"><?=$resultado[$at]->nome;?></h5>
						<!--<p class="card-text">Produtos sempre fresquinhos e colhidos com amor e cuidado. Cuide da sua limentação, cuide da sua saúde.</p>-->
						<!--<a href="<?=base_url("usuario/selecionaCategoria/".$resultado[$at]->id);?>" class="btn btn-primary btn-block">Navegar</a>-->
						<ul class="list-group list-group-flush">
							<li class="list-group-item">Atendimento:<br><?=$resultado[$at]->area_de_cobertura;?></li>
							<li class="list-group-item">Pagamento:<br><?=$resultado[$at]->forma_de_pagamento;?></li>
							<li class="list-group-item">Telefone:<br><?=$resultado[$at]->telefone;?></li>
							<li class="list-group-item">
								
								<?php for($j = 0; $j < sizeof($avaliacao_media[$at]); $j++){ ;?>									
									<div class="post">
										<div class="post-action">
										<!-- Rating -->
											<select class='rating' id='rating_<?=$resultado[$at]->id;?>' data-id='rating_<?=$resultado[$at]->id;?>'>
											<option value="1" >1</option>
											<option value="2" >2</option>
											<option value="3" >3</option>
											<option value="4" >4</option>
											<option value="5" >5</option>
											</select>
										<div style='clear: both;'></div>
										Avaliação : <span id='avgrating_<?=$resultado[$at]->id;?>'><?=$avaliacao_media[$at][$j]->averageRating;?></span>

										<!-- Set rating -->
										<script type='text/javascript'>
											$(document).ready(function(){
												let id = 'rating_<?=$resultado[$at]->id;?>';
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