<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class modelo_cuestionario extends CI_Model{
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    function guardarCuestionario($data){
        $this->db->insert('cuestionario', $data);
    }
}

