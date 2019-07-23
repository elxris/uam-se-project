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
        $this->db->join('usuario', 'usuario.idUsuario = contestacion.idUsuario');
        $this->db->join('cuestionario', 'cuestionario.idCuestionario = encuesta.idCuestionario');
        return $this->db->get()->row();
    }
    
    function obtenerPregunta($idContestacion, $numPregunta)
    {
        $this->db->where('idContestacion', $idContestacion);
        $this->db->from('contestacion');
        $this->db->join('encuesta', 'encuesta.idEncuesta = contestacion.idEncuesta');
        $this->db->join('pregunta_cuestionario', 'encuesta.idCuestionario = pregunta_cuestionario.idCuestionario');
        $this->db->join('pregunta', 'pregunta_cuestionario.idPregunta = pregunta.idPregunta');
        $this->db->order_by('pregunta_cuestionario.secuencia', 'asc');
        $query = $this->db->get();
        if ($query->num_rows() <= $numPregunta) {
            return false;
        }
        return $query->row($numPregunta);
    }

    function getRespuestas($idContestacion, $idPregunta)
    {
        $this->db->where('idContestacion', $idContestacion);
        $this->db->from('contestacion');
        $this->db->join('encuesta', 'encuesta.idEncuesta = contestacion.idEncuesta');
        $this->db->join('pregunta_cuestionario', 'encuesta.idCuestionario = pregunta_cuestionario.idCuestionario');
        $this->db->join('pregunta', 'pregunta_cuestionario.idPregunta = pregunta.idPregunta');
        $this->db->join('respuesta', 'pregunta_cuestionario.idPregunta = respuesta.idPregunta');
        $this->db->where('respuesta.idPregunta', $idPregunta);
        return $this->db->get();
    }
    
    function guardarRespuesta($data)
    {
        $this->db->delete('contestacion_usuarios', $data);
        $this->db->insert('contestacion_usuarios', $data);
    }
}
