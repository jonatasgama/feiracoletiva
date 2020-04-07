

<div class="container">
	<div class="col-12">

	  <!-- Basic Card Example -->
	  <div class="card shadow mb-4">
		<div class="card-header py-3">
		  <h6 class="m-0 font-weight-bold text-primary">Feirante</h6>
		</div>
		<div class="card-body">

			<table class="table table-bordered" id="postsList">
			  <thead>
				<tr>
				  <th scope="col">#</th>
				  <th scope="col">Nome</th>
				  <th scope="col">Endereço</th>
				  <th scope="col">Forma de Pagamento</th>
				  <th scope="col">Telefone</th>
				</tr>
			  </thead>
			  <tbody>

			  </tbody>
			</table>
			<div id='pagination'></div>	
		</div>
	  </div>

	</div>
</div>

<script>
   $(document).ready(function(){
 
     $('#pagination').on('click','a',function(e){
       e.preventDefault(); 
       var pageno = $(this).attr('data-ci-pagination-page');
       loadPagination(pageno);
     });
 
     loadPagination(0);
 
     function loadPagination(pagno){
       $.ajax({
         url: '<?=base_url('admin/paginacao/');?>'+pagno,
         type: 'get',
         dataType: 'json',
         success: function(response){
            $('#pagination').html(response.pagination);
            createTable(response.result,response.row);
         }
       });
     }
 
    function createTable(result,sno){
		sno = Number(sno);
		$('#postsList tbody').empty();
	   	console.log(result);
		for(index in result){
				var id = result[index].id;
				var nome = result[index].nome;
				var area_de_cobertura = result[index].area_de_cobertura;
				var forma_de_pagamento = result[index].forma_de_pagamento;
				var telefone = result[index].telefone;
				sno+=1;
		 
				var tr = "<tr>";
				tr += "<td>"+ id +"</td>";
				tr += "<td>"+ nome +"</td>";
				tr += "<td>"+ area_de_cobertura +"</td>";
				tr += "<td>"+ forma_de_pagamento +"</td>";
				tr += "<td>"+ telefone +"</td>";
				tr += "</tr>";
				$('#postsList tbody').append(tr);
		  
			}
		}
 
    });
</script>