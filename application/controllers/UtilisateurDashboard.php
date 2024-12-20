<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UtilisateurDashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->helper('url');
        $this->load->library('session');
        if (!$this->session->userdata('logged_in')) {
            redirect('login');
        }
    }

    public function index() {
        $utilisateurs = $this->User_model->getAllUtilisateur();
        $this->load->view('utilisateurDashboard/index', ['utilisateurs' => $utilisateurs]);
    }

    public function createUser() {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('login', 'Login', 'required|min_length[5]|max_length[20]');
        $this->form_validation->set_rules('mot_de_passe', 'Mot de passe', 'required|min_length[8]|max_length[20]');
        $this->form_validation->set_rules('nom', 'Nom', 'required|min_length[2]|max_length[50]');
        $this->form_validation->set_rules('prenom', 'Prenom', 'required|min_length[2]|max_length[50]');
        $this->form_validation->set_rules('role', 'Role', 'required|min_length[4]|max_length[20]');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('utilisateurDashboard/createUser');
            return;
        }else {
            $this->do_createUser();
        }
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
        redirect('users');
    }

    public function updateUser($id) {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('login', 'Login', 'required|min_length[5]|max_length[20]');
        $this->form_validation->set_rules('mot_de_passe', 'Mot de passe', 'required|min_length[8]|max_length[20]');
        $this->form_validation->set_rules('nom', 'Nom', 'required|min_length[2]|max_length[50]');
        $this->form_validation->set_rules('prenom', 'Prenom', 'required|min_length[2]|max_length[50]');
        $this->form_validation->set_rules('role', 'Role', 'required|min_length[4]|max_length[20]');

        if ($this->form_validation->run() == FALSE) {
            $user = $this->User_model->getUtilisateurById($id, 'id');
            $this->load->view('utilisateurDashboard/updateUser', ['user' => $user]);
            return;
        } else {
            $this->do_updateUser($id);
        }
    }

    public function do_updateUser($id) {
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

        $this->User_model->updateUser($user_data,$id);
        redirect('users');
    }

    public function deleteUser($id) {
        $this->User_model->deleteUser($id);
        redirect('users');
    }
}