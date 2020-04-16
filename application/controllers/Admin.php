<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	
    public function __construct(){
        parent::__construct();
		$this->load->model('usuario_model');
		$this->load->model('padrao_model');
		$this->load->model('admin_model');
		$this->load->library('pagination');
    }	


	public function index(){
		$this->load->view('admin/login');;
	}
	
	public function main(){
		$this->load->view('admin/header/header');
		$this->load->view('admin/footer/footer');
	}

	public function cadastraAutonomo(){
		$data['estados'] = $this->admin_model->listaEstados()->result();
		$data['categorias'] = $this->admin_model->listaCategorias()->result();
		$this->load->view('admin/header/header');
		$this->load->view('admin/cadastra_autonomo', $data);
		$this->load->view('admin/footer/footer');
	}	
	
	public function cadastrarAutonomo(){
		$tbl_autonomo['nome'] = $this->input->post("nome");
		$tbl_autonomo['telefone'] = $this->input->post("telefone");
		$tbl_autonomo['forma_de_pagamento'] = $this->input->post("forma_de_pagamento");	
		$tbl_autonomo['id_estado'] = $this->input->post("id_estado");
		//$tbl_autonomo['id_categoria'] = $this->input->post("id_categoria");
		$tbl_autonomo['area_de_cobertura'] = $this->input->post("area_de_cobertura");	
		$type = explode(".", $_FILES['foto']['name']);
		$extensao = array_slice($type, ( sizeof($type)-1 ));
		$tbl_autonomo['ext'] = implode("",$extensao);
				
		if($this->db->insert('tbl_autonomo', $tbl_autonomo)){
			echo json_encode(array('msg' => 'Dados salvos com sucesso.'));
			//upload da foto
			$config['upload_path'] = './uploads/'; 
			$config['file_name'] = $this->db->insert_id();
			$config['allowed_types'] = 'jpeg|jpg|png'; 
			$config['max_size']	= 10000;
			$config['overwrite'] = true;
			$config['file_ext_tolower'] = true;
			$this->upload->initialize($config);
			$this->insereCategoria($this->db->insert_id());
			if(!$this->upload->do_upload("foto")){
				echo json_encode(array('msg' => 'Não foi possível salvar a foto: '.$this->upload->display_errors()));
			}			

		}else{
			echo json_encode(array('msg' => 'Houve algum erro.'));
		}
		//echo $this->db->last_query(); //Use para verificar a última consulta executada
        //exit();
	}	

	public function listaautonomo(){
		//$dados['lista'] = $this->admin_model->listaautonomos()->result();
		$this->load->view('admin/header/header');
		$this->load->view('admin/lista_autonomo');
		$this->load->view('admin/footer/footer');
	}	
	
	 public function paginacao($rowno=0){
	 
			$rowperpage = 5;
	 
			if($rowno != 0){
			  $rowno = ($rowno-1) * $rowperpage;
			}
	  
			$query = $this->db->get('tbl_autonomo');
			$allcount = $query->num_rows();

			$this->db->limit($rowperpage, $rowno);
			$query = $this->db->get('tbl_autonomo');
			$users_record = $query->result_array();
	  
			$config['base_url'] = base_url().'admin/paginacao';
			$config['use_page_numbers'] = TRUE;
			$config['total_rows'] = $allcount;
			$config['per_page'] = $rowperpage;
	 
			$config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination">';
			$config['full_tag_close']   = '</ul></nav></div>';
			$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
			$config['num_tag_close']    = '</span></li>';
			$config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
			$config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
			$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
			$config['next_tag_close']  	= '<span aria-hidden="true"></span></span></li>';
			$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
			$config['prev_tag_close'] 	= '</span></li>';
			$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
			$config['first_tag_close'] 	= '</span></li>';
			$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
			$config['last_tag_close']  	= '</span></li>';
	 
			$this->pagination->initialize($config);
	 
			$data['pagination'] = $this->pagination->create_links();
			$data['result'] = $users_record;
			$data['row'] = $rowno;
	 
			echo json_encode($data);
	  }	
	  
	  public function insereCategoria($id){
		$categoria = explode(",", $this->input->post("id_categoria"));
		foreach($categoria as $cat){
			$this->admin_model->insereCategoria($cat, $id);
		}
	  }
	  
	public function cadastraCategoria(){
		$this->load->view('admin/header/header');
		$this->load->view('admin/cadastra_categoria');
		$this->load->view('admin/footer/footer');
	}	  
	
	public function cadastrarCategoria(){
		$tbl_categoria['categoria'] = $this->input->post("categoria");				
		if($this->db->insert('tbl_categoria', $tbl_categoria)){
			echo json_encode(array('msg' => "Categoria ".$this->input->post('categoria')." cadastrada com sucesso."));
			//upload da foto
			$config['upload_path'] = './uploads/categorias/'; 
			$config['file_name'] = $this->db->insert_id();
			$config['allowed_types'] = 'jpeg|jpg|png'; 
			$config['max_size']	= 10000;
			$config['overwrite'] = true;
			$config['file_ext_tolower'] = true;
			$this->upload->initialize($config);
			$this->insereCategoria($this->db->insert_id());
			if(!$this->upload->do_upload("foto")){
				echo json_encode(array('msg' => 'Não foi possível salvar a foto: '.$this->upload->display_errors()));
			}			
		}else{
			echo json_encode(array('msg' => 'Houve algum erro.'));
		}
	}	
	
	public function listaCategorias(){
		$dados['categorias'] = $this->admin_model->listacategorias()->result();
		$this->load->view('admin/header/header');
		$this->load->view('admin/lista_categoria', $dados);
		$this->load->view('admin/footer/footer');
	}		
}
