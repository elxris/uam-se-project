<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pregunta extends CI_Controller {
		function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->model('modelo_pregunta');
	}

	public function index(){
                $this->load->view('headers');
                $this->load->view('navbar');
		$this->load->view('pregunta/AgregarPregunta');
                $this->load->view('footer');
	}

	public function recibirDatos(){
		$data = array(
				'Nombre' => $this->input->post('Nombre'),
				'Descripcion' => $this->input->post('Desc')
		);
		$this->modelo_pregunta->crearPregunta($data);
                $this->load->view('headers');
                $this->load->view('navbar');
		$this->load->view('pregunta/AgregarPregunta');
                $this->load->view('footer');
	}
     
}
