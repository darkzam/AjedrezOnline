<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Public_user extends CI_Controller {

    protected $data;

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('authzam');
        if (!$this->authzam->is_logged()) {
            redirect('no_user');
        }
        $this->data = null;
        $this->load->vars('directorio_includes', 'http://localhost/AjedrezOnline/includes');
    }

    function index() {

        $this->data['user'] = $this->session->userdata('username');
        $this->load->view('public_user/public_user_index_view', $this->data);
    }

    function logout() {

        $this->authzam->logout();
        redirect('no_user');
    }

}
