<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pregunta extends CI_Controller {
		function __construct(){
		parent::__construct();
		$this->load->helper('form');
		#$this->load->model('is_model');
	}

	public function index(){
		$this->load->view('AgregarPregunta');
	}

	public function recibirDatos(){
		$data = array(
				'Nombre' => $this->input->post('Nombre'),
				'Descripcion' => $this->input->post('Descripcion')
		);
		#$this->is_model->crearAlumno($data);
	}

}
