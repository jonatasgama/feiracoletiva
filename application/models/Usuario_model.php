<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_model extends CI_Model{
	
    public function __construct(){
        parent::__construct();
    }
    
	public function login($login, $senha){
		$sql = "SELECT * FROM tbl_usuario WHERE email = ? AND senha = ?";
		$result = $this->db->query($sql, array($login, $senha));
		return $result;
	}

}