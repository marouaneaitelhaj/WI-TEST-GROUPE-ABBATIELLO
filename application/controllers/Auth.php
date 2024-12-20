<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->library('form_validation');
    }



    public function login() {
        if ($this->session->userdata('logged_in')) {
            if($this->session->userdata('role') == 'admin'){
                redirect('users');
            }
            redirect('employees');
        }


        $this->form_validation->set_rules('login', 'Login', 'required|min_length[5]|max_length[20]');
        $this->form_validation->set_rules('mot_de_passe', 'Password', 'required|min_length[8]|max_length[20]');
        

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('auth/login');
            return;
        }else{
            $this->do_login();
        }
    }


    public function do_login() {
        $login = $this->security->xss_clean($this->input->post('login'));
        $password = $this->security->xss_clean($this->input->post('mot_de_passe'));

        $user = $this->User_model->validate_login($login, $password);

        if ($user) {
            $this->session->set_userdata([
                'logged_in' => true,
                'user_id' => $user->id,
                'login' => $user->login,
                'full_name' => $user->nom . ' ' . $user->prenom,
                'role' => $user->role
            ]);
            if($user->role == 'Admin'){
                redirect('users');
            }
            redirect('employees');
        } else {
            $this->session->set_flashdata('error', 'Invalid login credentials');
            $this->load->view('auth/login');
        }
    }


    public function register() {
        $this->form_validation->set_rules('login', 'Login', 'required|min_length[5]|max_length[20]');
        $this->form_validation->set_rules('mot_de_passe', 'Password', 'required|min_length[8]|max_length[20]');
        $this->form_validation->set_rules('nom', 'First Name', 'required|min_length[2]|max_length[50]');
        $this->form_validation->set_rules('prenom', 'Last Name', 'required|min_length[2]|max_length[50]');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('auth/register');
            return;
        } else {
            $this->do_register();
        }
    }

    public function do_register() {
        $username = $this->security->xss_clean($this->input->post('login'));
        $password = $this->security->xss_clean($this->input->post('mot_de_passe'));
        $nom = $this->security->xss_clean($this->input->post('nom'));
        $prenom = $this->security->xss_clean($this->input->post('prenom'));

        $user_data = [
            'login' => $username,
            'mot_de_passe' => $password,
            'role' => 'user',
            'nom' => $nom,
            'prenom' => $prenom
        ];

        // Register the user
        if ($this->User_model->createUser($user_data)) {
            $this->session->set_flashdata('success', 'Registration successful');
            redirect('auth/login');
            $this->session->unset_userdata('success');
        } else {
            $this->session->set_flashdata('error', 'Failed to register user');
            $this->load->view('auth/register');
            $this->session->unset_userdata('error');
        }
    }


    public function logout() {
        $this->session->sess_destroy(); // Destroy session
        redirect('auth/login');
    }
}