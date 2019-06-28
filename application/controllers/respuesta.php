<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Respuesta extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->model('modelo_respuesta');
    }

    public function index() {
        $this->load->view('headers');
        $this->load->view('navbar');
        $this->load->view('footer');
    }

    public function crear() {
        $data = array('idPregunta' => $this->uri->segment(3));
        if(!$data['idPregunta']){
            // Redirije a la lista de preguntas en caso de que no se 
            // haya proporcionado un id de pregunta a la que va ligado
            redirect('/pregunta/');
        }
        $this->load->view('headers');
        $this->load->view('navbar');
        $this->load->view('respuesta/formulario/crear', $data);
        $this->load->view('footer');
    }
    
    public function recibirDatos() {
        $data = $this->input->post();
        if($data){
            $this->modelo_respuesta->crear($data);
            redirect('/pregunta/');
        }
    }

}