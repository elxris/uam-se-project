<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Encuesta extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('modelo_encuesta');
        $this->load->model('modelo_cuestionario');
    }

    public function index(){
        /*$this->load->view('welcome_message');*/
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
            'nombreEncuesta' => $this->input->post('nombreEncuesta'),
            'descripcionEncuesta' => $this->input->post('descripcionEncuesta'),
            'fechaInicio' => $this->input->post('fechaInicio'),
            'fechaFin' => $this->input->post('fechaFin'),
            'idCuestionario' => $this->input->post('idCuestionario')
        );
        $this->modelo_encuesta->guardarEncuesta($data);
        redirect('encuesta/verTodo');
    }
}
