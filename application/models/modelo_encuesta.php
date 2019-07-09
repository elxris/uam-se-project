<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class modelo_encuesta extends CI_Model{
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    function verEncuestas(){
        $query = $this->db->get('encuesta');
        if($query->num_rows() > 0)
            return $query;
        else
            return FALSE;
    }
            
    function guardarEncuesta($data){
        $this->db->insert('encuesta', $data);
    }
}