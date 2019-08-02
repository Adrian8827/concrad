<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
class ModeloBanco extends CI_Model
{
	var $banco = 'c_banco';
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function mostrarTodos(){
		$query = $this->db->query("SELECT clave,banco,id,nombre_corto from c_banco");

		if($query->num_rows()>0)
		{
			return $query->result();
		}else{
			return FALSE;
		}
	}
	public function agregar($data){
		$this->db->insert($this->banco, $data);
	}

	public function editar($where, $data)
	{
		$this->db->update($this->banco, $data, $where);
	}
	
	
}
 ?>