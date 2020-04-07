<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {
	
    public function __construct(){
        parent::__construct();
		$this->load->model('usuario_model');
		$this->load->model('padrao_model');
    }	


	public function index(){
		$dados['categorias'] = $this->usuario_model->listacategorias()->result();
		$this->load->view('usuario/header/header');
		$this->load->view('usuario/main', $dados);
		$this->load->view('usuario/footer/footer');
	}
	
	public function pesquisa(){
		$termo = $this->input->get("termo");
		$dados['resultado'] = $this->usuario_model->pesquisa($termo)->result();
		$dados['categorias'] = $this->usuario_model->listacategorias()->result();
		$dados['termo'] = $this->input->get("termo");
		$this->load->view('usuario/header/header');
		$this->load->view('usuario/pesquisa', $dados);
		$this->load->view('usuario/footer/footer');
	}	
	
	public function selecionaCategoria($id){
		$dados['autonomos'] = $this->usuario_model->selecionaCategoria($id)->result();
		$dados['categorias'] = $this->usuario_model->listacategorias()->result();
		$this->load->view('usuario/header/header');
		$this->load->view('usuario/seleciona-categoria', $dados);
		$this->load->view('usuario/footer/footer');
	}	
	
}
