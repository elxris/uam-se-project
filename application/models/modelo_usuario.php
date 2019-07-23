<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class modelo_usuario extends CI_Model{
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    function verEncuestadores($valor){
        $this->db->where('idRol', $valor);
        $query = $this->db->get('usuario');
        if($query->num_rows() > 0)
            return $query;
        else
            return FALSE;
    }
    
    function verUsuarios(){
        $query = $this->db->get('usuario');
        if($query->num_rows() > 0)
            return $query;
        else
            return FALSE;
    }
    
    function crearUsuario($data){
        #if($data['Nombre'] != '0'){
            $this->db->insert('usuario',array('nombreUsuario' => $data['Nombre'], 'password' => $data['Pass'], 'idRol' => $data['Rol']));
        #}
    }
}
