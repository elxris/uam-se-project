<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {
		function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->model('modelo_usuario');
		$this->load->model('modelo_rol');
	}

	public function index(){
				$data['roles'] = $this->modelo_rol->obtenerRoles();
                $this->load->view('headers');
                $this->load->view('navbar');
				$this->load->view('usuario/agregarUsuario',$data);
                $this->load->view('footer');
	}

	public function recibirDatos(){
		$data = array(
				'Nombre' => $this->input->post('NombreUsuario'),
				'Pass' => $this->input->post('Pass'),
				'Rol' => $this->input->post('miRol')
		);

				$this->modelo_usuario->crearUsuario($data);
		$data['roles'] = $this->modelo_rol->obtenerRoles();
				$this->load->view('headers');
                $this->load->view('navbar');
				$this->load->view('usuario/agregarUsuario',$data);
                $this->load->view('footer');
             
	}

}
