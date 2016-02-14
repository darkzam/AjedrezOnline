<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class No_user extends CI_Controller {

    protected $data;

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('authzam');
        if ($this->authzam->is_logged()) {
            redirect('public_user');
        }
        $this->load->helper('form');
        $this->data = null;
        $this->load->vars('directorio_includes', 'http://localhost/AjedrezOnline/includes/');
    }

    public function index() {

        $this->login();
    }

    function login() {
        // se ejecuta al lanzar la operacion loguearse desde la vista no_user_index_view
        // permite loguear usuarios al sistema publicos y admins
        if ($this->session->flashdata('mensaje')) {
            $this->data['mensaje'] = $this->session->flashdata('mensaje');
        } else {

            $this->data['mensaje'] = null;
        }

        if ($this->input->post('submit')) {

            $datos['username'] = $this->input->post('username');
            $datos['password'] = $this->input->post('password');

            $resultado = $this->authzam->login($datos);

            if ($resultado) {

                redirect('public_user');
            } else {

                $this->session->set_flashdata('mensaje', 'Datos Incorrectos, verifique.');

                redirect('no_user', 'refresh');
            }
        }

        $this->load->view('no_user/no_user_index_view', $this->data);
    }

    function registro() {
        // se ejecuta al lanzxar la operacion registrarse desde la vista no_user_index_view
        // permite el registro de nuevos usuarios al sistema
        if ($this->session->flashdata('mensaje')) {
            $this->data['mensaje'] = $this->session->flashdata('mensaje');
        } else {

            $this->data['mensaje'] = null;
        }
        if ($this->input->post('submit')) {

            //correr validacion
            //si cumple validacion guardar datos
            $datos['username'] = $this->input->post('username');
            $datos['password'] = $this->input->post('password');
            $datos['email'] = $this->input->post('email');

            $resultado = $this->authzam->registrar($datos);
            if ($resultado) {
                $this->session->set_flashdata('mensaje', 'Usuario Creado');
            } else {

                $this->session->set_flashdata('mensaje', 'Error Verifique Datos');
            }
            //  $this->session->keep_flashdata('mensaje');

            redirect('no_user/registro', 'refresh');
        }
        $this->load->view('no_user/no_user_registro_view', $this->data);
    }

    function contacto() {
        // permite enviar un email al correo del administrador con sugerencias
    }

}
