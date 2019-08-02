<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
class ModeloCuentas extends CI_Model
{
	var $cuentas = 'c_cuentas_bancarias';
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function mostrarTodos(){
		$query = $this->db->query("SELECT c.id as id, b.nombre_corto as banco,c.alias,c.ultimos_digitos from c_cuentas_bancarias c, c_banco b WHERE b.id=c.id_banco");

		if($query->num_rows()>0)
		{
			return $query->result();
		}else{
			return FALSE;
		}
	}
	public function agregar($data){
		$this->db->insert($this->cuentas, $data);
	}


	public function banco()
	{
		$banco = $this->db->query("SELECT * FROM c_banco");
		if($banco->num_rows()>0)
		{
			return $banco->result();
		}else{
			return FALSE;
		}
	}




	public function borrar($id)
	{
		$this->db->where('id', $id);
		$this->db->delete($this->cuentas);
	}

	



	public function editar($where, $data)
	{
		$this->db->update($this->cuentas, $data, $where);
	}
	
	
	
	
}
 ?>