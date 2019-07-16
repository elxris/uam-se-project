<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cuestionario extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('modelo_cuestionario');
    }

    public function index(){
        $data = array('resultado' => $this->modelo_cuestionario->obtenerTodos());
        $this->load->view('headers');
        $this->load->view('navbar');
        $this->load->view('cuestionario/lista', $data);
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
        redirect('/cuestionario');
    }
    
    function preguntas() {
        $idCuestionario = $this->uri->segment(3);
        $cuestionario = $this->modelo_cuestionario->obtener($idCuestionario);
        $preguntas = $this->modelo_cuestionario->obtenerPreguntas($idCuestionario);
        $preguntasRestantes = $this->modelo_cuestionario->obtenerPreguntasRestantes($idCuestionario);
        $data = array(
            'id' => $idCuestionario,
            'cuestionario' => $cuestionario,
            'preguntas' => $preguntas,
            'preguntasRestantes' => $preguntasRestantes);
        $this->load->view('headers');
        $this->load->view('navbar');
        if ($cuestionario == false || $preguntas == false) {
            echo 'Error al consultar la base de datos';
        } else {
            $this->load->view('cuestionario/listaPreguntas', $data);
        }
        $this->load->view('footer');
    }
    
    function agregarPregunta(){
        $this->load->model('modelo_pregunta');
        $idCuestionario = $this->uri->segment(3);
        $idPregunta = $this->uri->segment(4);
        $this->modelo_cuestionario->guardarPregunta($idCuestionario, $idPregunta);
        redirect('/cuestionario/preguntas/'.$idCuestionario);
    }
    function borrarPregunta(){
        $this->load->model('modelo_pregunta');
        $idCuestionario = $this->uri->segment(3);
        $idPregunta = $this->uri->segment(4);
        $this->modelo_cuestionario->borrarPregunta($idCuestionario, $idPregunta);
        redirect('/cuestionario/preguntas/'.$idCuestionario);
    }
    function moverArriba(){
        $this->load->model('modelo_pregunta');
        $idCuestionario = $this->uri->segment(3);
        $idPregunta = $this->uri->segment(4);
        $this->modelo_cuestionario->moverArriba($idCuestionario, $idPregunta);
        redirect('/cuestionario/preguntas/'.$idCuestionario);
    }
    function moverAbajo(){
        $this->load->model('modelo_pregunta');
        $idCuestionario = $this->uri->segment(3);
        $idPregunta = $this->uri->segment(4);
        $this->modelo_cuestionario->moverAbajo($idCuestionario, $idPregunta);
        redirect('/cuestionario/preguntas/'.$idCuestionario);
    }
}
