<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->helper('url');
        $this->load->library('session');
    }

    public function index() {
        $utilisateurs = $this->User_model->getAllUtilisateur();
        $this->load->view('dashboard/index', ['utilisateurs' => $utilisateurs]);
    }

    public function createUser() {
        $this->load->view('dashboard/createUser');
    }

    public function do_createUser() {
        $username = $this->input->post('login');
        $password = $this->input->post('mot_de_passe');
        $nom = $this->input->post('nom');
        $prenom = $this->input->post('prenom');
        $role = $this->input->post('role');

        $user_data = [
            'login' => $username,
            'mot_de_passe' => $password,
            'role' => $role,
            'nom' => $nom,
            'prenom' => $prenom
        ];

        $this->User_model->createUser($user_data);
        redirect('dashboard/index');
    }
}