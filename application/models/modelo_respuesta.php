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
}

?>