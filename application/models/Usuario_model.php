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
	
	public function listaCategorias(){
		$sql = "SELECT * FROM tbl_categoria";
		$result = $this->db->query($sql);
		return $result;
	}

	public function listaEstados(){
		$sql = "SELECT * FROM tbl_estado";
		$result = $this->db->query($sql);
		return $result;
	}
	
	public function pesquisa($termo){
		$sql = "SELECT tbl_autonomo.id, tbl_autonomo.nome, tbl_autonomo.area_de_cobertura, tbl_autonomo.forma_de_pagamento, tbl_autonomo.telefone FROM tbl_autonomo INNER JOIN tbl_categoria_autonomo ON tbl_categoria_autonomo.id_autonomo = tbl_autonomo.id INNER JOIN tbl_categoria ON tbl_categoria_autonomo.id_categoria = tbl_categoria.id WHERE tbl_categoria.categoria LIKE '%$termo%'";
		$result = $this->db->query($sql);
		return $result;
	}	

	public function selecionaCategoria($id){
		$sql = "SELECT tbl_autonomo.id, tbl_autonomo.nome, tbl_autonomo.area_de_cobertura, tbl_autonomo.forma_de_pagamento, tbl_autonomo.telefone, tbl_ca.id_categoria, tbl_categoria.categoria FROM tbl_autonomo INNER JOIN tbl_categoria_autonomo tbl_ca ON tbl_ca.id_autonomo = tbl_autonomo.id INNER JOIN tbl_categoria ON tbl_ca.id_categoria = tbl_categoria.id WHERE tbl_ca.id_categoria = ?";
		$result = $this->db->query($sql, array($id));
		return $result;
	}
	
	public function selecionaEstado($id){
		$sql = "SELECT tbl_autonomo.id, tbl_autonomo.nome, tbl_autonomo.area_de_cobertura, tbl_autonomo.forma_de_pagamento, tbl_autonomo.telefone, tbl_estado.nome as estado FROM tbl_autonomo INNER JOIN tbl_estado ON tbl_estado.id = tbl_autonomo.id_estado WHERE tbl_autonomo.id_estado = ?";
		$result = $this->db->query($sql, array($id));
		return $result;
	}

	public function retornaCategorias($id){
		$sql = "SELECT categoria FROM tbl_categoria INNER JOIN tbl_categoria_autonomo ON tbl_categoria_autonomo.id_categoria = tbl_categoria.id WHERE tbl_categoria_autonomo.id_autonomo = ?";
		$result = $this->db->query($sql, array($id));
		return $result;
	}
}