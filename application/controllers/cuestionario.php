<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cuestionario extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('modelo_cuestionario');
    }

    public function index(){
        /*$this->load->view('welcome_message');*/
        $this->load->view('headers');
        $this->load->view('navbar');
        $this->load->view('footer');
    }
    
    function agregar(){
        $this->load->view('headers');
        $this->load->view('navbar');
        $this->load->view('cuestionario/vistaAgregar');
        $this->load->view('footer');
    }
    
    function guardar(){
        $data = array(
            'nombreCuestionario' => $this->input->post('nombreCuestionario', TRUE)
        );
        $this->modelo_cuestionario->guardarCuestionario($data);
        redirect('cuestionario/agregar');
    }
}
