<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class modelo_cuestionario extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function guardarCuestionario($data)
    {
        $this->db->insert('cuestionario', $data);
    }
    function verTodo()
    {
        $query = $this->db->get('cuestionario');
        if ($query->num_rows() > 0) {
            return $query;
        } else
            return FALSE;
    }
    function obtenerTodos()
    {
        try {
            return $this->db->get('cuestionario');
        } catch (Exception $ex) {
            return false;
        }
    }
    function obtener($id)
    {
        try {
            return $this->db->get_where('cuestionario', array('idCuestionario' => $id));
        } catch (Exception $ex) {
            return false;
        }
    }
    function obtenerPreguntas($idCuestionario)
    {
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
    function obtenerPreguntasRestantes($idCuestionario)
    {
        $this->db->select('*');
        $this->db->from('pregunta');
        $this->db->where("idPregunta NOT IN (SELECT idPregunta FROM pregunta_cuestionario WHERE idCuestionario = " . $this->db->escape($idCuestionario) . ")", NULL, FALSE);
        $query = $this->db->get();
        return $query;
    }
    function borrarPregunta($idCuestionario, $idPregunta)
    {
        try {
            $data = array(
                'idCuestionario' => $idCuestionario,
                'idPregunta' => $idPregunta
            );
            $this->db->delete('pregunta_cuestionario', $data);
            return true;
        } catch (Exception $ex) {
            return false;
        }
    }
    function moverAbajo($idCuestionario, $idPregunta)
    {
        try {
            $data = array(
                'idCuestionario' => $idCuestionario,
                'idPregunta' => $idPregunta
            );
            $this->db->order_by('secuencia', 'asc');
            $cur = $this->db->get_where('pregunta_cuestionario', $data)->row();
            $this->db->order_by('secuencia', 'asc');
            $next = $this->db->get_where('pregunta_cuestionario', array(
                'idCuestionario' => $idCuestionario,
                'secuencia >' => $cur->secuencia
            ));
            if ($next->num_rows() > 0) {
                $this->db->where(array(
                    'idCuestionario' => $idCuestionario,
                    'idPregunta' => $idPregunta
                ));
                $this->db->update('pregunta_cuestionario', array(
                    'secuencia' => $next->row()->secuencia
                ));
                $this->db->where(array(
                    'idCuestionario' => $idCuestionario,
                    'idPregunta' => $next->row()->idPregunta,
                ));
                $this->db->update('pregunta_cuestionario', array(
                    'secuencia' => $cur->secuencia
                ));
            }

            return true;
        } catch (Exception $ex) {
            return false;
        }
    }
    function moverArriba($idCuestionario, $idPregunta)
    {
        try {
            $data = array(
                'idCuestionario' => $idCuestionario,
                'idPregunta' => $idPregunta
            );
            $this->db->order_by('secuencia', 'desc');
            $cur = $this->db->get_where('pregunta_cuestionario', $data)->row();
            $this->db->order_by('secuencia', 'desc');
            $next = $this->db->get_where('pregunta_cuestionario', array(
                'idCuestionario' => $idCuestionario,
                'secuencia <' => $cur->secuencia
            ));
            if ($next->num_rows() > 0) {
                $this->db->where(array(
                    'idCuestionario' => $idCuestionario,
                    'idPregunta' => $idPregunta
                ));
                $this->db->update('pregunta_cuestionario', array(
                    'secuencia' => $next->row()->secuencia
                ));
                $this->db->where(array(
                    'idCuestionario' => $idCuestionario,
                    'idPregunta' => $next->row()->idPregunta,
                ));
                $this->db->update('pregunta_cuestionario', array(
                    'secuencia' => $cur->secuencia
                ));
            }

            return true;
        } catch (Exception $ex) {
            return false;
        }
    }
    function guardarPregunta($idCuestionario, $idPregunta)
    {
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
            $data = array(
                'idCuestionario' => $idCuestionario,
                'idPregunta' => $idPregunta,
                'secuencia' => $lastSeq + 1
            );
            $this->db->insert('pregunta_cuestionario', $data);
            return true;
        } catch (Exception $ex) {
            return false;
        }
    }
}
