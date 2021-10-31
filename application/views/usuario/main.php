
	
	<div class="container mt-5" id="categorias">
	
		<p id="p_servicos">Categorias</p>
		
		<div class="row d-flex align-content-start flex-wrap">
			<?php foreach($categorias as $cat){ ;?>
				<div class="card mb-5 col-lg-3 col-12" style="width: 16rem;">
				  <img src="<?=base_url("uploads/categorias/".$cat->id.".".$cat->ext);?>" class="card-img-top" alt="...">
				  <div class="card-body">
					<h5 class="card-title"><?=$cat->categoria;?></h5>
					<!--<p class="card-text">Produtos sempre fresquinhos e colhidos com amor e cuidado. Cuide da sua limentação, cuide da sua saúde.</p>-->
					<a href="<?=base_url("usuario/selecionaCategoria/".$cat->id."/".$cat->categoria);?>" class="btn btn-primary btn-block">Navegar</a>
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
	
	</div>