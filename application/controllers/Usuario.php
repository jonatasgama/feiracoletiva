<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {
	
    public function __construct(){
        parent::__construct();
		$this->load->model('usuario_model');
		$this->load->model('padrao_model');
		//verificaSessao($this->session->userdata('nome'));
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
		$dados['estados'] = $this->usuario_model->listaestados()->result();
		$dados['termo'] = $this->input->get("termo");
				$avaliacao_media = [];
		foreach($dados['resultado'] as $autonomo){
			$avaliacao_media[] = $this->usuario_model->avaliacaoMedia($autonomo->id)->result();
		}
		$dados['avaliacao_media'] = $avaliacao_media;
		$this->load->view('usuario/header/header');
		$this->load->view('usuario/pesquisa', $dados);
		$this->load->view('usuario/footer/footer');
	}	
	
	public function selecionaCategoria($id){
		$dados['autonomos'] = $this->usuario_model->selecionaCategoria($id)->result();
		$dados['categorias'] = $this->usuario_model->listacategorias()->result();
		$dados['estados'] = $this->usuario_model->listaestados()->result();
		$avaliacao_media = [];
		foreach($dados['autonomos'] as $autonomo){
			$avaliacao_media[] = $this->usuario_model->avaliacaoMedia($autonomo->id)->result();
		}		
		$dados['avaliacao_media'] = $avaliacao_media;		
		$this->load->view('usuario/header/header');
		$this->load->view('usuario/seleciona-categoria', $dados);
		$this->load->view('usuario/footer/footer');
	}	

	public function selecionaEstado($id, $estado = null){
		if($estado){
			$dados['estado'] = $estado;
		}		
		$dados['autonomos'] = $this->usuario_model->selecionaEstado($id)->result();
		$dados['categorias'] = $this->usuario_model->listacategorias()->result();
		$categoria_autonomo = [];
		foreach($dados['autonomos'] as $autonomo){
			$categoria_autonomo[] = $this->usuario_model->retornaCategorias($autonomo->id)->result();
		}
		$avaliacao_media = [];
		foreach($dados['autonomos'] as $autonomo){
			$avaliacao_media[] = $this->usuario_model->avaliacaoMedia($autonomo->id)->result();
		}		
		$dados['cats'] = $categoria_autonomo;
		$dados['avaliacao_media'] = $avaliacao_media;
		$dados['estados'] = $this->usuario_model->listaestados()->result();
		$this->load->view('usuario/header/header');
		$this->load->view('usuario/seleciona-estado', $dados);
		$this->load->view('usuario/footer/footer');
	}	
	
	public function avaliacaoAjax(){
		$id_autonomo = $this->input->post("id_autonomo");
		$avaliacao = $this->input->post("avaliacao");
		$id_usuario = $this->session->userdata("id");
		$cont = $this->usuario_model->contabilizaAvaliacao($id_autonomo)->result();
		if($cont['0']->cntpost == 0){
			$this->usuario_model->setAvaliacao($id_usuario, $id_autonomo, $avaliacao);
		}else{
			$this->usuario_model->updateAvaliacao($avaliacao, $id_autonomo, $id_usuario);
		}
		$avaliacaoMedia = $this->usuario_model->avaliacaoMedia($id_autonomo)->result();
		echo json_encode($avaliacaoMedia);
	}
	
	public function cadastrar(){
		$tbl_usuario['nome'] = $this->input->post("nome");
		$tbl_usuario['email'] = $this->input->post("email"); 
		$tbl_usuario['senha'] = md5($this->input->post("senha"));
		$tbl_usuario['telefone'] = $this->input->post("telefone");
		if($this->db->insert('tbl_usuario', $tbl_usuario)){
			redirect("login/");
		}
		
	}
	
	public function buscaRefinada(){
		$dados['categorias'] = $this->usuario_model->listacategorias()->result();
		$dados['estados'] = $this->usuario_model->listaestados()->result();
		$this->load->view('usuario/header/header');
		$this->load->view('usuario/busca-refinada', $dados);
		$this->load->view('usuario/footer/footer');
	}	
	
	public function realizarBuscaRefinada(){
		$estado = $this->input->post('inputEstado');
		$servico = $this->input->post('inputCategoria');
		$area = $this->input->post('area');
		$dados['autonomos'] = $this->usuario_model->realizarBuscaRefinada($estado, $servico, $area)->result();
		
		$categoria_autonomo = [];
		foreach($dados['autonomos'] as $autonomo){
			$categoria_autonomo[] = $this->usuario_model->retornaCategorias($autonomo->id)->result();
		}
		$avaliacao_media = [];
		foreach($dados['autonomos'] as $autonomo){
			$avaliacao_media[] = $this->usuario_model->avaliacaoMedia($autonomo->id)->result();
		}
		
		$dados['cats'] = $categoria_autonomo;
		$dados['avaliacao_media'] = $avaliacao_media;	
		$dados['categorias'] = $this->usuario_model->listacategorias()->result();
		$dados['estados'] = $this->usuario_model->listaestados()->result();		
		$this->load->view('usuario/header/header');
		$this->load->view('usuario/busca-refinada', $dados);
		$this->load->view('usuario/footer/footer');
	}	
	
	public function verificaEmail(){
		$email = $this->input->post('email');
		$email = $this->usuario_model->verificaEmail($email)->result();
		if(sizeof($email) > 0){
			echo json_encode(array('msg' => 'E-mail já cadastrado'));
		}		
	}
}
