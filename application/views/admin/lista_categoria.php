<div class="container">
	<div class="col-12">

	  <!-- Basic Card Example -->
	  <div class="card shadow mb-4">
		<div class="card-header py-3">
		  <h6 class="m-0 font-weight-bold text-primary">Categorias</h6>
		</div>
		<div class="card-body">

            <div class="row d-flex justify-content-start">
				<?php foreach($categorias as $cat){ ;?>
				  <div class="card mx-1 mb-4 py-3 border-left-primary col-3">
					<div class="card-body">
					  <?=$cat->categoria;?>
					</div>
				  </div>
				<?php } ;?>
            </div>

		</div>
	  </div>

	</div>
</div>