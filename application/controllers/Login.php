<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	
    public function __construct(){
        parent::__construct();
		$this->load->model('usuario_model');
		$this->load->model('padrao_model');
		$this->load->model('admin_model');
    }	


	public function index($login = null, $senha = null){
		if($login == null && $senha == null){
			$login = $this->input->post('loginEmail');
			$senha = md5($this->input->post('loginSenha'));
		}
		$usuario = $this->usuario_model->login($login, $senha)->result();
		if($usuario){
			foreach($usuario as $u)
			$this->session->set_userdata('nome', $u->nome);
			$this->session->set_userdata('id', $u->id);
			//echo $this->db->last_query(); //Use para verificar a última consulta executada
			//exit();			
			redirect('/usuario');
		}else{
			$this->session->set_flashdata('msg-danger', 'Usuário ou senha incorreto.');
			redirect('/');
		}
		
	}
	
	public function loginAdmin(){
		$login = $this->input->post('email');
		$senha = $this->input->post('senha');
		$admin = $this->admin_model->login($login, $senha)->result();
		if($admin){
			foreach($admin as $u)
			$this->session->set_userdata('nome', $u->nome);
			$this->session->set_userdata('id', $u->id);
			//echo $this->db->last_query(); //Use para verificar a última consulta executada
			//exit();			
			redirect('/admin/main');
		}else{
			$this->session->set_flashdata('msg-danger', 'Usuário ou senha incorreto.');
			redirect('/admin');
		}
		
	}
	
	public function logout(){
		$this->session->sess_destroy();
		$this->session->unset_userdata('nome');
		$this->session->unset_userdata('id');
		redirect('/');
	}
	
	public function logoutAdmin(){
		$this->session->sess_destroy();
		$this->session->unset_userdata('nome');
		$this->session->unset_userdata('id');
		redirect('/admin');
	}	
	
	public function alterarSenha(){		
		$senha = md5($this->input->post('senhaNova'));
		$novaSenha = $this->padrao_model->alterarSenha($senha, $this->session->userdata('id'));	
		if(!$novaSenha){		
			echo "senha atual incorreta.";
		}else{
			$this->session->set_flashdata('msg-success', 'Senha alterada com sucesso.');	
			redirect('/');
		}
	}
}
