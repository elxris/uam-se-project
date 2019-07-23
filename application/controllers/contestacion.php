<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contestacion extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('modelo_contestacion');
        $this->load->model('modelo_encuesta');
        $this->load->model('modelo_usuario');
    }
    
    function index(){
        $this->load->view('headers');
	$this->load->view('navbar');
        $this->load->view('footer');
    }
    
    function seleccion(){
        $data = array(
            'encuesta' => $this->modelo_encuesta->verEncuestas(),
            'dum' => 0
        );
        
        $id = '3';
        $data['usuario'] = $this->modelo_usuario->verEncuestadores($id);
        
        $this->load->view('headers');
	$this->load->view('navbar');
        $this->load->view('contestacion/vistaContestacion', $data);    
        $this->load->view('footer');
    }
    
    function guardar(){
        $data = array(
            'idEncuesta' => $this->input->post('idEncuesta', TRUE),
            'idUsuario' => $this->input->post('idUsuario', TRUE)
        );
        
        $idContestacion = $this->modelo_contestacion->guardarContestacion($data);
        
        redirect("/contestar/index/{$idContestacion}");
    }
}
