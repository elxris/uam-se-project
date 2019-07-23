<?php if ( ! defined('BASEPATH')) exit ('No direct script access allowed');

class Modelo_usuario extends CI_Model {
	function __construct(){
		parent::__construct();
		$this->load->database();
	}
	function crearUsuario($data){
		#if($data['Nombre'] != '0'){
			$this->db->insert('usuario',array('nombreUsuario' => $data['Nombre'], 'password' => $data['Pass'], 'idRol' => $data['Rol']));
		#}
	}
}

?>