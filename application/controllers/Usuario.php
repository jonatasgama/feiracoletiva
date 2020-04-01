<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {
	
    public function __construct(){
        parent::__construct();
		$this->load->model('usuario_model');
		$this->load->model('padrao_model');
    }	


	public function index(){
		$this->load->view('usuario/header/header');
		$this->load->view('usuario/main');
		$this->load->view('usuario/footer/footer');
	}
	
}
