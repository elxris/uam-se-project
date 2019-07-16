<?php

class Modelo_Respuesta extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    public function crear($data) {
        $this->db->insert('respuesta', array(
            'idPregunta' => $data['idPregunta'],
            'nombreRespuesta' => $data['nombreRespuesta']
        ));
    }
    function obtenerRespuestas($id){
		$this->db->where('idPregunta',$id);
        $query = $this->db->get('respuesta');
		if($query -> num_rows() > 0) return $query;
		else return false; 
	}
}

?>