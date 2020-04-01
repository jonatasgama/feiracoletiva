      <!-- Footer
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
          </div>
        </div>
      </footer>
      End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Bootstrap core JavaScript-->
  <script src="<?=base_url('admin_assets/vendor/jquery/jquery.min.js');?>"></script>
  <script src="<?=base_url('admin_assets/vendor/bootstrap/js/bootstrap.bundle.min.js');?>"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?=base_url('admin_assets/vendor/jquery-easing/jquery.easing.min.js');?>"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?=base_url('admin_assets/js/sb-admin-2.min.js');?>"></script>

  <!-- Page level plugins -->
  <script src="<?=base_url('admin_assets/vendor/chart.js/Chart.min.js');?>"></script>

  <!-- Page level custom scripts -->
  <script src="<?=base_url('admin_assets/js/demo/chart-area-demo.js');?>"></script>
  <script src="<?=base_url('admin_assets/js/demo/chart-pie-demo.js');?>"></script>

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
				var endereco = result[index].endereco;
				var forma_de_pagamento = result[index].forma_de_pagamento;
				var faz_entrega = result[index].faz_entrega;
				var telefone = result[index].telefone;
				sno+=1;
		 
				var tr = "<tr>";
				tr += "<td>"+ id +"</td>";
				tr += "<td>"+ nome +"</td>";
				tr += "<td>"+ endereco +"</td>";
				tr += "<td>"+ forma_de_pagamento +"</td>";
				tr += "<td>"+ faz_entrega +"</td>";
				tr += "<td>"+ telefone +"</td>";
				tr += "</tr>";
				$('#postsList tbody').append(tr);
		  
			}
		}
       
    });
</script>

<script>
	// esse código coloca o nome do arquivo selecionado pelo file dentro do input
	$(".custom-file-input").on("change", function() {
	  var fileName = $(this).val().split("\\").pop();
	  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
	});
</script>

</body>

</html>
