<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->helper('url');
        $this->load->library('session');
    }



    public function login() {
        if ($this->session->userdata('logged_in')) {
            redirect('users');
        }

        $this->load->view('auth/login');
    }


    public function do_login() {
        $login = $this->input->post('login');
        $password = $this->input->post('mot_de_passe');

        $user = $this->User_model->validate_login($login, $password);

        if ($user) {
            $this->session->set_userdata('logged_in', true);
            $this->session->set_userdata('user_id', $user->id);
            $this->session->set_userdata('full_name', $user->nom . ' ' . $user->prenom);
            $this->session->set_userdata('role', $user->role);
            redirect('users');
        } else {
            $this->session->set_flashdata('error', 'Invalid login credentials');
            redirect('auth/login');
        }
    }


    public function register() {
        $this->load->view('auth/register');
    }

    public function do_register() {
        $username = $this->input->post('login');
        $password = $this->input->post('mot_de_passe');
        $nom = $this->input->post('nom');
        $prenom = $this->input->post('prenom');

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
        } else {
            $this->session->set_flashdata('error', 'Failed to register user');
            redirect('auth/register');
        }
    }


    public function logout() {
        $this->session->sess_destroy(); // Destroy session
        redirect('auth/login');
    }
}