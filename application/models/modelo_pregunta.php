<?php if ( ! defined('BASEPATH')) exit ('No direct 	script access allowed');

class Modelo_pregunta extends CI_Model {
	function __construct(){
		parent::__construct();
		$this->load->database();
	}
	function crearPregunta($data){
		$this->db->insert('pregunta',array('nombreCortoPregunta' => $data['Nombre'], 'descripcionPregunta' => $data['Descripcion']));
	}
}

?>