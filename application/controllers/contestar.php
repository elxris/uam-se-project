<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contestar extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('modelo_contestar');
    }

    public function index(){
        $idContestacion = $this->uri->segment(3);
        $numPregunta = $this->url->segment(4);
        if ($numPregunta) {
            $data = array(
                'pregunta' => $this->modelo_contestar->obtenerPregunta($idContestacion, $numPregunta),
                'datos' => $this->modelo_contestar->obtenerEncuesta($idContestacion),
                'idContestacion' => $idContestacion,
                'numPregunta' => $numPregunta
            );
            $this->load->view('headers');
            $this->load->view('navbar');
            $this->load->view('contestar/pregunta', $data);
            $this->load->view('footer');
        } else {
            $data = array(
                'datos' => $this->modelo_contestar->obtenerEncuesta($idContestacion),
                'idContestacion' => $idContestacion,
                'numPregunta' => $numPregunta
            );
            $this->load->view('headers');
            $this->load->view('navbar');
            $this->load->view('contestar/bienvenida', $data);
            $this->load->view('footer');
        }
    }
    
    public function guardarRespuesta()
    {
        $data = array(
            'idEncuesta' => $this->input->post('idEncuesta', TRUE),
            'idUsuario' => $this->input->post('idUsuario', TRUE),
            'idContestacion' => $this->input->post('idContestacion', TRUE),
            'idPregunta' => $this->input->post('idPregunta', TRUE),
            'idRespuesta' => $this->input->post('idRespuesta', TRUE),
        );
        $this->modelo_contestar->guardarRespuesta($data);
        redirect('/contestar/'.$this->input->post('idContestacion', TRUE).'/'.$this->input->post('nextPregunta', TRUE));
    }

}
