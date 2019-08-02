<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Banco extends CI_Controller {

	function __construct(){
		parent:: __construct();
		$this->load->model('ModeloBanco', 'm');
	}
	public function index()
	{
		$this->load->view('banco');
	}

	public function mostrarTodos(){
		$result = $this->m->mostrarTodos();
    	echo json_encode(array("data" => $result));
	}


	public function agregar()
	{
		$data = array(	
		'clave' => $this->input->post('clave'),
		'nombre_corto' => $this->input->post('nombre_corto'),
		'banco' => $this->input->post('banco'),	
		);
		$insert = $this->m->agregar($data);
		echo json_encode(array("status" => TRUE));
	}

	public function editar()
	{
		$data = array(	
		'clave' => $this->input->post('clave'),
		'nombre_corto' => $this->input->post('nombre_corto'),
		'banco' => $this->input->post('banco'),	
		);
		$this->m->editar(array('id' => $this->input->post('id_edit')), $data);
		echo json_encode(array("status" => TRUE));
	}

}
