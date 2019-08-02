<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct(){
		parent:: __construct();
		$this->load->model('ModeloCuentas', 'm');
	}
	public function index()
	{
		$data['banco'] = $this->m->banco();
		$this->load->view('index',$data);
	}

	public function mostrarTodos(){
		$result = $this->m->mostrarTodos();
    	echo json_encode(array("data" => $result));
	}


	public function agregar()
	{
		$data = array(	
		'alias' => $this->input->post('alias'),
		'id_banco' => $this->input->post('banco'),
		'ultimos_digitos' => $this->input->post('cuenta'),	
		);
		$insert = $this->m->agregar($data);
		echo json_encode(array("status" => TRUE));
	}

	public function borrar($id)
	{
		$this->m->borrar($id);
		echo json_encode(array("status" => TRUE));
	}

	public function editar()
	{
		$data = array(	
		'alias' => $this->input->post('alias'),
		'id_banco' => $this->input->post('banco'),
		'ultimos_digitos' => $this->input->post('cuenta'),
		);
		$this->m->editar(array('id' => $this->input->post('id_edit')), $data);
		echo json_encode(array("status" => TRUE));
	}


}
