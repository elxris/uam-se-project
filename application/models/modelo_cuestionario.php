<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class modelo_cuestionario extends CI_Model{
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    function guardarCuestionario($data){
        $this->db->insert('cuestionario', $data);
    }
    
    function obtenerTodos(){
        try {
            return $this->db->get('cuestionario');
        } catch (Exception $ex) {
            return false;
        }
    }
    function obtener($id) {
        try {
            return $this->db->get_where('cuestionario', array('idCuestionario' => $id));
        } catch (Exception $ex) {
            return false;
        }
    }
    function obtenerPreguntas($idCuestionario) {
        try {
            $this->db->select('*');
            $this->db->from('pregunta_cuestionario');
            $this->db->order_by('secuencia', 'asc');
            $this->db->where('idCuestionario', $idCuestionario);
            $this->db->join('pregunta', 'pregunta_cuestionario.idPregunta = pregunta.idPregunta');
            return $this->db->get();
        } catch (Exception $ex) {
            return false;
        }
    }
    function guardarPregunta($data) {
        try {
            $this->db->select('*');
            $this->db->from('pregunta_cuestionario');
            $this->db->order_by('secuencia', 'desc');
            $this->db->limit(1);
            $last = $this->db->get()->result()[0];
            if ($last) {
                $lastSeq = $last->secuencia;
            } else {
                $lastSeq = 1;
            }
            $data['secuencia'] = $lastSeq + 1;
            $this->db->insert('pregunta_cuestionario', $data);
        } catch (Exception $ex) {
            return false;
        }
    }
}

