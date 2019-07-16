<?php if ( ! defined('BASEPATH')) exit ('No direct script access allowed');

class Modelo_pregunta extends CI_Model {
	function __construct(){
		parent::__construct();
		$this->load->database();
	}
	function crearPregunta($data){
		if($data['Nombre'] != '0'){
			$this->db->insert('pregunta',array('nombreCortoPregunta' => $data['Nombre'], 'descripcionPregunta' => $data['Descripcion']));
		}
	}
	function obtenerPreguntas(){
		$query = $this->db->get('pregunta');
		if($query -> num_rows() > 0) return $query;
		else return false; 
	}

	function eliminaPregunta($id){
		$this->db->where('idPregunta',$id);
		$this->db->delete('pregunta');
	}

	function obtenerPregunta($id){
		$this->db->where('idPregunta',$id);
        $query = $this->db->get('pregunta');
		if($query -> num_rows() > 0) return $query;
		else return false; 
	}
}

?>