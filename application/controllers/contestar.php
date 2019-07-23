<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contestar extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('modelo_contestar');
    }

    public function index(){
        $idContestacion = $this->uri->segment(3);
        $numPregunta = $this->uri->segment(4);
        if ($numPregunta != '') {
            $pregunta = $this->modelo_contestar->obtenerPregunta($idContestacion, $numPregunta);
            if (!$pregunta) {
                return redirect('/contestar/fin/'.$idContestacion);
            }
            $data = array(
                'pregunta' => $pregunta,
                'datos' => $this->modelo_contestar->obtenerEncuesta($idContestacion),
                'respuestas' => $this->modelo_contestar->getRespuestas($idContestacion, $pregunta->idPregunta),
                'idContestacion' => $idContestacion,
                'numPregunta' => $numPregunta
            );
            if ($data['respuestas']->num_rows() == 0) {
                return redirect("/contestar/index/".$idContestacion."/".($numPregunta + 1));
            }
            $this->load->view('headers');
            $this->load->view('contestar/pregunta', $data);
            $this->load->view('footer');
        } else {
            $data = array(
                'datos' => $this->modelo_contestar->obtenerEncuesta($idContestacion),
                'idContestacion' => $idContestacion
            );
            $this->load->view('headers');
            $this->load->view('contestar/bienvenida', $data);
            $this->load->view('footer');
        }
    }

    public function fin(){
        $this->load->view('headers');
        $this->load->view('contestar/fin');
        $this->load->view('footer');
    }
    
    public function guardarRespuesta()
    {
        $idContestacion = $this->input->post('idContestacion', TRUE);
        $nextPregunta = $this->input->post("nextPregunta", TRUE);
        $data = array(
            'idEncuesta' => $this->input->post('idEncuesta', TRUE),
            'idUsuario' => $this->input->post('idUsuario', TRUE),
            'idContestacion' => $idContestacion,
            'idPregunta' => $this->input->post('idPregunta', TRUE),
            'idRespuesta' => $this->input->post('idRespuesta', TRUE),
        );
        $this->modelo_contestar->guardarRespuesta($data);
        redirect("/contestar/index/{$idContestacion}/{$nextPregunta}");
    }

}
