<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminDashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->helper('security');
        if (!$this->session->userdata('logged_in')) {
            redirect('login');
        }
        if ($this->session->userdata('role') !== 'Admin') {
            show_404();
        }
    }

    public function index() {
        $utilisateurs = $this->User_model->getAllUtilisateur();
        $this->load->view('adminDashboard/index', ['utilisateurs' => $utilisateurs]);
    }

    public function searchUsers() {
        $search_term = $this->input->get('search');
        $sort_by = $this->input->get('sort_by') ? $this->input->get('sort_by') : 'id';
        $sort_order = $this->input->get('sort_order') ? $this->input->get('sort_order') : 'asc';
        
        $utilisateurs = $this->User_model->searchAndSortUsers($search_term, $sort_by, $sort_order);
        echo json_encode(['utilisateurs' => $utilisateurs]);
    }

    public function createUser() {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('login', 'Login', 'required|min_length[5]|max_length[20]');
        $this->form_validation->set_rules('mot_de_passe', 'Mot de passe', 'required|min_length[8]|max_length[20]');
        $this->form_validation->set_rules('nom', 'Nom', 'required|min_length[2]|max_length[50]');
        $this->form_validation->set_rules('prenom', 'Prenom', 'required|min_length[2]|max_length[50]');
        $this->form_validation->set_rules('role', 'Role', 'required|min_length[4]|max_length[20]');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('adminDashboard/createUser');
            return;
        }else {
            $this->do_createUser();
        }
    }

    public function do_createUser() {
        $username = $this->security->xss_clean($this->input->post('login'));
        $password = $this->security->xss_clean($this->input->post('mot_de_passe'));
        $nom = $this->security->xss_clean($this->input->post('nom'));
        $prenom = $this->security->xss_clean($this->input->post('prenom'));
        $role = $this->security->xss_clean($this->input->post('role'));

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
        $this->form_validation->set_rules('mot_de_passe', 'Mot de passe', 'min_length[8]|max_length[20]');
        $this->form_validation->set_rules('nom', 'Nom', 'required|min_length[2]|max_length[50]');
        $this->form_validation->set_rules('prenom', 'Prenom', 'required|min_length[2]|max_length[50]');
        $this->form_validation->set_rules('role', 'Role', 'required|min_length[4]|max_length[20]');

        if ($this->form_validation->run() == FALSE) {
            $user = $this->User_model->getUtilisateurById($id, 'id');
            $this->load->view('adminDashboard/updateUser', ['user' => $user]);
            return;
        } else {
            $this->do_updateUser($id);
        }
    }

    public function do_updateUser($id) {
        $username = $this->security->xss_clean($this->input->post('login'));
        $password = $this->security->xss_clean($this->input->post('mot_de_passe'));
        $nom = $this->security->xss_clean($this->input->post('nom'));
        $prenom = $this->security->xss_clean($this->input->post('prenom'));
        $role = $this->security->xss_clean($this->input->post('role'));

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
        if ($this->input->is_ajax_request()) {
            echo json_encode(['success' => true]);
        } else {
            redirect('users');
        }
    }
}