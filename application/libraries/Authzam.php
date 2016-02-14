<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Authzam {

    function Authzam() {

        $CI = & get_instance();
        // se crea una instancia del super objeto codeigniter para poder utilizar los recursos de este,
        //en este caso tendremos que usar ciertas librerias. Solo es posible de esta forma para una libreria.

        $CI->load->database();
        $CI->load->library('session');
    }

    function registrar($datos) {

        $CI = & get_instance();

        if ($this->puede_registrar($datos['email'])) {

            $CI->db->insert('usuarios', $datos);

            return true;
        }

        return false;
    }

    function puede_registrar($email) {

        $CI = & get_instance();

        $query = $CI->db->get_where('usuarios', array('email' => $email));

        return ($query->num_rows() < 1) ? true : false;
        // si encuentra uno o mas usuarios con el mismo parametro arroja false.
    }

    function login($datos) {
        $CI = & get_instance();

        $query = $CI->db->get_where('usuarios', array('username' => $datos['username']));

        if ($query->num_rows() > 0) {
            $fila = $query->row_array();
            if ($datos['password'] === $fila['password']) {
                $datos = array('username' => $fila['username'], 'email' => $fila['email']);
                $CI->session->set_userdata($datos);
                return true;
            }
        }

        return false;
    }

    function logout() {
        $CI =& get_instance();
        
        $CI->session->sess_destroy();
        return true;
    }

    function is_logged() {
        //devuelve true si la sesion actual posee un usuario logueado
        $CI =& get_instance();
        
        if (!$CI->session->userdata('username')) {

            return false;
        }
        return true;
    }

}
