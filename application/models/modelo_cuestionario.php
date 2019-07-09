<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class modelo_cuestionario extends CI_Model{
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    function guardarCuestionario($data){
        $this->db->insert('cuestionario', $data);
    }
    
    function verTodo(){
        $query = $this->db->get('cuestionario');
        if($query->num_rows() > 0){
            return $query;
        }
        else
            return FALSE;
    }
}
