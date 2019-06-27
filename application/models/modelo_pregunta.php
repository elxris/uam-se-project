<?php if ( ! defined('BASEPATH')) exit ('No direct 	script access allowed');

class Is_model extends CI_Model {
	function __construct(){
		parent::__construct();
		$this->load->database();
	}
	function crearPregunta($data){
		$this->db->insert('encuestas',array('Nombre' => $data['Nombre'], 'Descripcion' => $data['Descripcion']));
	}
}

?>