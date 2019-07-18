<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class modelo_contestar extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function obtenerEncuesta($idContestacion)
    {
        $this->db->where('idContestacion', $idContestacion);
        $this->db->from('contestacion');
        $this->db->join('encuesta', 'encuesta.idEncuesta = contestacion.idEncuesta');
        $this->db->join('usuario', 'encuesta.idUsuario = contestacion.idUsuario');
        $this->db->join('cuestionario', 'cuestionario.idCuestionario = encuesta.idCuestionario');
        return $this->db->row();
    }
    
    function obtenerPregunta($idContestacion, $numPregunta)
    {
        $this->db->where('idContestacion', $idContestacion);
        $this->db->from('contestacion');
        $this->db->join('encuesta', 'encuesta.idEncuesta = contestacion.idEncuesta');
        $this->db->join('pregunta_cuestionario', 'encuesta.idCuestionario = pregunta_cuestionario.idCuestionario');
        $this->db->order_by('pregunta_cuestionario.seq', 'asc');
        return $this->db->row($numPregunta);
    }
    
    function guardarRespuesta($data)
    {
        $this->db->insert('mytable', $data);
    }
}
