<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EmployeesDashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Employee_model');
        $this->load->helper('url');
        $this->load->library('session');
        if (!$this->session->userdata('logged_in')) {
            redirect('login');
        }
    }

    public function index() {
        $employees = $this->Employee_model->getAllEmployees();
        $this->load->view('employeesDashboard/index', ['employees' => $employees]);
    }

    public function createEmployee() {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nom', 'Nom', 'required|max_length[50]');
        $this->form_validation->set_rules('prenom', 'Prenom', 'required|max_length[50]');
        $this->form_validation->set_rules('mail', 'Mail', 'required|valid_email|max_length[100]');
        $this->form_validation->set_rules('adresse', 'Adresse', 'required|max_length[255]');
        $this->form_validation->set_rules('telephone', 'Telephone', 'required|regex_match[/^\+?[0-9]{10,15}$/]');
        $this->form_validation->set_rules('poste', 'Poste', 'required|max_length[50]');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('employeesDashboard/createEmployee');
        } else {
            $this->do_createEmployee();
        }
    }

    public function do_createEmployee() {
        $nom = $this->input->post('nom');
        $prenom = $this->input->post('prenom');
        $mail = $this->input->post('mail');
        $adresse = $this->input->post('adresse');
        $telephone = $this->input->post('telephone');
        $poste = $this->input->post('poste');

        $employee_data = [
            'nom' => $nom,
            'prenom' => $prenom,
            'mail' => $mail,
            'adresse' => $adresse,
            'telephone' => $telephone,
            'poste' => $poste
        ];

        $this->Employee_model->createEmployee($employee_data);
        redirect('employees');
    }

    public function updateEmployee($id) {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nom', 'Nom', 'required|max_length[50]');
        $this->form_validation->set_rules('prenom', 'Prenom', 'required|max_length[50]');
        $this->form_validation->set_rules('mail', 'Mail', 'required|valid_email|max_length[100]');
        $this->form_validation->set_rules('adresse', 'Adresse', 'required|max_length[255]');
        $this->form_validation->set_rules('telephone', 'Telephone', 'required|regex_match[/^\+?[0-9]{10,15}$/]');
        $this->form_validation->set_rules('poste', 'Poste', 'required|max_length[50]');

        if ($this->form_validation->run() == FALSE) {
            $employee = $this->Employee_model->getEmployeeById($id, 'id');
            $this->load->view('employeesDashboard/updateEmployee', ['employee' => $employee]);
        } else {
            $this->do_updateEmployee($id);
        }
    }

    public function do_updateEmployee($id) {
        $employeename = $this->input->post('nom');
        $password = $this->input->post('prenom');
        $role = $this->input->post('mail');
        $nom = $this->input->post('adresse');
        $prenom = $this->input->post('telephone');
        $poste = $this->input->post('poste');

        $employee_data = [
            'nom' => $employeename,
            'prenom' => $password,
            'mail' => $role,
            'adresse' => $nom,
            'telephone' => $prenom,
            'poste' => $poste
        ];

        $this->Employee_model->updateEmployee($employee_data,$id);
        redirect('employees');
    }

    public function deleteEmployee($id) {
        $this->Employee_model->deleteEmployee($id);
        if ($this->input->is_ajax_request()) {
            echo json_encode(['success' => true]);
        } else {
            redirect('employees');
        }
    }

    public function searchEmployees() {
        $search = $this->input->get('search');
        $sort_by = $this->input->get('sort_by') ? $this->input->get('sort_by') : 'id';
        $sort_order = $this->input->get('sort_order') ? $this->input->get('sort_order') : 'asc';

        $employees = $this->Employee_model->searchEmployees($search, $sort_by, $sort_order);
        echo json_encode(['employees' => $employees]);
    }
}