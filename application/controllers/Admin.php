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

	public function cadastraFeirante(){
		$this->load->view('admin/header/header');
		$this->load->view('admin/cadastra_feirante');
		$this->load->view('admin/footer/footer');
	}	
	
	public function cadastrarFeirante(){
		$tbl_feirante['nome'] = $this->input->post("nome");
		$tbl_feirante['telefone'] = $this->input->post("telefone");
		$tbl_feirante['forma_de_pagamento'] = $this->input->post("forma_de_pagamento");	
		$tbl_feirante['faz_entrega'] = $this->input->post("faz_entrega");
		$tbl_feirante['endereco'] = str_replace(array("\r","\n"), " ", $this->input->post("endereco"));	
				
		if($this->db->insert('tbl_feirante', $tbl_feirante)){
			echo json_encode(array('msg' => 'Dados salvos com sucesso.'));
			//upload da foto
			$config['upload_path'] = './uploads/'; 
			$config['file_name'] = $this->db->insert_id();
			$config['allowed_types'] = 'jpeg|jpg|png'; 
			$config['max_size']	= 10000;
			$config['overwrite'] = true;
			$config['file_ext_tolower'] = true;
			$this->upload->initialize($config);
			if(!$this->upload->do_upload("foto")){
				echo json_encode(array('msg' => 'Não foi possível salvar a foto: '.$this->upload->display_errors()));
			}			

		}else{
			echo json_encode(array('msg' => 'Houve algum erro.'));
		}
		//echo $this->db->last_query(); //Use para verificar a última consulta executada
        //exit();
	}	

	public function listaFeirantes(){
		//$dados['lista'] = $this->admin_model->listaFeirantes()->result();
		$this->load->view('admin/header/header');
		$this->load->view('admin/lista_feirantes');
		$this->load->view('admin/footer/footer');
	}	
	
	 public function paginacao($rowno=0){
	 
			$rowperpage = 5;
	 
			if($rowno != 0){
			  $rowno = ($rowno-1) * $rowperpage;
			}
	  
			$query = $this->db->get('tbl_feirante');
			$allcount = $query->num_rows();

			$this->db->limit($rowperpage, $rowno);
			$query = $this->db->get('tbl_feirante');
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
}
