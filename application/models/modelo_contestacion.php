<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class modelo_contestacion extends CI_Model{
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    function guardarContestacion($data){
        $this->db->insert('contestacion', $data);
    }
}
