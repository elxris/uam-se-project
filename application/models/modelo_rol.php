<?php if ( ! defined('BASEPATH')) exit ('No direct script access allowed');

class Modelo_rol extends CI_Model {
	function __construct(){
		parent::__construct();
		$this->load->database();
	}
	function obtenerRoles(){
		$query = $this->db->get('roles');
		if($query -> num_rows() > 0) return $query;
		else return false; 
	}
}

?>