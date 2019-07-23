<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuarios extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('modelo_usuario');
    }
    
    function index(){
        $this->load->view('welcome_message');
    }
            
    function verEncuestadores(){
        $id = '3';
        $data = array(
            'usuario' => $this->modelo_usuario->verEncuestadores($id),
            'dump' => 0
        );
        
        $this->load->view('welcome_message', $data);
    }
}