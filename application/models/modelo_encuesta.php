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
    
    function obtenerEncuesta($idEncuesta){
	$this->db->where('idEncuesta', $idEncuesta);
	$query = $this->db->get('encuesta');
	
	if($query->num_rows() > 0)
            return $query;
	else
            return FALSE;
    }
    
    function modificarEncuesta($idEncuesta, $data){
        $this->db->where('idEncuesta', $idEncuesta);
        $this->db->update('encuesta', $data);
    }
    
    function eliminaEncuesta($idEncuesta){
        $this->db->where('idEncuesta', $idEncuesta);
        $this->db->delete('encuesta');
        redirect('/encuesta/verTodo');
    }
}