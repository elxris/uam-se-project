<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Encuesta extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('modelo_encuesta');
        $this->load->model('modelo_cuestionario');
        $this->load->model('modelo_usuario');
    }

    public function index(){
        $this->load->view('headers');
        $this->load->view('navbar');
        $this->load->view('footer');
    }
    
    function verTodo(){
        $datos = array(
            'encuesta' => $this->modelo_encuesta->verEncuestas(),
            'dump' => 0
        );
        $this->load->view('headers');
        $this->load->view('navbar');
        $this->load->view('encuesta/verEncuestas', $datos);
        $this->load->view('footer');
    }
    
    function agregar(){
        $data = array(
            'cuestionario' => $this->modelo_cuestionario->verTodo(),
            'dum' => 0
        );
        $this->load->view('headers');
        $this->load->view('navbar');
        $this->load->view('encuesta/vistaAgregar', $data);
        $this->load->view('footer');
    }
    
    function guardar(){
        $data = array(
            'nombreEncuesta'      => $this->input->post('nombreEncuesta'),
            'descripcionEncuesta' => $this->input->post('descripcionEncuesta'),
            'numeroAplicacion'    => $this->input->post('numeroAplicacion'),
            'fechaInicio'         => $this->input->post('fechaInicio'),
            'fechaFin'            => $this->input->post('fechaFin'),
            'idCuestionario'      => $this->input->post('idCuestionario')
        );
        $this->modelo_encuesta->guardarEncuesta($data);
        redirect('encuesta/verTodo');
    }
    
    function editar(){
	$idEncuesta = $this->uri->segment(3);
	$encuesta = $this->modelo_encuesta->obtenerEncuesta($idEncuesta);
        //$cuestionario = $this->modelo_cuestionario->verTodo();
	
	if($encuesta != FALSE){
            foreach($encuesta->result() as $row){
                $nombreEncuesta      = $row->nombreEncuesta;
                $descripcionEncuesta = $row->descripcionEncuesta;
                $numeroAplicacion    = $row->numeroAplicacion;
                $fechaInicio         = $row->fechaInicio;
                $fechaFin            = $row->fechaFin;
                $idCuestionario      = $row->idCuestionario;
            }
            $data = array(
                'idEncuesta'          => $idEncuesta,
                'nombreEncuesta'      => $nombreEncuesta,
                'descripcionEncuesta' => $descripcionEncuesta,
                'numeroAplicacion'    => $numeroAplicacion,
                'fechaInicio'         => $fechaInicio,
                'fechaFin'            => $fechaFin,
                'idCuestionario'      => $idCuestionario
            );
	}
	else{
            $data = '';
            return FALSE;
	}
        $data['cuestionario'] = $this->modelo_cuestionario->verTodo();
            
        $this->load->view('headers');
	$this->load->view('navbar');
	$this->load->view('encuesta/vistaEditar', $data);
	$this->load->view('footer');
    }
    
    function editaEncuesta(){
        $idEncuesta = $this->uri->segment(3);
        $data = array(
            'nombreEncuesta'      => $this->input->post('nombreEncuesta', true),
            'descripcionEncuesta' => $this->input->post('descripcionEncuesta', true),
            'numeroAplicacion'    => $this->input->post('numeroAplicacion', true),
            'fechaInicio'         => $this->input->post('fechaInicio', true),
            'fechaFin'            => $this->input->post('fechaFin', true),
            'idCuestionario'      => $this->input->post('idCuestionario', true)
        );
        $this->modelo_encuesta->modificarEncuesta($idEncuesta, $data);
        redirect('encuesta/verTodo');
    }
    
    function eliminar(){
        $idEncuesta = $this->uri->segment(3);
        $this->modelo_encuesta->eliminaEncuesta($idEncuesta);
    }
}
