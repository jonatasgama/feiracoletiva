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
		$sql = "SELECT tbl_categoria.categoria, tbl_categoria.id,tbl_categoria.ext  FROM tbl_categoria INNER JOIN tbl_categoria_autonomo ON tbl_categoria.id = tbl_categoria_autonomo.id_categoria GROUP BY tbl_categoria.categoria";
		$result = $this->db->query($sql);
		return $result;
	}

	public function listaEstados(){
		$sql = "SELECT * FROM tbl_estado";
		$result = $this->db->query($sql);
		return $result;
	}
	
	public function pesquisa($termo){
		$sql = "SELECT tbl_autonomo.id, tbl_autonomo.ext, tbl_autonomo.nome, tbl_autonomo.area_de_cobertura, tbl_autonomo.forma_de_pagamento, tbl_autonomo.telefone FROM tbl_autonomo INNER JOIN tbl_categoria_autonomo ON tbl_categoria_autonomo.id_autonomo = tbl_autonomo.id INNER JOIN tbl_categoria ON tbl_categoria_autonomo.id_categoria = tbl_categoria.id WHERE tbl_categoria.categoria LIKE '%$termo%'";
		$result = $this->db->query($sql);
		return $result;
	}	

	public function selecionaCategoria($id){
		$sql = "SELECT tbl_autonomo.id, tbl_autonomo.ext, tbl_autonomo.nome, tbl_autonomo.area_de_cobertura, tbl_autonomo.forma_de_pagamento, tbl_autonomo.telefone, tbl_ca.id_categoria, tbl_categoria.categoria FROM tbl_autonomo INNER JOIN tbl_categoria_autonomo tbl_ca ON tbl_ca.id_autonomo = tbl_autonomo.id INNER JOIN tbl_categoria ON tbl_ca.id_categoria = tbl_categoria.id WHERE tbl_ca.id_categoria = ?";
		$result = $this->db->query($sql, array($id));
		return $result;
	}
	
	public function selecionaEstado($id){
		$sql = "SELECT tbl_autonomo.id, tbl_autonomo.ext, tbl_autonomo.nome, tbl_autonomo.area_de_cobertura, tbl_autonomo.forma_de_pagamento, tbl_autonomo.telefone, tbl_estado.nome as estado FROM tbl_autonomo INNER JOIN tbl_estado ON tbl_estado.id = tbl_autonomo.id_estado WHERE tbl_autonomo.id_estado = ?";
		$result = $this->db->query($sql, array($id));
		return $result;
	}

	public function retornaCategorias($id){
		$sql = "SELECT categoria FROM tbl_categoria INNER JOIN tbl_categoria_autonomo ON tbl_categoria_autonomo.id_categoria = tbl_categoria.id WHERE tbl_categoria_autonomo.id_autonomo = ?";
		$result = $this->db->query($sql, array($id));
		return $result;
	}
	
	public function avaliacaoUsuario($id_autonomo, $id_usuario){
		$sql = "SELECT * FROM tbl_avaliacao WHERE id_autonomo = ? and id_usuario = ?";
		$result = $this->db->query($sql, array($id_autonomo, $id_usuario));
		return $result;		
	}
	
	public function avaliacaoMedia($id_autonomo){
		$sql = "SELECT ROUND(AVG(avaliacao),0) as averageRating FROM tbl_avaliacao WHERE id_autonomo = ?";
		$result = $this->db->query($sql, array($id_autonomo));
		return $result;		
	}	
	
	public function contabilizaAvaliacao($id_autonomo){
		$id_usuario = $this->session->userdata("id");
		$sql = "SELECT COUNT(*) AS cntpost FROM tbl_avaliacao WHERE id_autonomo = ? and id_usuario = $id_usuario";
		$result = $this->db->query($sql, array($id_autonomo));
		return $result;			
	}
	
	public function setAvaliacao($id_usuario, $id_autonomo, $avaliacao){
		$sql = "INSERT INTO tbl_avaliacao(id_usuario,id_autonomo,avaliacao) values(?, ?, ?)";
		$result = $this->db->query($sql, array($id_usuario, $id_autonomo, $avaliacao));
		return $result;		
	}
	
	public function updateAvaliacao($avaliacao, $id_autonomo, $id_usuario){
		$sql = "UPDATE tbl_avaliacao SET avaliacao = ? WHERE id_autonomo = ? AND id_usuario = ?";
		$result = $this->db->query($sql, array($avaliacao, $id_autonomo, $id_usuario));
		return $result;		
	}	
	
	public function realizarBuscaRefinada($estado, $servico, $area = null){
		$sql = "SELECT tbl_autonomo.id, tbl_autonomo.nome, tbl_autonomo.area_de_cobertura, tbl_autonomo.forma_de_pagamento, tbl_autonomo.telefone, tbl_autonomo.ext FROM tbl_autonomo INNER JOIN tbl_estado ON tbl_autonomo.id_estado = tbl_estado.id INNER JOIN tbl_categoria_autonomo ON tbl_categoria_autonomo.id_autonomo = tbl_autonomo.id INNER JOIN tbl_categoria ON tbl_categoria_autonomo.id_categoria = tbl_categoria.id WHERE id_estado = ? AND tbl_categoria.id = ?";		
		if($area != null && $area != ""){
			$sql .= "AND area_de_cobertura LIKE '%$area%'";
		}
		$result = $this->db->query($sql, array($estado, $servico));
		return $result;		
	}	
	
	public function verificaEmail($email){
		$sql = "SELECT email FROM tbl_usuario WHERE email = '$email'";
		$result = $this->db->query($sql);
		return $result;		
	}	
}